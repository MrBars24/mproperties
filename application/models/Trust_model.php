<?php

class Trust_model extends CI_Model {
	
	public function __construct()
	{                
		parent::__construct();
	}

    public function get_trust_account($property_id){

        $this->db->where('property_id', $property_id);

        $result = $this->db->get('trust_accounts')->row();
        return $result;
    }

    public function add_trust_cash_account($data)
    {
        return $this->db->insert("trust_cash_accounts", $data);
    }

    public function cash_account_sum($trust_id, $type)
    {
        $this->db->select("SUM(amount) AS total_amount");
        $this->db->where("type", $type);
        $this->db->where("trust_id", $trust_id);
        return $this->db->get("trust_cash_accounts")->row()->total_amount;

    }

    public function get_trust_cash_account($trust_id){
        $this->db->order_by("created_at", "DESC");
        return $this->db->get_where("trust_cash_accounts", ["trust_id" => $trust_id])->result();
    }

}