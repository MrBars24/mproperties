<?php

class Transaction_model extends CI_Model {
	
	public function __construct()
	{                
		parent::__construct();
	}

	/**
	 * Get list transaction functionality
	 *
	 * @return Query
	 */
	public function get_transactions()
	{
		$this->db->select("*, 
				case transaction_type
					when {$this->config->item('funds_deposit')} then 'Funds deposit' 
					when {$this->config->item('funds_withdrawal')} then 'Funds withdrawal'
					when {$this->config->item('investment_purchase')} then 'Investment Purchase'
					when {$this->config->item('investment_sold')} then 'Investment Sold'
					when {$this->config->item('rental_income')} then 'Rental Income'
	 			end as type")
			->where('user_id', $this->session->userdata('user_id'))
			->order_by('created_at', 'DESC');
		
		if($this->input->get('types')) {
			$this->db->where('transaction_type', $this->input->get('types'));
		}

		if($this->input->get('duration')) {
			$this->db->where('created_at BETWEEN NOW() - INTERVAL '. $this->input->get('duration') .' MONTH AND NOW()', '', false);
		}

		$query = $this->db->get('fund_transactions');
		return $query->result();
	}

	public function add_transaction($data)
	{
		return $this->db->insert('fund_transactions', $data);
	}

	/**
	 * Get investment 90% investment above
	 *
	 * @return Query
	 */
	public function get_close_investment($type = 'array')
	{	
		$res = $this->db->select('
			SUM(remaining) as close_complete_investment_total, 
			COUNT(*) as close_complete_investment_count')
			->from('(
				SELECT
					property_id,
					(SELECT IF(COUNT(*) > 0, 1, 0) FROM property_investment WHERE property_investment.investor_id = '. $this->session->userdata("user_id") .' and property_investment.property_id = p_investment.property_id) as is_mine,
					SUM(invested_amount) AS total_invested_amount,
					(
						(
							SELECT
								nav
							FROM
								trust_accounts
							WHERE
								trust_accounts.property_id = p_investment.property_id
						) - SUM(invested_amount)
					) AS remaining,
					(
						SELECT
							nav
						FROM
							trust_accounts
						WHERE
							trust_accounts.property_id = p_investment.property_id
					) AS nav,
					(
						SELECT
							SUM(percent_invested)
						FROM
							property_investment pi
						WHERE
							pi.property_id = p_investment.property_id
					) AS percent
				FROM
					property_investment as p_investment
				GROUP BY
					property_id
				HAVING
					percent > 75 AND percent < 99
			) AS temp_investment')
			->where('is_mine', 1)
			->get();

		$result = $res->row();
		if($result->close_complete_investment_count > 0) {
			if($type == 'array') {
				return [
					'close_complete_investment_total' => $result->close_complete_investment_total,
					'close_complete_investment_count' => $result->close_complete_investment_count
				];
			} else {
				return $result;
			}
		}

		return [];
	}

	/**
	 * Get balance either credit or debit
	 *
	 * @param mixed $type -- values (credit | debit)
	 * @return Query
	 */
	public function get_balance()
	{
		$this->db->trans_start();
		
		// get all credits
		$balance = $this->db->select('IF(SUM(amount) > 0, SUM(amount), 0) as total')
			->where('status', 1)
			->where('user_id', $this->session->userdata('user_id'))
			->get('fund_transactions')
			->row()
			->total;

		// get pending investments
		$pending_investment = $this->db->select('SUM(absolute_amount) as total, COUNT(fund_transactions.id) as count')
			->join('properties', 'properties.property_id = fund_transactions.table_id')
			->where('transaction_type', $this->config->item('investment_purchase'))
			->where('fund_transactions.status', 1)
			->where('properties.is_fulfilled', 0)
			->where('user_id', $this->session->userdata('user_id'))
			->get('fund_transactions')
			->row();

		$this->db->trans_complete();

		return [
			'credit_balance' => $balance,
			'pending_investment' => $pending_investment->total,
			'pending_investment_count' => $pending_investment->count
		];
	}

	public function get_portfolio($user_id)
	{
		$res = $this->db->select('properties.*, original_investment.units_invested, latest_valuation.property_value, latest_valuation.nav, original_investment.investor_id, original_investment.invested_amount,
				(latest_valuation.nav / original_investment.invested_amount - 1) as profit,
				((SELECT SUM(amount) FROM distribution WHERE investor_id = '. $this->session->userdata('user_id') .' ORDER BY created_at DESC LIMIT 4) + (SELECT SUM(amount) FROM trust_cash_accounts INNER JOIN trust_accounts ON trust_cash_accounts.trust_id = trust_accounts.trust_id WHERE trust_accounts.property_id = properties.property_id ORDER BY trust_cash_accounts.created_at DESC LIMIT 4) / original_investment.invested_amount - 1) as rental_yield')
			->from('properties')
			->join('(SELECT `property_id`, `property_value`, `property_value_tax`, `property_value_cash`, `nav`, `total_units`, `price_per_unit`, `is_distribution`, `return`, `setup_cost` 
				FROM property_valuation ORDER BY created_at DESC LIMIT 1) as latest_valuation', 'properties.property_id = latest_valuation.property_id')
			->join('(SELECT `property_id`, `investor_id`, `date_of_investment`, `invested_amount`, `units_invested`, `status`, `is_fulfilled`, `percent_invested`, `property_value`, `bsd`, `absd`, `cash`, 
				`setup_cost`, `return_pct` FROM investment_log WHERE is_original = 1) as original_investment', 'latest_valuation.property_id = original_investment.property_id')
			->where('investor_id', $this->session->userdata('user_id'))
			->get();

		if($res->num_rows() > 0) {
			return $res->result();
		}
		
		return [];
	}
	
	/**
	 * Get Investment List
	 * pending or completed investment 
	 * can be filter using parameter boolean
	 *
	 * @param boolean $isFulfilled -- (TRUE or FALSE)
	 * @param boolean $forUser -- (1 for completed, 2 for processing, 1 for pending) to return all investment
	 * @return void
	 */
	public function get_investment($isFulfilled = NULL, $forUser = FALSE, $percent = false)
	{
		$this->db->select('*, SUM(units_invested) as total_units_invested, SUM(invested_amount) as total_invested_amount,
				(SELECT units_issued FROM trust_accounts where trust_accounts.property_id = a.property_id) as units_issued,
				(SELECT sum(units_invested) FROM property_investment WHERE a.property_id = property_id) as current_investments,
				(SELECT sum(percent_invested) FROM property_investment WHERE a.property_id = property_id) as percent')
			->join('properties', 'properties.property_id = a.property_id');
		
		if($percent){
			$this->db->having(["percent > " => 80, " percent < " => 99]);
		}

		if(!$forUser) {
			$this->db->where('investor_id', $this->session->userdata('user_id'));
		}

		if($isFulfilled == 0) {
			$this->db->where('properties.is_fulfilled', 0);
		}

		if($isFulfilled == 1) {
			$this->db->where('properties.is_completed', 1);
		}

		if($isFulfilled == 2) {
			$this->db->where('properties.is_fulfilled', 1);
			$this->db->where('properties.is_completed', 0);
		}

		$this->db->group_by('a.property_id');
		$res = $this->db->get('property_investment a');

		if($res->num_rows() > 0) {
			return $res->result();
		}
		
		return [];
	}

	/**
	 * Add Investment
	 *
	 * @return void
	 */
	public function add_investment($data)
	{
		$this->load->helper('date');

		$this->db->insert('fund_transactions', [
			'user_id' => $data['investor_id'],
			'transaction_type' => $this->config->item('investment_purchase'),
			'amount' => -$data['invested_amount'],
			'absolute_amount' => $data['invested_amount'],
			'status' => 0,
			'table' => 'properties',
			'table_id' => $data['property_id']
		]);

		$this->db->insert('property_investment', $data);
		$id = $this->db->insert_id();

		$percent = $this->checkPropertyStatus($data['property_id']);
		if($percent >= 99.99) {
			// set property status to fulfilled
			$this->load->model('property_model');
			$this->property_model->update_property([
				'is_fulfilled' => 1,
				'fulfilled_at' => date('Y-m-d h:i:s'),
				'property_id' => $data['property_id']
			]);

			$this->db->where('property_id', $data['property_id'])
				->update('property_investment', ['is_fulfilled' => 1]);

			// update fund transaction
			$this->db->where('table_id', $data['property_id'])
				->where_in('user_id', "(SELECT id FROM property_investment WHERE property_investment.property_id = {$data['property_id']})")
				->update('fund_transactions', ['status' => 1]);

			$d = [
				'type_id' => $this->config->item('n_fulfillment'),
				'receiver_id' => 0,
				'receiver_type' => 'admin',
				'sender_id' => $this->session->userdata('user_id'),
				'sender_type' => 'user',
				'link' => 'admin/property?fulfilled=1',
				'summary' => 'Property Fulfilled',
				'message' => 'this property needs to process paper works'
			];

			$this->load->model('notification_model');
			$this->notification_model->insert_notification($d);

			$type = config('n_fulfillment');
			$sub_query = "SELECT $type as type_id ,investor_id, 'user' as receiver_type, 0 as sender_id, 'system' as sender_type, CONCAT('property-details/', properties.property_id) as link, 'Property Completed' as summary, CONCAT('Property ', properties.property_name ,' has been completed') as message
				 FROM property_investment INNER JOIN properties ON properties.property_id = property_investment.property_id where property_investment.property_id = {$data['property_id']}";

			$this->notification_model->insert_sub_notification(implode(',', array_keys($d)), $sub_query);
		}

		return $id;
	}

	/**
	 * Update Investment
	 *
	 * @return void
	 */
	public function update_investment($data)
	{
		$this->load->helper('date');

		$ids = $data['property'];
		unset($data['property']);

		$this->db->where('table', 'properties');
		$this->db->where('table_id', $ids);
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->update('fund_transactions', [
			'amount' => -$data['invested_amount'],
			'absolute_amount' => $data['invested_amount'],
		]);

		$this->db->where('property_id', $ids);
		$this->db->where('investor_id', $this->session->userdata('user_id'));
		$this->db->update('property_investment', $data);

		$percent = $this->checkPropertyStatus($ids);
		if($percent >= 99.99) {
			// set property status to fulfilled
			$this->load->model('property_model');
			$this->db->where('property_id', $ids);
			$this->property_model->update_property([
				'is_fulfilled' => 1,
				'fulfilled_at' => date('Y-m-d h:i:s'),
				'property_id' => $ids
			]);

			$sql = "INSERT INTO investment_log(`id`, `property_id`, `investor_id`, `date_of_investment`, `invested_amount`, `units_invested`, `status`, `is_fulfilled`, `percent_invested`, `property_value`, `bsd`, `absd`, `cash`, `setup_cost`, `created_at`, `updated_at`, `is_original`) 
					SELECT `id`, `property_id`, `investor_id`, `date_of_investment`, `invested_amount`, `units_invested`, `status`, `is_fulfilled`, `percent_invested`, `property_value`, `bsd`, `absd`, `cash`, `setup_cost`, `created_at`, `updated_at`, 1 as `is_original` FROM property_investment 
					WHERE property_id = $ids";
			$this->db->query($sql);

			$this->db->where('property_id', $ids)
				->update('property_investment', ['is_fulfilled' => 1]);

			$data = [
				'type_id' => $this->config->item('n_fulfillment'),
				'receiver_id' => 0,
				'receiver_type' => 'admin',
				'sender_id' => $this->session->userdata('user_id'),
				'sender_type' => 'user',
				'link' => 'admin/property?fulfilled=1',
				'summary' => 'Property Fulfilled',
				'message' => 'this property needs to process paper works'
			];

			$this->load->model('Notification_model');
			$this->Notification_model->insert_notification($data);
		}

		return $id;
	}

    /**
     * Get transactions by status functionality
     *
     * @return Query
     */
    public function get_transactions_by_status($status)
    {

        $this->db->where('opened', 0);
        $this->db->where('status', $status);
        $this->db->order_by('created_at');

        $result = $this->db->get('fund_transactions')->result();

        return $result;
	}

	

	public function open_deposits()
	{
		$this->db->where('opened', 0);

        $this->db->set('opened', 1);
        $this->db->set('opened_at', 'NOW()', false);

        $this->db->update('fund_transactions');
	}

	public function open_withdrawals()
	{
		$this->db->where('opened', 0);

        $this->db->set('opened', 1);
        $this->db->set('opened_at', 'NOW()', false);

        $this->db->update('fund_transactions');

	}
	
	public function cancel_order($id, $notif_system = false)
	{
		$this->db->trans_start();
		
		$this->db->where('table', 'properties')
			->where('table_id', $id)
			->where('user_id', $this->session->userdata('user_id'))
			->delete('fund_transactions');

		$this->db->where('property_id', $id)
			->where('investor_id', $this->session->userdata('user_id'))
			->delete('property_investment');

		$this->db->where('property_id', $id)
			->where('investor_id', $this->session->userdata('user_id'))
			->update('property_investment', ['is_fulfilled' => 0]);

		$this->db->where('property_id', $id)
			->update('properties', ['is_fulfilled' => 0]);
		
		$this->db->trans_complete();

		$d = [
			'type_id' => $this->config->item('n_fulfillment'),
			'receiver_id' => 0,
			'receiver_type' => 'admin',
			'sender_id' => $this->session->userdata('user_id'),
			'sender_type' => 'user',
			'link' => 'admin/property?fulfilled=1',
			'summary' => 'Property Fulfilled',
			'message' => 'this property needs to process paper works'
		];

		$this->load->model('notification_model');
		$this->notification_model->insert_notification($d);

		if($notif_system){
			$message = "CONCAT(properties.property_name ,' was cancelled by the system') as message";
		}else{
			$message = "CONCAT((SELECT 
							CONCAT(first_name, ' ', last_name) 
						FROM users 
						WHERE id = {$_SESSION['user_id']}) ,' cancelled his/her investment on ', properties.property_name) as message";
		}

		$type = config('n_cancel_order');
		$sub_query = "	SELECT 
							$type as type_id ,
							investor_id, 
							'user' as receiver_type, 
							{$_SESSION['user_id']} as sender_id, 
							'user' as sender_type, 
							CONCAT('property-details/', properties.property_id) as link, 'Property Cancelled' as summary, 
							{$message}
			 			FROM property_investment 
						INNER JOIN properties
						ON properties.property_id = property_investment.property_id 
						WHERE property_investment.property_id = {$id}";

		$this->notification_model->insert_sub_notification(implode(',', array_keys($d)), $sub_query);

		return $this->db->trans_status();
	}

	public function updateExpiredDeposit()
	{
		$this->db->where('created_at <= NOW() - INTERVAL 10 DAY')
			->where('status', 0)
			->set('status', -1)
			->set('expired_at', 'NOW()', false)
			->update('fund_transactions');
	}

	public function markCompleteProperty($property_id)
	{
		// set property status to complete
		$this->load->model('property_model');
		$this->db->where('property_id', $property_id);
		$this->property_model->update_property([
			'is_completed' => 1,
			'completed_at' => date('Y-m-d h:i:s'),
			'property_id' => $property_id
		]);

		// insert investment to logs
		$sql = "INSERT into investment_log(`property_id`, `investor_id`, `date_of_investment`, `invested_amount`, `units_invested`, `status`, `is_fulfilled`, `percent_invested`, `property_value`, `bsd`, `absd`, `cash`, `setup_cost`, `return_pct`, `created_at`, `updated_at`, `is_original`)
			SELECT `property_id`, `investor_id`, `date_of_investment`, `invested_amount`, `units_invested`, `status`, `is_fulfilled`, `percent_invested`, `property_value`, `bsd`, `absd`, `cash`, `setup_cost`, `return_pct`, `created_at`, `updated_at`, 1 FROM property_investment
			WHERE property_id = $property_id";
		$this->db->query($sql);
	}

	// helpers
	public function checkPropertyStatus($property)
	{
		$percent = $this->db->select('SUM(percent_invested) as percent')
			->where('property_id', $property)
			->get('property_investment')
			->row()
			->percent;

		return $percent;
	}

}