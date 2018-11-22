<?php
class Notification_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function insert_notification($data)
	{
		return $this->db->insert('notification', $data);
	}

	public function insert_sub_notification($fields, $query)
	{
		$sql = "INSERT INTO notification($fields) $query";
		return $this->db->query($sql);
	}

	public function get_notifications($type_id = [])
	{	


		
		$user_info = $this->ion_auth->get_users_groups($_SESSION['user_id'])->row();
		$this->db->where('receiver_id', $this->session->userdata('user_id'));

		if($type_id) {
			$this->db->or_where_in('type_id', $type_id);
		}

		// filter with user group id
		$this->db->where('receiver_type', strtolower($user_info->name));

		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(5);
		return $this->db->get('notification')->result();
		
	}

	public function get_notification_by_user($limit = false, $offset = false)
	{

		if($limit){
			$this->db->limit($limit, $offset);
		}

		$this->db->where('receiver_id', $this->session->userdata('user_id'));
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get('notification')->result();
	}

	public function get_unread_notif_by_user()
	{
		$this->db->where('receiver_id', $this->session->userdata('user_id'));
		$this->db->where('read_at IS NULL');
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get('notification')->result();
	}

	public function update_unread_notif()
	{	
		$this->db->where('receiver_id', $_SESSION['user_id']);
		$this->db->where('read_at IS NULL');
		$this->db->update('notification', ['read_at' => date("Y-m-d H:i:s")]);
	}


}