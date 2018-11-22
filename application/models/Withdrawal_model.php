<?php

class Withdrawal_model extends CI_Model {
	
	public function __construct()
	{                
		parent::__construct();
		$this->load->model('Transaction_model');
	}

	public function get_all_withdrawals($user = false, $fname = false, $lname = false, $amount = false, $date_deposit = false, $date_approved = false, $status = false, $order_by = false){

		$this->db->select('fund_transactions.*, users.id as user_id, users.first_name, users.last_name');
		$this->db->from('fund_transactions');        

		$this->db->join('users', 'users.id = fund_transactions.user_id');
		$this->db->group_start(); // for grouping of SQL WHERE clause
		$this->db->like('users.first_name', $user);
		$this->db->or_like('users.last_name', $user);
		$this->db->group_end();
		
		$this->db->where('transaction_type',$this->config->item('funds_withdrawal'));

		if($user) $this->db->where('users.id', $user);
		if($fname) $this->db->like('users.first_name', $fname);
		if($lname) $this->db->like('users.last_name', $lname);
		if($amount) $this->db->like('fund_transactions.amount', $amount);
		if($date_deposit) $this->db->like('fund_transactions.date_deposit', $date_deposit);
		if($date_approved) $this->db->like('fund_transactions.date_approved', $date_approved);
		if($status !== false) $this->db->like('fund_transactions.status', $status);

		if($order_by) $this->db->order_by($order_by);

		$result = $this->db->get()->result();

		return $result;
	}

	public function get_withdrawal($deposit_id){
		$this->db->where('id', $deposit_id);

		$result = $this->db->get('fund_transactions')->row();
		return $result;
	}

	public function update_withdrawal($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('fund_transactions', $data);
	}

	public function get_user_withdrawal($user_id, $amount = false, $ref_number = false, $date_deposit = false, $date_approved = false, $order_by = false){

		$this->db->where('user_id', $user_id);

		if($amount) $this->db->like('amount', $amount);
		if($ref_number) $this->db->like('ref_number', $ref_number);
		if($date_deposit) $this->db->like('date_deposit', $date_deposit);
		if($date_approved) $this->db->like('date_approved', $date_approved);

		if($order_by) $this->db->order_by($order_by);

		$result = $this->db->get('deposits')->result();

		return $result;
	}
	
	/**
	 * add_withdrawal
	 *
	 * @return void
	 */
	public function add_withdrawal($data)
	{
		$withdrawal = $this->db->insert('fund_transactions', $data);
		return $withdrawal;
	}
}