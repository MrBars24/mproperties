<?php

class Property_model extends CI_Model {
	
	public function __construct()
	{                
		parent::__construct();
	}

    public function get_all_properties($property_name = false, $address = false, $developer = false, $property_price = false, $district_name = false, $tags = false, $status = false, $order_by = false){
        $this->db->select("*, properties.status as pstatus");
        $this->db->join("districts", "districts.district_id = properties.district_id ");
        if($property_name) $this->db->like('property_name', $property_name, 'both');
        if($address) $this->db->like('address', $address, 'both');
        if($developer) $this->db->like('developer', $developer, 'both');
        if($property_price) $this->db->like('property_price', $property_price, 'both');
        if($district_name) $this->db->like('district_name', $district_name, 'both');
        if($tags) $this->db->like('tags', $tags, 'both');
        if($status){
            if(strtolower($status) == 'available'){
                $this->db->like('properties.status', 0);
            }else if(strtolower($status) == 'disable'){
                $this->db->like('properties.status', 1);
            }
        }

        if($order_by) $this->db->order_by($order_by);

        $result = $this->db->get('properties')->result();
        return $result;
    }

    public function get_collections()
    {

        // $sql = "SELECT tca.*
        //             IF(DATEDIFF(DATE_ADD(rc.rental_contract_start_date, INTERVAL 1 MONTH), CURDATE()) > 0,
        //                 DATEDIFF(DATE_ADD(rc.rental_contract_start_date, INTERVAL 1 MONTH), CURDATE()),  0) AS in_arrears,
        //             DATE_ADD(rc.rental_contract_start_date, INTERVAL 1 MONTH) AS due_date
        //             FROM rental_collections rc LEFT JOIN trust_cash_accounts tca ON rc.property_id = tca.trust_id";

        $this->db->where("type", 1);
        return $this->db->get("trust_cash_accounts")->result();


    }

