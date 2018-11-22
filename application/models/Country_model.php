<?php

class Country_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_countries()
	{
		$res = $this->db->order_by('priority', 'DESC')
			->get('countries');

		return $res->result();
	}
}