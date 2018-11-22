<?php

class Page_model extends CI_Model {
	
	public function __construct()
	{                
		parent::__construct();
    }

    public function save_inquiry($data)
    {
        return $this->db->insert('inquiry', $data);
    }
}