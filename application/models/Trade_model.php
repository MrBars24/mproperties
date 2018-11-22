<?php

class Trade_model extends CI_Model {
	
	public function __construct()
	{                
		parent::__construct();
	}

    public function get_all_trades($property_id = false, $units = false, $final_amount = false, $status = false, $order_by = false){

        if($property_id) $this->db->like('property_id', $property_id);
        if($units) $this->db->like('units_invested', $units);
        if($final_amount) $this->db->like('net_invested_amount', $final_amount);
        if($status) $this->db->like('status', $status);
        $this->db->where('is_fulfilled', 1);

        if($order_by) $this->db->order_by($order_by);

        $result = $this->db->get('property_investment')->result();

        return $result;
    }

    public function get_trade($trade_id)
    {

        $this->db->where('trade_id', $trade_id);

        $result = $this->db->get('trades')->row();
        return $result;
    }

    public function update_trade($data)
    {
        $this->db->where('trade_id', $data['trade_id']);
        $this->db->update('trades', $data);
    }

    public function get_user($id){

        $this->db->where('id', $id);

        $result = $this->db->get('users')->row();
        return $result;
    }

    public function get_user_bank($bank_account_id){

        $this->db->where('bank_account_id', $bank_account_id);

        $result = $this->db->get('users_bank_details')->row();
        return $result;
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

    public function delete_trade($data)
    {
        $this->db->where('trade_id', $data);
        $this->db->delete('trades');

        return $data;
    }
}