    public function get_due_properties()
    {

        $today = $this->config->item('system_date');
        $this->db->select("properties.*,trust_accounts.*,
            property_valuation.property_value as val_property_value,
            property_valuation.property_value_tax as val_property_value_tax,
            property_valuation.property_value_cash as val_property_value_cash,
            property_valuation.nav as val_nav,
            property_valuation.total_units as val_total_units,
            property_valuation.price_per_unit as val_price_per_unit,
            property_valuation.setup_cost as val_setup_cost,
            property_valuation.return as val_return,
            property_valuation.created_at as valuated_at,
            properties.status as pstatus, 
            IF(property_valuation.nav IS NULL, 1, (SELECT COUNT(*) FROM property_valuation WHERE property_valuation.property_id = properties.property_id) + 1) as valuation_count,
            IF(last_valuation IS NULL, LAST_DAY(completed_at), LAST_DAY(DATE_ADD(DATE(last_valuation), INTERVAL 1 MONTH))) as due,
            IF(last_distribution IS NULL, IF(LAST_DAY(DATE_ADD(DATE(completed_at), INTERVAL 2 MONTH)) = '$today', 1, 0), IF(LAST_DAY(DATE_ADD(DATE(last_distribution), INTERVAL 3 MONTH)) = '$today', 1, 0)) as is_quarter");
        $this->db->join('trust_accounts', 'trust_accounts.property_id = properties.property_id');
        $this->db->join('property_valuation', "property_valuation.property_id = properties.property_id AND LAST_DAY(properties.last_valuation) = LAST_DAY(property_valuation.created_at)", 'LEFT', FALSE);
        $this->db->where("date(completed_at) != '$today'");
        $this->db->group_start();
        $this->db->where("last_valuation IS NOT NULL");
        $this->db->or_where("completed_at IS NOT NULL");
        $this->db->group_end();
        $this->db->having("due", $today);
        $this->db->group_by('property_valuation.property_id');
        $this->db->order_by('property_valuation.created_at', 'DESC');

        $result = $this->db->get('properties');
        return $result->result();

    }

    public function get_property_component($trust, $type)
    {
        $today = $this->config->item('system_date');
        $this->db->select('SUM(amount) as total');
        $this->db->where("added_at <= LAST_DAY('$today')");
        $this->db->where("added_at >= FIRST_DAY('$today')");
        $this->db->where('type', $type);
        $this->db->where('trust_id', $trust);
        $res = $this->db->get('trust_cash_accounts');
        return $res->row();
    }

    public function get_rental_due_property($testing = FALSE)
    {
        $created = $this->config->item('system_date') . date(' H:i:s');
        $now = ($testing) ? "'$created'" : "NOW()";

        $trust = "SELECT trust_cash_accounts.*, trust_cash_accounts_meta.key, trust_cash_accounts_meta.value  FROM trust_cash_accounts INNER JOIN trust_cash_accounts_meta ON trust_cash_accounts_meta.cash_account_id = trust_cash_accounts.id WHERE trust_cash_accounts_meta.key = 'due_date' AND
            type = 1";

        return $res->result();
    }

    // public function get_due_properties($transaction = 'distribution')
    // {
    //     $intervalParam = ($transaction == 'distribution') ? 3 : 1;
    //     $transactionParam = ($transaction == 'distribution') ? 'last_distribution' : 'last_valuation';

    //     $today = date('Y-m-d');
    //     $this->db->select("*, properties.status as pstatus, 
    //         IF($transactionParam = '0000-00-00 00:00:00', DATE_ADD(DATE(completed_at), INTERVAL $intervalParam MONTH), DATE_ADD(DATE($transactionParam), INTERVAL $intervalParam MONTH)) as due");
    //     $this->db->where("date(completed_at) != '$today'");
    //     $this->db->group_start();
    //     $this->db->where("$transactionParam IS NOT NULL");
    //     $this->db->or_where("completed_at IS NOT NULL");
    //     $this->db->group_end();
    //     $this->db->having("due", $today);

    //     $result = $this->db->get('properties');
    //     return $result->result();
    // }

    /**
     * Get all nearby properties
     *
     * @param Integer $property_id -- for reference point
     * @param Decimal $distance -- distance limit to get
     * @param mixed $distance_type -- values(mi or km) mi = MILES, km = KILOMETERS
     * @return Object_result
     */
    public function get_nearby_properties($property_id, $distance, $distance_type = 'mi', $limit = 4)
    {
        $property = $this->get_property($property_id);
        $constant_value = ($distance_type == 'mi') ? 3959 : 6371;

        $this->db->select("*, properties.status as pstatus, (
            {$constant_value} * acos (
              cos ( radians({$property->lat}) )
              * cos( radians( lat ) )
              * cos( radians( lng ) - radians($property->lng) )
              + sin ( radians($property->lat) )
              * sin( radians( lat ) )
            )
          ) AS distance, (
                SELECT
                    SUM(percent_invested)
                FROM
                    property_investment
                WHERE
                    property_investment.property_id = properties.property_id
            ) AS percent");
        $this->db->join("districts", "districts.district_id = properties.district_id ");
        $this->db->where('property_id !=', $property->property_id);
        $this->db->limit($limit);
        $this->db->order_by('distance');
        //$this->db->having('distance < ' . $distance);
        $result = $this->db->get('properties');
        if($result->num_rows() > 0) {
            $data = [];
            while($row = $result->unbuffered_row()) {
                $row->images = $this->get_property_images($row->property_id);
                $data[] = $row;
            }

            return $data;
        }

        return [];
    }

    public function get_featured_properties(){
        $this->db->order_by("property_id", "DESC");
        $query = $this->db->get_where("properties", ['is_featured' => 1, 'status' => 0]);
        if($query->num_rows() > 0){
            $data = [];
            while($row = $query->unbuffered_row()) {
                $row->images = $this->get_property_images($row->property_id);
                $data[] = $row;
            }

            return $data;
        }else{
            return [];
        }
        
    }

    /* Get hot properties
     *
     * @param Integer $limit
     * @return void
     */
    public function get_hot_properties($limit = 2)
    {
        $res = $this->db->select('*, IF(property_investment.property_id IS NOT NULL, (
                SELECT
                    SUM(percent_invested)
                FROM
                    property_investment
                WHERE
                    property_investment.property_id = properties.property_id
            ), 0) AS percent')
            ->join('property_investment', 'properties.property_id = property_investment.property_id', 'LEFT')
			->where('properties.status', 0)
            ->group_by('property_investment.property_id')
            //->having('percent < 100')
            ->limit($limit)
            ->order_by('percent', 'DESC')
            ->get('properties');

        if($res->num_rows() > 0) {
            $data = [];
            while($row = $res->unbuffered_row()) {
                $row->images = $this->get_property_images($row->property_id);
                $data[] = $row;
            }

            return $data;
        }

        return [];
    }

