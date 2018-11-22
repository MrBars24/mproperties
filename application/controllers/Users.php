<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('ion_auth');
		$this->load->model('Users_model');
		$this->load->model('Country_model');
		$this->load->model('Notification_model');

	}



	public function index(){
		
	}   

	public function notifications()
	{	
		if(!$this->session->userdata('user_id'))
		{	
			redirect('');
		}

		$data = [];
		$this->Notification_model->update_unread_notif();

		$data['notifications'] = $this->Notification_model->get_notification_by_user();

		$this->load->view('account/notifications-tpl', $data);
	}

	public function form($user_id = false){

		$data = array();

		if ($user_id != 0)
		{

			$user_info = $this->Users_model->get_user($user_id);

			$id_scan_front = $user_info->id_scan;
			$id_scan_back = $user_info->id_scan_back;
			$billing_scan = $user_info->billing_scan;

		}else{

			$id_scan_front = "";
			$id_scan_back = "";
			$billing_scan = "";

		}


		$users = $this->Users_model->get_user($user_id);

		$user_path = 'uploads/documents/'.$user_id;

		if (isset($_FILES['id_scan_front'])) {

			if ($_FILES['id_scan_front']['name'] != '') {
				$id_scan_front = $this->upload_image($user_path, 'id_scan_front', $id_scan_front);

				$data['id_scan'] = $billing_scan;
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
		#print_r($data);
		#print_r($_FILES);

		if(!empty($data))
		{
			$data['id'] = $user_id;
			$data['for_approval'] = 1;
			$this->Users_model->update_document($data);
		}

		redirect('/my-profile');

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
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 1024 * 125;
		$config['file_name'] = substr(md5(time()), 0, 8);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$this->upload->do_upload($do_upload);

		$this->load->library('image_lib');
		$data = $this->upload->data();

		return $data['file_name'];
	}

	public function login(){
		$data = array();
		$this->load->view('account/login-tpl', $data);       
	}

	public function logout(){
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		
		redirect('/', 'refresh');
	}

	public function register(){
		$data = array();
		$this->load->view('account/register-tpl', $data);
	}

	public function forgot_password(){
		$data = array();                
		$this->load->view('account/forgot-password-tpl', $data);       
	}

	public function settings()
	{
		if (!$this->ion_auth->logged_in()){            
			redirect('/');
		}

		$data = array();    
		$user_id =  $this->session->userdata('user_id');

		$user_data = $this->Users_model->get_user($user_id);

		$data['countries'] = $this->Country_model->get_countries();
		$data['employment'] = ['Employment', 'Investment', 'Inheritance', 'Ownership of Business', 'Savings'];
		$data['user_summary'] = $this->computeProfilePercentage($user_data);

		$data['account'] = $user_data;
		$this->load->view('account/setting-tpl', $data);
	}
	
	public function ajax($section){
		switch ($section) {

			case 'login':
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
					}
					else
					{
						$data['status'] = 'error';
						$data['msg'] = 'Incorrect Login';
						$data['redirect_url'] = base_url();

						$this->session->set_flashdata('message', $this->ion_auth->errors());
					}
				}else{
					// the user is not logging in so display the login page
					// set the flash data error message if there is one                    
					$data['status'] = 'error';
					$data['msg'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
					$data['redirect_url'] = base_url();
					
				}

				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			break;

			case 'update_personal_information':

				$id =  $this->session->userdata('user_id');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				// $identification_number = $this->input->post('identification_number');
				// $phone = $this->input->post('phone');
				// $postal_code = $this->input->post('postal_code');
				// $address_line = $this->input->post('address');
				// $unit_number = $this->input->post('unit_number');
				// $nationality = $this->input->post('nationality');
				// $race = $this->input->post('race');
				// $religion = $this->input->post('religion');
				// $dob = $this->input->post('dob');

				$data = array(
					'id' => $id,
					'first_name' => $first_name,
					'last_name' => $last_name,
					// 'identification_number' => $identification_number,
					// 'phone' => $phone,
					// 'postal_code' => $postal_code,
					// 'address' => $address_line,
					// 'unit_number' => $unit_number,
					// 'nationality' => $nationality,
					// 'race' => $race,
					// 'religion' => $religion,
					// 'dob' => $dob
				);


			 $personal=$this->Users_model->update_personal_information($data);
			 if($personal){

				echo "Success User Information Update";

			 }else{

				echo "Error";
			 }

			 break;

            case 'update_first_time_deposit':

                $id = $this->session->userdata('user_id');

                $data = array(
                    'id' => $id,
                    'first_time_deposit' => 1
                );

                $this->Users_model->update_personal_information($data);

                $this->output->set_content_type('application/json')->set_output(json_encode($data));

            break;

		}
	}

	public function test_mail()
	{

        $user_info = $this->Users_model->get_user(8);


        //print_r(sendActivationEmail($user_info));
		//print_r(sendResetPassword($user_info));
		//print_r(sendApprovedKYC($user_info));
		//print_r(sendRejectedKYC($user_info));
		//print_r(sendDepositAccepted($user_info));
		//print_r(sendDepositRequest($user_info));
		print_r(sendSuccessfulTransaction($user_info));
		//print_r(sendFailTransaction($user_info));
		//print_r(sendPropertyListing($user_info));
		//print_r(sendPropertyTransfer($user_info));
		//print_r(sendChat($user_info));
		//print_r(sendJoiner($user_info));
		//print_r(sendLatestValuation($user_info));
		//print_r(sendNewUser($user_info));
		//print_r(sendReminder($user_info));
	}

	public function get_notifications()
	{

		if(!$this->input->is_ajax_request()){
			redirect("");
		}

		$input = $this->input->post();

		$notifications = $this->Notification_model->get_notification_by_user($input['limit'], $input['start']);
	
		$response = [
			"notifications" => $notifications,
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));

	}

	public function subscribe(){
        $data = [
            "emails" => $this->input->post('email')
		];
		
        $this->Users_model->insert_subscriber($data);
        //$this->session->set_flashdata("subscribe", "Thank you for RSVP to our soft launch event. <br/> We are looking forward to a great time!");
		echo "Thank you for signing up!";
    }

}
