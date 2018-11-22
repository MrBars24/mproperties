<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->load->model(array('Users_model', 'Deposit_model', 'Withdrawal_model', 'Property_model', 'Transaction_model', 'Order_model'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}


	public function index()
	{	

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('admin/login', 'refresh');

		}else{
			$data = array();

            menu::setSelected('dashboard');

            $data['count_admin'] = 0;
            $data['count_organizer'] = 0;
            $data['count_speaker'] = 0;

            $data['group_id'] = $this->ion_auth->get_users_groups()->row()->id;

			$properties = $this->Property_model->get_all_properties();
			$data['properties'] = count($properties);

			$this->db->where("is_fulfilled", 1);
			$completed_investments = $this->Property_model->get_all_properties();
			$data['completed_investments'] = count($completed_investments);

			
			$orders = $this->Order_model->get_all_orders();
			$data['orders'] = count($orders);

			$this->db->limit(5);
			$data['recent_orders'] = $this->Order_model->get_all_orders(false, false, false, false, "property_investment.id DESC", false);
			

			if($data['group_id'] == 8){

				$this->db->where('for_approval', 1);
				$for_approval = $this->Users_model->get_all_users('', '', '', '', false, false, '',5);
				$data['for_approval'] = count($for_approval);

			} else if($data['group_id'] == 9){

				$this->db->where('fund_transactions.status', 0);
				$deposits = $this->Deposit_model->get_all_deposits();
				
				$this->db->where('fund_transactions.status', 0);
				$withdrawal = $this->Withdrawal_model->get_all_withdrawals();

			
				$data['deposits'] = count($deposits);
				$data['withdrawals'] = count($withdrawal);

			}
           
			
			
			$this->load->view('admin/admin-home-tpl', $data);			
		}
	}

	public function login(){
		$data = array();

		//validate form input
		$this->form_validation->set_rules('username', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				if($this->session->userdata('page_url')){
					redirect($this->session->userdata('page_url'));
				}else{
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					$this->session->set_flashdata([
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password')
					]);
					redirect('admin', 'refresh');
				}
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				$this->session->set_flashdata([
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				]);
				redirect('admin/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}else{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->load->view('admin/login-tpl', $data);
		}
	}	
}