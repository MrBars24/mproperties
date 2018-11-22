<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

	protected $valid_actions = [
		'update_account_information', 
		'update_personal_information', 
		'update_residential_information', 
		'update_occupation_information', 
		'update_document', 
		'login', 
		'reset_password',
		'register',
		'account_validation',
		'update_all_information'
	];

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('ion_auth');
		$this->load->model('Users_model');
		$this->load->model('ion_auth_model'); 
		$this->load->model('Notification_model');
		$this->load->library('PHPtoJS',['namespace' => 'microproperties']);        
	}

	public function index()
	{
		$data = array();	

		$data['login_error_msg'] = $this->session->flashdata('message');

		$this->load->view('home-tpl', $data);
	}

	public function activate($activation_code)
	{
		$data = array();    

		$user_info = $this->Users_model->get_user_by_activation_code($activation_code);

		if(!empty($user_info) && $user_info->is_password_updated == 0){

			$data['user_info'] = $user_info;

			$this->session->set_userdata(['temp_user_info'=>$user_info]);
			$this->load->view('activate-tpl', $data);

		}else{
			
			redirect('/');
		}

	}

	function activate_account(){
		

		$this->form_validation->set_rules('new_password', 'Password', 'required');
			
		$temp_user_info = $this->session->userdata('temp_user_info');

		if ($this->form_validation->run() == TRUE)
		{        
			$password   = $this->input->post('new_password');
			$user_id 	= $temp_user_info->id;//$this->input->post('user_id');

			$temp_user_info = $this->Users_model->get_user($user_id);

			$save_data = array(
				'password' => $password,
				'activation_code' => '',
				'status' => 'verified',
			);

			$this->ion_auth->update($user_id, $save_data);

			$remember = false;

			if ($this->ion_auth->login($temp_user_info->email, $password, $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				//Check for KYC                                
				if($temp_user_info->is_complete==0)
				{
					$this->session->set_userdata(['show_kyc_overlay'=>1]);
				}
				
				if($this->session->userdata('page_url')){
					redirect($this->session->userdata('page_url'));
				}else{
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('/', 'refresh');
				}
			}          
		}
	}

	public function forgot_password()
	{
		$this->form_validation->set_rules('email', 'Email Address', 'required');

		if ($this->form_validation->run() == false) {

			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
			);

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->load->view('account/forgot-password-tpl', $this->data);
		} else {

			$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));
			if ($forgotten) {
				$this->session->set_flashdata('message', $this->ion_auth->messages());

				$user_info = $this->Users_model->get_user_by_email($this->input->post('email'));
				//send email
				sendResetPassword($user_info);
				redirect('users/forgot_password', 'refresh');
			} else {
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('users/forgot_password', 'refresh');

			}
		}
	}

	public function reset_password($code)
	{
		$user = $this->ion_auth->forgotten_password_check($code);
		if($user) {
			$this->load->view('account/reset-password');
		} else {
			redirect('/');
		}
		// echo $code;
		// //();
		// $reset = $this->ion_auth->forgotten_password_complete($code);

		// if ($reset) {  //if the reset worked then send them to the login page
		//     $this->session->set_flashdata('message', $this->ion_auth->messages());
		//     //send email
		//     sendResetPassword($user_info);

		//     echo $this->ion_auth->messages();
		//     //();
		//     //redirect("auth/login", 'refresh');
		// } else { //if the reset didnt work then send them back to the forgot password page
		//     $this->session->set_flashdata('message', $this->ion_auth->errors());
		//     echo $this->ion_auth->errors();
		//     //();

		//     //redirect("auth/forgot_password", 'refresh');
		// }
	}

	public function credit_balance()
	{
		$data = array();
		$user_id =  $this->session->userdata('user_id');    
		$data['banks'] = $this->Users_model->get_bank_by_user($user_id);
		$this->load->view('credit-balance-tpl', $data); 


	}

	public function upload_file($file_type, $file_name)
	{
		$file_p = 'uploads/documents/';

		$file_path = $file_p . $file_name;

		if (file_exists($file_path)) {
			unlink($file_path);
		}

		$config['upload_path'] = $file_p;
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 1024 * 125;
		$config['file_name'] = substr(md5(time()), 0, 8);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$this->upload->do_upload($file_type);

		$this->load->library('image_lib');
		$data = $this->upload->data();

		return $data['file_name'];
	}

	//upload
	public function upload_image($upload_p, $do_upload, $photo){

		if(!file_exists($upload_p))
		{
			mkdir($upload_p);
		}

		$photo_path = $upload_p . $photo;

		if($photo!='')
		{
			if (file_exists($photo_path)) {
				unlink($photo_path);
			}
		}

		$config['upload_path'] = $upload_p;
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';
		$config['max_size'] = 1024 * 2;
		$config['file_name'] = substr(md5(time()), 0, 8);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$this->upload->do_upload($do_upload);

		$this->load->library('image_lib');
		$data = $this->upload->data();

		return $data['file_name'];
	}


	// actions

	/**
	 * action for login
	 *
	 * @return void
	 */
	public function actionLogin()
	{
		$data = array();

		//validate form input
		$this->form_validation->set_rules('username', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');


		// add validation alert information if username and password is incorrect

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page

				//Check for KYC
				$user_id = $this->ion_auth->get_user_id();
				$user_details = $this->Users_model->get_user($user_id);
				if($user_details->is_complete==0)
				{
					$this->session->set_userdata(['show_kyc_overlay'=>1]);
				}

				$data['status'] = 'success';
				$data['msg'] = 'Login Successful';
										

				if($this->session->userdata('page_url')){
					$data['redirect_url'] = $this->session->userdata('page_url');

				}else{
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					$data['redirect_url'] = base_url();
				}
				
				redirect($data['redirect_url']);
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login');
			}
		}else{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one                    
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('login');
			
		}
	}

	/**
	 * action for reset password
	 *
	 * @param mixed $code
	 * @return void
	 */
	public function actionResetPassword($code)
	{
		$user = $this->ion_auth->forgotten_password_check($code);
		if($user) {
			$data = [
				'id' => $user->id,
				'password' => $this->ion_auth_model->hash_password($this->input->post('password'))
			];

			$this->Users_model->update_account_information($data);

			redirect('/');
		} else {
			$this->session->set_flashdata('message', 'Incorrect code given.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function actionRegister()
	{
		$data = [
			'status' => 'success',
			'msg' => '',
			'redirect_url' => base_url()
		];

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$input = $this->input->post();

			$first_name = $input['first_name'];
			$last_name = $input['last_name'];
			$email = strtolower($input['email']);
			$username = strtolower($input['email']);
			$password = 'mcproperty';

			
			if (!$this->ion_auth->email_check($email)) {

				$response = xss_clean($this->input->post('g-recaptcha-response'));

				if(config('show_registration_captcha') == 1) {
					$secret 			= config('recaptcha_secret_key');
					$verify 			= file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
					$captcha_success 	= json_decode($verify);

					if($captcha_success->success == false) {
						$data['status'] = 'error';
						$data['msg'] = 'It looks like reCaptcha was not verified';                                
					}
				}

				if($data['status']=='success') {
					$activation_code = generate_code();

					$additional_data = array(
						'first_name' => $first_name,
						'last_name' => $last_name,
						'activation_code' => $activation_code
					);

					$group = array('5');
					$user_id = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
					
					if(isset($input['newsletter'])){
						$this->Users_model->insert_subscriber(["emails" => $email]);
					}

					$user_info = $this->Users_model->get_user($user_id);

					#error_log(print_r($user_info, true), 0);

					//send email
					//sendActivationEmail($user_info);

					$data['msg'] = 'Registration Successful';
					
				}

			}else{
				$data['status'] = 'error';
				$data['msg'] = 'Email already registered';
			}
			
		}else{
			$data['status'] = 'error';
			$data['msg'] =  $this->form_validation->error_string();

		}

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function actionUpdateAllInformation()
	{
		@$this->actionUpdateAccountInformation();
		@$this->actionUpdatePersonalInformation();
		@$this->actionUpdateResidentialInformation();
		@$this->actionUpdateOccupationInformation();
		@$this->actionUpdateDocument();
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function actionUpdateAccountInformation()
	{
		$data = [
			'id' => $this->session->userdata('user_id')
		];

		$input = $this->input->post();

		if(!empty($input['email'])) {
			$data['email'] = $input['email'];
		}
		
		$data['newsletter'] = isset($input['receive_letter']) ? TRUE : FALSE;

		if($input['is_changepass']) {
			unset($data['email']);
			unset($data['newsletter']);
			$data['password'] = $this->ion_auth_model->hash_password($input['password']);
			$data['is_password_updated'] = 1;
		}

		$this->session->set_flashdata('message', ['status' => 1, 'message' => 'Your information is saved successfully.']);

		$this->Users_model->update_account_information($data);
		//redirect($_SERVER['HTTP_REFERER']);

	}

	public function actionUpdatePersonalInformation()
	{

		$data = [
			'id' => $this->session->userdata('user_id')
		];

		$input = $this->input->post();

		$data['first_name'] = $input['first_name'];
		$data['last_name'] = $input['last_name'];
		$data['phone'] = $input['phone'];
		$data['dob'] = $input['dob'];
		$data['country'] = $input['country'];
		$data['us_resident'] = $input['us'];
		$data['nationality'] = $input['nationality'];

		$this->session->set_flashdata('message', ['status' => 1, 'message' => 'Your information is saved successfully.']);

		$this->Users_model->update_account_information($data);
		//redirect($_SERVER['HTTP_REFERER']);
	}

	public function actionUpdateResidentialInformation()
	{

		$data = [
			'id' => $this->session->userdata('user_id')
		];

		$input = $this->input->post();

		$data['residence_country'] = $input['residence'];
		$data['postal_code'] = $input['postal-code'];
		$data['address'] = $input['address-line'];
		$data['unit_no'] = $input['unit-number'];

		$this->session->set_flashdata('message', ['status' => 1, 'message' => 'Your information is saved successfully.']);

		$this->Users_model->update_account_information($data);
		//redirect($_SERVER['HTTP_REFERER']);
	}

	public function actionUpdateOccupationInformation()
	{

		$data = [
			'id' => $this->session->userdata('user_id')
		];

		$input = $this->input->post();

		//die(print_r($input));

		$data['employment_status'] = $input['employee-type'];
		$data['occupation'] = $input['occupation'];
		$data['annual_income'] = $input['annual_income'];
		$data['is_accredited_investor'] = $input['accredited'];
		$data['is_holding_public_office'] = $input['office'];
		$data['account_fund_source'] = $input['fund_source'];

		$this->session->set_flashdata('message', ['status' => 1, 'message' => 'Your information is saved successfully.']);

		$this->Users_model->update_account_information($data);
		//redirect($_SERVER['HTTP_REFERER']);
	}

	public function actionUpdateDocument()
	{
		$data = [];

		$user_id = $this->session->userdata('user_id');

		if($user_id != 0) {
			$user_info = $this->Users_model->get_user($user_id);
			$id_scan_front = $user_info->id_scan;
			$id_scan_back = $user_info->id_scan_back;
			$billing_scan = $user_info->billing_scan;
		} else {
			$id_scan_front = "";
			$id_scan_back = "";
			$billing_scan = "";

		}

		$users = $this->Users_model->get_user($user_id);
		$user_path = 'uploads/documents/'.$user_id;

		
		if (isset($_FILES['id_scan_front'])) {
			if ($_FILES['id_scan_front']['name'] != '') {
				$id_scan_front = $this->upload_image($user_path, 'id_scan_front', $id_scan_front);
				$data['id_scan'] = $id_scan_front;
			}
		}
		
		if (isset($_FILES['id_scan_back'])) {

			if ($_FILES['id_scan_back']['name'] != '') {
				$id_scan_back = $this->upload_image($user_path, 'id_scan_back', $id_scan_back);

				$data['id_scan_back'] = $id_scan_back;
			}                    
		}

		if (isset($_FILES['billing_scan'])) {

			if ($_FILES['billing_scan']['name'] != '') {
				$billing_scan = $this->upload_image($user_path, 'billing_scan', $billing_scan);

				$data['billing_scan'] = $billing_scan;
			}                    
		}

		if(!empty($data))
		{
			$data['id'] = $user_id;
			$data['for_approval'] = 1;
			
			$this->session->set_flashdata('message', ['status' => 1, 'message' => 'Your information is saved successfully.']);
			
			$this->Users_model->update_document($data);

			$notif = [
				'type_id' => $this->config->item('n_for_approval'),
				'receiver_id' => 0,
				'receiver_type' => 'kyc_manager',
				'sender_id' => $this->session->userdata('user_id'),
				'sender_type' => 'user',
				'link' => 'admin/forApproval/form/'.$this->session->userdata('user_id'),
				'summary' => 'New pending user for approval',
				'message' => 'this user needs to process for approval',
			];
	
			$this->Notification_model->insert_notification($notif);

		}

		
		//redirect($_SERVER['HTTP_REFERER']);
	}

	public function actionAccountValidation()
	{
		$data['id'] = $this->session->userdata('user_id');
		// $data['is_complete'] = 2
		$data['kyc_status'] = 0;
		$data['for_approval'] = 1;

		$this->Users_model->update_account_information($data);

		$notif = [
			'type_id' => $this->config->item('n_for_approval'),
			'receiver_id' => 0,
			'receiver_type' => 'kyc_manager',
			'sender_id' => $this->session->userdata('user_id'),
			'sender_type' => 'user',
			'link' => 'admin/forApproval/form/'.$this->session->userdata('user_id'),
			'summary' => 'New pending user for approval',
			'message' => 'this user needs to process for approval',
		];

		$this->Notification_model->insert_notification($notif);

		redirect('my-profile');

	}

	
}