    public function get_property_watch()
    {
        $user = $this->session->userdata('user_id');

        if(!$user) {
            $user = 0;
        }
        
        $this->db->select('*, (SELECT count(user_id) FROM watchlist WHERE user_id = '. $user .' AND property_id = properties.property_id) as is_watchlist, (SELECT SUM(percent_invested) FROM property_investment WHERE property_investment.property_id = properties.property_id) as percent');
        $this->db->having('is_watchlist > 0');

        // $this->db->where('property_price >=' );
        $this->db->order_by("property_id", "DESC");
        $result = $this->db->get('properties');
        //error_log(print_r($this->db->last_query(), true), 0);

        if($result->num_rows() > 0) {
            $data = [];
            while($row = $result->unbuffered_row()) {
                $row->images = $this->get_property_images($row->property_id);
                $data[] = $row;
            }

            return $data;
        }

        return [];
    }

    // public function get_investment_percentage($property_id)
    // {
    //     $this->db->select("SUM(percent_invested) as total_percentage");
    //     $this->db->where("property_id", $property_id);
    //     return $this->db->get("property_investment")->row();

    // }

    // public function get_property_investments($property_id)
    // {
    //     return $this->db->get_where("property_investment", ["property_id" => $property_id])->result();
    // }

    public function get_property_listings($theme = 'ALL', $district = 'ALL', $valuation = '1-900000', $psqft = '1-5000', $search = '', $offset = false, $limit = false){

        $user = $this->session->userdata('user_id');

        if(!$user) {
            $user = 0;
        }
        
        $this->db->join("districts", "districts.district_id = properties.district_id");
        $this->db->select('*, (SELECT count(user_id) FROM watchlist WHERE user_id = '. $user .' AND property_id = properties.property_id) as is_watchlist,
            (SELECT SUM(percent_invested) FROM property_investment WHERE property_investment.property_id = properties.property_id) as percent');

        if($theme != 'ALL' && $theme != ''){
            $themes = explode(',', $theme);
            foreach ($themes as $theme) {
                $this->db->like('tags', trim($theme));
            }
        }

        if($valuation != 0){
            $price = explode("-", $valuation);
            $this->db->where('property_price BETWEEN '. trim($price[0]) .' AND '. trim($price[1]));
        }

        if($psqft != 0){
            $sqft = explode('-', $psqft);
            $this->db->where('sqft BETWEEN '. trim($sqft[0]) .' AND '. trim($sqft[1]));
        }
       
        if($search != ''){
            $this->db->like('property_name', $search, 'both');
        }

        if($district != 'ALL' && $district != ''){
            $district_arr = explode(',', $district);
            foreach($district_arr as $dis){
                $this->db->like('district_name', trim($dis));
            }
            
        }

        // $this->db->where('property_price >=' );
        $this->db->order_by("property_id", "DESC");
        $this->db->where('properties.status', 0);
        $this->db->having('percent < 100');
        $this->db->or_having('percent IS NULL');
        $result = $this->db->get('properties', $limit, $offset);
        $data = [];
        while($row = $result->unbuffered_row()) {
            $row->images = $this->get_property_images($row->property_id);
            $data[] = $row;
        }
        //error_log(print_r($this->db->last_query(), true), 0);

        return $data;        
    }

    public function random_property($except_id)
    {
        $this->db->order_by("rand()");
        $this->db->limit(4);
        $query = $this->db->get_where('properties', ['property_id !=' => $except_id]);
        return $query->result();
    }

    public function get_property_valuations($property_id, $value = false, $date = false, $order_by = false, $limit = false){

        $this->db->where('property_id', $property_id);

        if($value) $this->db->like('value', $property_name);
        if($date) $this->db->like('date', $address);
        if($order_by) $this->db->order_by($order_by);
        if($limit) $this->db->limit($limit);

        $result = $this->db->get('property_valuation')->result();

        return $result;
    }

    public function change_status($type, $id)
    {
        if($type === 'disable'){
            $status = 1;
        }
        else if($type === 'available'){
            $status = 0;
        }

        $this->db->where('property_id', $id);
        $this->db->update('properties', ['status' => $status]);

    }

    public function get_property($property_id)
    {
        $user = $this->session->userdata('user_id');

        if(!$user) {
            $user = 0;
        }
        
        $this->db->select('*, (SELECT count(user_id) FROM watchlist WHERE user_id = '. $user .' AND watchlist.property_id = properties.property_id) as is_watchlist');
        $this->db->join('trust_accounts', 'properties.property_id = trust_accounts.property_id', 'LEFT');
        $this->db->where('properties.property_id', $property_id);

        $result = $this->db->get('properties')->row();
        return $result;
    }

    public function insert_property($data)
    {
        $this->db->insert('properties', $data);

        return $this->db->insert_id();
    }

    public function update_property($data)
    {
        $this->db->where('property_id', $data['property_id']);
        $this->db->update('properties', $data);

        return $data['property_id'];
    }

    public function get_property_valuation($property_id)
    {
        $this->db->where('property_id', $property_id);
        $this->db->order_by('created_at DESC');

        $result = $this->db->get('property_valuation')->result();

        return $result;
    }

    public function get_latest_nav($property)
    {
        $res = $this->db->select('IF(property_valuation.nav IS NULL, trust_accounts.nav, property_valuation.nav) as nav')
            ->from('trust_accounts')
            ->join('property_valuation', 'trust_accounts.property_id = property_valuation.property_id', 'LEFT')
            ->where('trust_accounts.property_id', $property)
            ->order_by('property_valuation.created_at', 'DESC')
            ->limit(1)
            ->get();

        return $res->row();
    }

    public function add_rental($mass_data)
    {
        foreach($mass_data as $data) {
            $this->db->insert("trust_cash_accounts", $data);
            $id = $this->db->insert_id();

            $meta = [];
            foreach(json_decode($data['meta']) as $key => $value) {
                $meta[] = [
                    'cash_account_id' => $id,
                    'key' => $key,
                    'value' => $value
                ];
            }

            $this->db->insert_batch("trust_cash_accounts_meta", $meta);
        }
        //return $this->db->insert_batch("trust_cash_accounts", $mass_data);
    }

    public function add_property_valuation($data, $testing = FALSE)
    {
        $this->db->trans_start();
        
        $created = $this->config->item('system_date') . date(' H:i:s');
        if(isset($data['excess'])) {
            $excess = $data['excess'];
            unset($data['excess']);
        }

        $insert = $this->db->insert("property_valuation", $data);
        if($insert) {
            if($testing) {
                $this->db->set('last_valuation', "'$created'", false);
            } else {
                $this->db->set('last_valuation', 'NOW()', false);
            }

            $this->db->where('property_id', $data['property_id']);
            $this->db->update('properties');
        }
        
        if(isset($data['is_distribution']) && $data['is_distribution']) {

            $dist_sql_insert = "property_id, investor_id, amount, return_percentage, distributed_unit";
            $dist_sql_field = "investment_log.property_id, investment_log.investor_id, $excess * (investment_log.percent_invested / 100), return_pct, 
            investment_log.units_invested - {$excess} * (investment_log.percent_invested / 100) / {$data['price_per_unit']}";
            $log_sql_insert = "`property_id`, `investor_id`, `is_fulfilled`, `units_invested`, `percent_invested`, `invested_amount`, `return_pct`, `is_distribution`";
            $log_sql_field = "investment_log.property_id, investment_log.investor_id, investment_log.is_fulfilled,
            investment_log.units_invested - {$excess} * (investment_log.percent_invested / 100) / {$data['price_per_unit']}, investment_log.percent_invested,
            (investment_log.units_invested - {$excess} * (investment_log.percent_invested / 100) / {$data['price_per_unit']}) * {$data['price_per_unit']} AS latest_invested_amount,
            ((investment_log.units_invested - {$excess} * (investment_log.percent_invested / 100) / {$data['price_per_unit']}) * {$data['price_per_unit']}) / investment_log.invested_amount - 1,
            1 as distrib";
            $now = "DATE(NOW())";

            if($testing) {
                $dist_sql_insert .= ", created_at";
                $dist_sql_field .= ", '$created'";
                $now = "DATE('$created')";
                $log_sql_insert .= ", `date_of_investment`";
                $log_sql_field .= ", '$created'";
            }

            $sql = "INSERT INTO distribution($dist_sql_insert)
                SELECT $dist_sql_field
                FROM investment_log
                WHERE investment_log.property_id = {$data['property_id']}
                AND DATE(date_of_investment) = $now
                GROUP BY investor_id
                ORDER BY investment_log.created_at";
            $this->db->query($sql);


            $sql = "INSERT INTO investment_log($log_sql_insert) 
                SELECT $log_sql_field
                FROM investment_log
                WHERE investment_log.property_id = {$data['property_id']}
                AND DATE(date_of_investment) = DATE_SUB($now, INTERVAL 1 MONTH)
                GROUP BY investor_id
                ORDER BY investment_log.created_at";
        } else {
            $log_sql_insert = "`property_id`, `investor_id`, `is_fulfilled`, `units_invested`, `percent_invested`, `invested_amount`, `return_pct`";
            $log_sql_field = "investment_log.property_id, investment_log.investor_id, investment_log.is_fulfilled, investment_log.units_invested, investment_log.percent_invested,
            investment_log.units_invested * {$data['price_per_unit']} AS latest_invested_amount,
            '{$data['return']}' as latest_return_pct";
            
            if($testing) {
                $log_sql_insert .= ", date_of_investment";
                $log_sql_field .= ", '$created'";
            }

            $sql = "INSERT INTO investment_log($log_sql_insert) 
                SELECT $log_sql_field
                FROM investment_log
                WHERE investment_log.property_id = {$data['property_id']}
                GROUP BY investor_id
                ORDER BY investment_log.created_at";
        }
        $this->db->query($sql);

        if(isset($data['is_distribution']) && $data['is_distribution']) {
            if($testing) {
                $this->db->set('last_distribution', "'$created'", false);
            } else {
                $this->db->set('last_distribution', 'NOW()', false);
            }

            $this->db->where('property_id', $data['property_id']);
            $this->db->update('properties');
        }
        
        
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function get_districts($id = false)
    {
        if($id){
           return $this->db->get_where('districts', ['district_id' => $id])->row();
        }

        $result = $this->db->order_by("district_number", "ASC")->get('districts')->result();

        return $result;
    }

    public function get_orders($property_id)
    {
        $this->db->where('property_id', $property_id);
        $result = $this->db->get('distribution');

        if($result->num_rows() > 0) {
            return $result->result();
        }

        return [];
    }

    public function get_distributions()
    {   
        $this->db->select("*, distribution.status AS dstatus");
        $this->db->join('users_bank_details', 'distribution.investor_id = users_bank_details.user_id');
        return $this->db->get('distribution')->result();
    }

    // GET property_investment where property status is not yet 100%
    public function get_total_order($property_id)
    {
        $this->db->select_sum('units_invested');
        $this->db->where('property_id', $property_id);
        $result = $this->db->get('property_investment')->row();

        if(count($result) > 0){
            return $result;
        }
        
        return [];
    }

    public function get_invesments($property_id = false)
    {
        if($property_id !== false)
        {
            return $this->db->where("property_id", $property_id)
                ->get('property_investment')
                ->result();
        }
    }

    public function get_invesments_percent($property_id = false)
    {
        if($property_id !== false)
        {
            return $this->db->select('SUM(percent_invested) as percent')
                ->where("property_id", $property_id)
                ->get('property_investment')
                ->row()
                ->percent;
        }
    }

    public function has_investment($property_id = false)
    {
        if($property_id !== false)
        {
            $res = $this->db->where("property_id", $property_id)
                ->where('investor_id', $this->session->userdata('user_id'))
                ->get('property_investment');

            if($res->num_rows() > 0) {
                return TRUE;
            }
        }

        return FALSE;
    }
    
    public function get_trust_account($property_id)
    {
        $this->db->where('property_id', $property_id);

        $result = $this->db->get('trust_accounts')->row();

        if(count($result) > 0){
            return $result;
        }
        return [];
    }

    public function insert_trust_account($data)
    {
        $this->db->insert('trust_accounts', $data);

    }

    public function update_trust_account($data)
    {
        $this->db->where('property_id', $data['property_id']);
        $this->db->update('trust_accounts', $data);
    }

    public function get_user($id){

        $this->db->where('id', $id);

        $result = $this->db->get('users')->row();
        if(count($result) > 0){
            return $result;
        }
        return [];
    }

    public function get_user_bank($bank_account_id){

        $this->db->where('bank_account_id', $bank_account_id);

        $result = $this->db->get('users_bank_details')->row();
        if(count($result) > 0){
            return $result;
        }
        return [];
    }

    public function insert_user_bank($data)
    {
        $this->db->insert('users_bank_details', $data);

        return $this->db->insert_id();
    }

    public function update_user_bank($data)
    {
        $this->db->where('bank_account_id', $data['bank_account_id']);
        $this->db->update('users_bank_details', $data);

        return $data['bank_account_id'];
    }

    public function delete_property($data)
    {
        $this->db->where('property_id', $data);
        $this->db->delete('property_images');

        $this->db->where('property_id', $data);
        $this->db->delete('trust_accounts');
		
		$this->db->where('property_id', $data);
        $this->db->delete('watchlist');

        $this->db->where('trust_id', $data);
        $this->db->delete('trust_cash_accounts');
		
		$this->db->where('property_id', $data);
        $this->db->delete('property_investment');
		
		$this->db->where('property_id', $data);
        $this->db->delete('property_valuation');
		
		$this->db->where('property_id', $data);
        $this->db->delete('distribution');
		
		$this->db->where('property_id', $data);
        $this->db->delete('investment_log');
		
		$this->db->where('property_id', $data);
        $this->db->delete('properties');

        return $data;
    }

    public function insert_rental_collections($data)
    {
        return $this->db->insert('rental_collections', $data);
    }

    public function get_rental_collecttion($property_id, $limit = false)
    {
        $this->db->where('property_id', $property_id);
        $this->db->order_by("id", "DESC");
        if($limit){
            $this->db->limit($limit);
        }
        return $this->db->get("rental_collections")->result();
    }

    /**** Images ****/
    public function insert_property_image($data)
    {
        $this->db->insert('property_images', $data);

        return $this->db->insert_id();
    }

    

    public function get_property_images($property_id)
    {        
        $this->db->where('property_id', $property_id);

        $result = $this->db->get('property_images')->result();
        if(count($result) > 0){
            return $result;
        }
        return [];
    }

    public function delete_property_images($property_id)
    {        
        $this->db->where('property_id', $property_id);
        $this->db->delete('property_images');

        return true;
    }

    public function delete_property_image($image_id)
    {
        $this->db->where('image_id', $image_id);
        return $this->db->delete('property_images');
    }


    /**
     * Add property to user's watchlist
     *
     * @param Integer $id -- property's id
     * @param Integer $user -- user's id
     * @return void
     */
    public function add_to_watchlist($id, $user)
    {
        $data = [
            'property_id' => $id,
            'user_id' => $user
        ];

        return $this->db->insert('watchlist', $data);
    }

    /**
     * Remove property to user's watchlist
     *
     * @param Integer $id -- property's id
     * @param Integer $user -- user's id
     * @return void
     */
    public function remove_to_watchlist($id, $user)
    {
        $data = [
            'property_id' => $id,
            'user_id' => $user
        ];

        $this->db->where($data);
        return $this->db->delete('watchlist');
    }

    public function confirm_distribution($id)
    {
        $this->db->where('id', $id);
        return $this->db->uodate('distribution', ['status' => 1]);

    }
}