<?php

class Users_model extends CI_Model {
	
	public function __construct()
	{                
		parent::__construct();
	}

	public function get_all_users($first_name = false, $last_name = false, $id = false, $email = false, $address = false, $phone = false ,$order_by = false, $user_group){

		$this->db->join('users_groups', 'users.id = users_groups.user_id');
		$this->db->where('users_groups.group_id', $user_group);

		if($id) $this->db->like('users.id', $id);
		if($first_name) $this->db->like('first_name', $first_name);
		if($last_name) $this->db->like('last_name', $first_name);
		if($email) $this->db->like('email', $email);
		if($address) $this->db->like('address', $address);
		if($phone) $this->db->like('phone', $phone);
		if($order_by) $this->db->order_by($order_by);

		$result = $this->db->get('users')->result();

		return $result;
	}

	public function get_user_banks($user_id, $bank_name = false, $account_name = false, $account_no = false, $order_by = false){

		$this->db->where('user_id', $user_id);

		if($bank_name) $this->db->like('bank_name', $bank_name);
		if($account_name) $this->db->like('account_name', $account_name);
		if($account_no) $this->db->like('account_no', $account_no);

		if($order_by) $this->db->order_by($order_by);

		$result = $this->db->get('users_bank_details')->result();

		return $result;
	}

	public function get_user($id){

		$this->db->where('id', $id);

		$result = $this->db->get('users')->row();
		return $result;
	}

	public function get_user_group($id)
	{
		$this->db->where('user_id', $id);

		$result = $this->db->get('users_groups')->row();
		return $result;
	}

	public function get_user_by_activation_code($activation_code){

		$this->db->where('activation_code', $activation_code);

		$result = $this->db->get('users')->row();
		return $result;
	}

	public function get_user_by_email($email)
	{

		$this->db->where('email', $email);

		$result = $this->db->get('users')->row();
		return $result;
	}

	public function get_user_bank($bank_account_id){

		$this->db->where('bank_account_id', $bank_account_id);

		$result = $this->db->get('users_bank_details')->row();
		return $result;
	}
	//bank fetch user bank details
	public function get_bank_by_user($user_id){

		$this->db->where('user_id', $user_id);

		$result = $this->db->get('users_bank_details')->result();
		return $result;
	}

	public function get_account_by_user($user_id){

		$this->db->where('id', $user_id);

		$result = $this->db->get('users')->result();
		return $result;
	}

	public function get_invesments($user_id = false, $completed = false)
    {
        if($user_id !== false)
        {	
			if($completed){
				$this->db->where("property_id !=", $completed);
				$this->db->where("is_fulfilled !=", 1);
			}

            return $this->db->where("investor_id", $user_id)
                ->get('property_investment')
                ->result();
        }
	}

