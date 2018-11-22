<?php

class Email_model extends CI_Model {


	function get_message($id)
	{
		$res = $this->db->where('id', $id)->get('email_templates');
		return $res->row_array();
	}

	function get_email_group($id)
	{
		$res = $this->db->where('id', $id)->get('email_groups');
		return $res->row_array();
	}
}