<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PropertyListing extends MY_Controller {

    protected $valid_actions = [
        'add_to_watchlist', 'remove_to_watchlist'
    ];

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('ion_auth');
        $this->load->model('Property_model');
        $this->load->model('Trust_model');
    }

	public function index()
	{
		$data = array();

        $districts = $this->Property_model->get_districts();
        
        $data['districts'] = $districts;

    	$this->load->view('property-listing-tpl', $data);
	}

    public function property_details($proper_id){
        $data = array();
        /* property individual details */
        $property = $this->Property_model->get_property($proper_id);
        $property_valuation = $this->Property_model->get_property_valuation($proper_id);
        $orders = $this->Property_model->get_orders($proper_id);
        $total_order = $this->Property_model->get_total_order($proper_id);
        $properties = $this->Property_model->random_property($proper_id);
        @$trust_account = $this->Property_model->get_trust_account($proper_id);
        $investment = $this->Property_model->get_invesments($proper_id);
        $hasInvestment = $this->Property_model->has_investment($proper_id);
        $nearby = $this->Property_model->get_nearby_properties($proper_id, 2, 'km');
        $current_user = $this->ion_auth->user()->row();

        $rental = $this->Property_model->get_rental_collecttion($proper_id, 1);
        // GET NO OF UNITS ISSUED
        

        if(empty($this->Property_model->get_trust_account($proper_id)) > 0){
            $units_issued = "";
        }else{
            $units_issued = $this->Property_model->get_trust_account($proper_id)->units_issued;
        }


        $percentage = $this->Property_model->get_invesments_percent($proper_id) / 100;
        $data['property'] = $property;
        $data['property_valuation'] = $property_valuation;
        $data['orders'] = $orders;
        $data['total_order'] = $total_order;
        $data['units_issued'] = $units_issued;
        // die(var_dump($units_issued));
        $data['percentage'] = @$percentage;
        $data['random_properties'] = $properties;
        $data['trust_account'] = $trust_account;
        $data['investment'] = $investment;
        $data['has_investment'] = $hasInvestment;
        $data['nearby'] = $nearby;
        $data['current_user'] = $current_user;
        $data['rental'] = empty($rental) ? 0 : $rental[0]->rental_pct;
        
        $data['investment_limit'] = ($trust_account->units_issued - $total_order->units_invested < 0.30 * $units_issued) ? $trust_account->units_issued - $total_order->units_invested : 0.30 * $units_issued;

        $images = $this->Property_model->get_property_images($proper_id);
        //die(print_r($images));

        $data['images'] = array();
        if(!empty($images))
        {
            $data['images'] = $images;
        }
        /*
        if(!empty($property->images)){
            $data['images'] = array_values(json_decode($property->images, true));
        }else{
            $data['images'] = '';
        }
        */

        $graph = array();
        $graphs = array();
        
        if(count($orders)) {
            foreach($orders as $orders){

                $graph['label'] = date("Y", strtotime($orders->created_at)); //$graph['label'] = date("Y", strtotime($orders->dtstamp));
                $graph['y'] = (int)$orders->amount; //$graph['y'] = (int)$orders->final_amount;

                $graphs[] = $graph;
            }
        }

        $data['data_points'] = json_encode($graphs);
 
        // echo '<pre>';
        // print_r($data);
        // exit;


        /* properties around the area */
        $this->load->view('property-details-postlog-tpl', $data);
    }

	public function ajax($section)
	{
		switch ($section) {
            case 'listings':
                $this->actionListings();
            break;
		}
    }
    
    public function actionListings()
    {
        $data = array();
        $input = $this->input->post();

        $theme      = $input['theme'];
        $district   = $input['district'];
        $valuation  = $input['valuation'];
        $psqft      = $input['psqft'];
        $page       = $input['page'];
        $search     = $input['search'];

        $limit = 4;

        if($page > 1){
            $offset = $limit * ($page - 1);
        }else{
            $offset = 0;
        }
        

        $properties = $this->Property_model->get_property_listings($theme, $district, $valuation, $psqft, $search, $offset, $limit);

        $total_properties = $this->Property_model->get_property_listings($theme, $district, $valuation, $psqft, $search, false, false);

        $count_properties = count($total_properties);
        
        $last = ceil( $count_properties / $limit );

        if($page != 1){
            $prev = $page - 1; 
        }else{
            $prev = $page;
        }

        if($page <= $last){
            $next = $page + 1;
        }else{
            $next = $page;
        }

        $data['count_properties'] = $count_properties;
        $data['properties'] = $properties;
        $data['page'] = $page;
        $data['last'] = $last;
        $data['prev'] = $prev;
        $data['next'] = $next;
        $data['theme'] = $theme;
        $data['district'] = $district;
        $data['valuation'] = $valuation;
        $data['psqft'] = $psqft;

        
        $this->load->view('ajax/property-listing-ajax', $data);
    }

    public function actionAddToWatchlist($id)
    {
        $user = $this->session->userdata('user_id');
        if($this->Property_model->add_to_watchlist($id, $user)) {
            $data = [
                'success' => TRUE
            ];
        } else {
            $data = [
                'success' => FALSE
            ];
        }

        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function actionRemoveToWatchlist($id)
    {
        $user = $this->session->userdata('user_id');
        if($this->Property_model->remove_to_watchlist($id, $user)) {
            $data = [
                'success' => TRUE
            ];
        } else {
            $data = [
                'success' => FALSE
            ];
        }

        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}