	public function get_current_user_investments($property_id)
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->where("investor_id", $user_id);
		$this->db->where("property_id", $property_id);
		return $this->db->get('property_investment')->row();
	}

	public function last_user_id(){
		$this->db->limit(1);
		$this->db->order_by('id', 'DESC');
		return $this->db->get("users")->row()->id;
	}

	public function insert_user_bank($data)
	{
		$this->db->insert('users_bank_details', $data);

		return $this->db->insert_id();
	}

	public function update_user_bank($data)
	{

		$summary = $this->computeProfilePercentage();

		if($this->get_user_group($this->session->userdata('user_id'))->group_id != 8){
			if($summary['total_percent'] == 75) {
				$data['kyc_status'] = 0;
				$data['for_approval'] = 1;
			}
		}

		$this->db->where('bank_account_id', $data['bank_account_id']);
		$this->db->update('users_bank_details', $data);

		return $data['bank_account_id'];
	}

	//newly added
	public function update_account_information($data)
	{
        // $this->db->where('id', $data['id']);
        // $this->db->update('users', $data);

		$summary = $this->computeProfilePercentage();
		
		if($this->get_user_group($this->session->userdata('user_id'))->group_id != 8){
			if($summary['total_percent'] == 75) {
				$data['kyc_status'] = 0;
				$data['for_approval'] = 1;
			}
		}
		
		
		$this->db->where('id', $data['id']);
		$this->db->update('users', $data);

		return $data['id'];
	}

	 public function update_personal_information($data)
	{

		$summary = $this->computeProfilePercentage();

		if($this->get_user_group($this->session->userdata('user_id'))->group_id != 8){
			if($summary['total_percent'] == 75) {
				$data['kyc_status'] = 0;
				$data['for_approval'] = 1;
			}
		}
		
		$this->db->where('id', $data['id']);
		$this->db->update('users', $data);
		
		return $data['id'];
	}

	 public function update_document($data)
	{

		$summary = $this->computeProfilePercentage();

		if($this->get_user_group($this->session->userdata('user_id'))->group_id != 8){
			if($summary['total_percent'] == 75) {
				$data['kyc_status'] = 0;
				$data['for_approval'] = 1;
			}
		}
		
		$this->db->where('id', $data['id']);
		$this->db->update('users', $data);

		return $data['id'];
	}

	 public function delete_user_bank($data)
	{
		$array = array('bank_account_id' => $data['bank_account_id'], 'user_id' => $data['user_id'] );

		$this->db->where($array);
		$this->db->delete('users_bank_details');

		return $data['bank_account_id'];
	}

	public function delete_user($data)
	{

		$this->db->where('user_id', $data);
		$this->db->delete('users_groups');
		$this->db->where('id', $data);
		$this->db->delete('users');
	
		return $data;
	}

	public function insert_real_estate_agent($user_id)
	{
		$this->db->insert('users', array('user_id' => $user_id));

		return $this->db->insert_id();
	}

	public function get_promoter_commisions($promoter_id)
	{
		$this->db->where('promoter_id', $promoter_id);

		$result = $this->db->get('promoter_commisions')->result();
		return $result;
	}

	public function get_promoter_referrals($promoter_id)
	{
		$this->db->where('promoter_id', $promoter_id);

		$result = $this->db->get('promoter_referrals')->result();
		return $result;
	}

	public function get_promoter_transactions($promoter_id)
	{
		$referrals = $this->get_promoter_referrals($promoter_id);

		$result = array();
		foreach($referrals as $referral){

			$this->db->where('promoter_referral_id', $referral->promoter_referral_id);

			$result[] = $this->db->get('promoter_transactions')->row();
		}

		return $result;
	}
	
	public function add_kyc_user($data)
	{
		$this->db->insert('users', $data);
		$user_id = $this->db->insert_id();
		$userGroupData = array(
			'user_id' => $user_id,
			'group_id' => 8,
		);
		$this->db->insert('users_groups',$userGroupData);
	}

	public function update_kyc_user($kyc_id, $data)
	{
		$this->db->where('id', $kyc_id);
		$this->db->update('users', $data);
	}

	public function delete_kyc_user($kyc_id)
	{   
		$this->db->where('id', $kyc_id);
		$this->db->delete('users');
	}

	public function get_kyc_user($kyc_id)
	{
		$this->db->where('id', $kyc_id);
		$result = $this->db->get('users')->row();
		return $result;
	}

	public function get_all_kyc_users($first_name = false, $last_name = false, $username = false, $email = false, $order_by = false)
	{
		if($username) $this->db->like('username', $username);
		if($first_name) $this->db->like('first_name', $first_name);
		if($last_name) $this->db->like('last_name', $first_name);
		if($username) $this->db->like('email', $username);
		if($order_by) $this->db->order_by($order_by);
		$this->db->where('active',0);
		$result = $this->db->get('users')->result();

		return $result;
	}


	// helper

	/**
	 * Computation function for Profile Percentage
	 *
	 * @param mixed $user
	 * @return void
	 */
	public function computeProfilePercentage($user = NULL)
	{
		if(empty($user)) {
			$user = $this->Users_model->get_user($this->session->userdata('user_id'));
		}

		$requirements = [
			'personal' => [
				'first_name', 'last_name', 'phone', 'dob', 'us_resident', 'nationality'
			],
			'residential' => [
				'residence_country', 'postal_code', 'address', 'unit_no'
			],
			'occupation' => [
				'employment_status', 'occupation', 'annual_income', 'is_accredited_investor', 'is_holding_public_office', 'account_fund_source'
			],
			'documents' => [
				'billing_scan', 'id_scan', 'id_scan_back'
			]
		];
		
		$data = [
			'personal' => 'required',
			'residential' => 'required',
			'occupation' => 'required',
			'documents' => 'required',
			'total_percent' => 0,
			'status' => $user->is_complete
		];

		foreach($requirements as $key => $require) {
			$is_complete = TRUE;

			foreach($require as $r) {
				if(is_null($user->$r) || strlen($user->$r) <= 0) {
					$is_complete = FALSE;
					break;
				}
			}

			if($is_complete) {
				$data['total_percent'] += 25;
				$data[$key] = 'completed';
			} 
		}

		return $data;
	}
	

	/**
	 * checks if user logged is validated account
	 *
	 * @return Integer -- value (1 = validated, 2 = pending, 0 = no action yet)
	 */
	public function isValidatedAccount($user_id = NULL)
	{
		if(empty($user_id)) {
			$user_id = $this->session->userdata('user_id');
		}

		$res = $this->db->select('kyc_status')
			->where('id', $user_id)
			->get('users')
			->row()
			->kyc_status;

		return $res;
	}

	public function get_subscribers()
	{
		return $this->db->get('user_emails')->result();
	}

	public function insert_subscriber($data)
	{
		$this->db->insert('user_emails', $data);
	}

}