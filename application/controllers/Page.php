<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

	protected $valid_actions = [
		'save_inquiry', 'seed', 'set_live'
	];

	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('Users_model');
		$this->load->model('Deposit_model');
		$this->load->model('Transaction_model');
		$this->load->model('ion_auth_model');    
		$this->load->model('Property_model');     
		$this->load->model('Page_model'); 
	}

	public function index(){
		$data = array();	

		$this->load->driver('cache');
		$config = $this->cache->file->get('sconfig');
		
		if(!$config['is_live']) {
			redirect('launching-soon');
		}

		$data['login_error_msg'] = $this->session->flashdata('message');
		$data['districts'] = $this->Property_model->get_districts();
		$data['featured_properties'] = $this->Property_model->get_featured_properties();
		$data['hots'] = $this->Property_model->get_hot_properties(4);
		$this->load->view('home-tpl', $data);
	}

	public function faq()
	{
		$data = array();    

		$this->load->view('faq-tpl', $data);
	}

	public function about()
	{
		$data = array();

		$this->load->view('about-tpl', $data);
	}

	public function checkout()
	{
		$data = array();    

		$this->load->view('checkout-tpl', $data);
	}

	public function investments()
	{
		$data = array();    

		$this->load->view('investments-tpl', $data);
	}
	public function messages()
	{
		$data = array();    

		$this->load->view('messages-tpl', $data);
	}

	public function portfolio()
	{
		$data = [
			'portfolio' => $this->Transaction_model->get_portfolio($this->session->userdata('user_id'))
		];
		//die(var_dump($this->Transaction_model->get_portfolio($this->session->userdata('user_id'))));
		$this->load->view('portfolio-tpl', $data);
	}

	public function terms_of_use()
	{
		$data = array();    

		$this->load->view('terms-of-use-tpl', $data);
	}

	public function watch_list()
	{
		$data = array();    

		$this->load->view('watch-list-tpl', $data);
	}

	public function funds()
	{
		$data = array();    

		$this->load->view('deposits-tpl', $data);
	}

	/*

	public function activate($activation_code)
	{
		$data = array();	

		$user_info = $this->Users_model->get_user_by_activation_code($activation_code);

		if(!empty($user_info) && $user_info->is_password_updated == 0){

			$data['user_info'] = $user_info;

			$this->load->view('activate-tpl', $data);

		}else{
			
			redirect('/');
		}

	}

	
	function activate_account(){
		
		$this->form_validation->set_rules('new_password', 'Password', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{        
			$password   = $this->input->post('new_password');
			$user_id 	= $this->input->post('user_id');

			$user_info = $this->Users_model->get_user($user_id);

			$save_data = array(
				'password' => $password,
				'activation_code' => '',
				'status' => 'verified',
			);

			$this->ion_auth->update($user_id, $save_data);

			$remember = false;

			if ($this->ion_auth->login($user_info->email, $password, $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				if($this->session->userdata('page_url')){
					redirect($this->session->userdata('page_url'));
				}else{
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('/', 'refresh');
				}
			}            
		}
	}
   

	public function settings()
	{
		$data = array();	
		$user_id =  $this->session->userdata('user_id');
		$data['account'] = $this->Users_model->get_user($user_id);
		$this->load->view('setting-tpl', $data);
	}

	 */

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

	public function ajax($section)
	{
		switch ($section) {
			// case 'account_information':

   //              $username = strtolower($this->input->post('email'));
   //              $password = $this->input->post('password');
   //              $email = strtolower($this->input->post('email'));
   //              $subscribe = $this->input->post('subscribe');

   //              $additional_data = array(
   //                  'newsletter' => $subscribe
   //              );

   //              $group = array('5');

   //              $user_id = $this->ion_auth->register($username, $password, $email, $additional_data, $group);

   //              $msg = 'Successfully added account information';
   //              $status = 'success';

   //              $data['msg'] = $msg;
   //              $data['status'] = $status;
   //              $data['user_id'] = $user_id;

			// 	$this->output->set_content_type('application/json')->set_output(json_encode($data));

			// break;
			case 'update_account_information';

			 //code update here
			$account_email = $this->input->post('account_email');
			$account_password_old = $this->input->post('account_password_old');
			$account_password_new = $this->input->post('account_password_new');
			$newsletter = $this->input->post('newsletter');
			$id =  $this->session->userdata('user_id');

				//encryt password here

				$is_password_updated = 1;

					$data = array(  
					'id' => $id,
					'newsletter' => $newsletter

				);

			 $update_account_information=$this->Users_model->update_account_information($data);
			 if($update_account_information){

				echo "Success Account Update";

			 }else{

				echo "Error";
			 }

			 break;

			case 'documents':

				$save_data = array();

				 $id =  $this->session->userdata('user_id');

				if ($_FILES['NRIC-front']['name'] != '') {
					$nirc_front = $this->upload_file('NRIC-front', $_FILES['NRIC-front']['name']);

					$save_data['id_scan'] = $nirc_front;
				}

				/*
				if ($_FILES['NRIC-back']['name'] != '') {
					$nirc_back = $this->upload_file('NRIC-back', $_FILES['NRIC-back']['name']);

					$save_data = array(
						'id_scan' => $nirc_back
					);
				}
				*/


				if ($_FILES['proof_of_address']['name'] != '') {
					$proof_of_address = $this->upload_file('proof_of_address', $_FILES['proof_of_address']['name']);

					$save_data['billing_scan'] = $proof_of_address;
				}

				$this->ion_auth->update($user_id, $save_data);

				$status = 'success';

				$data['status'] = $status;

				$this->output->set_content_type('application/json')->set_output(json_encode($data));

				break;

			case 'update_personal_information':

				$id =  $this->session->userdata('user_id');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$identification_number = $this->input->post('identification_number');
				$contact_number = $this->input->post('phone');
				$postal_code = $this->input->post('postal_code');
				$address_line = $this->input->post('address');
				$unit_number = $this->input->post('unit_number');
				$nationality = $this->input->post('nationality');
				$race = $this->input->post('race');
				$religion = $this->input->post('religion');
				$dob = $this->input->post('dob');

				$data = array(
					'id' => $id,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'identification_number' => $identification_number,
					'phone' => $contact_number,
					'postal_code' => $postal_code,
					'address' => $address_line,
					'unit_number' => $unit_number,
					'nationality' => $nationality,
					'race' => $race,
					'religion' => $religion,
					'dob' => $dob
				);


			$personal=$this->Users_model->update_personal_information($data);
			if($personal){

				echo "Success User Information Update";

			}else{

				echo "Error";
			}

			break;

			case 'deposit':
				$records = $_REQUEST;

				if(isset($records['filter'])){
					$user = $records['filter']['both']['user'];
					$amount = $records['filter']['both']['amount'];
					$ref_number = $records['filter']['both']['ref_number'];
					$date_deposit = $records['filter']['both']['date_deposit'];
					$date_approved = $records['filter']['both']['date_approved'];
					$status = $records['filter']['both']['status'];
				}else{
					$user = "";
					$amount = "";
					$ref_number = "";
					$date_deposit = "";
					$date_approved = "";
					$status = "";
				}

				$order_by = 'deposits.deposit_id DESC';

				if(isset($records['order'])){
					if($records['order'][0]['column'] == 1){
						$order_by = 'deposit_id'. ' ' . $records['order'][0]['dir'];
					}elseif ($records['order'][0]['column'] == 2) {
						$order_by = 'amount' . ' ' . $records['order'][0]['dir'];
					}elseif ($records['order'][0]['column'] == 3) {
						$order_by = 'ref_number' . ' ' . $records['order'][0]['dir'];
					}elseif ($records['order'][0]['column'] == 4) {
						$order_by = 'date_deposit' . ' ' . $records['order'][0]['dir'];
					}
				}             

				$deposits = $this->Deposit_model->get_all_deposits($user, $amount, $ref_number, $date_deposit, $date_approved, $status);

				$iTotalRecords = count($deposits);
				
				$iDisplayLength = intval($_REQUEST['length']);
				$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
				$iDisplayStart = intval($_REQUEST['start']);
				
				$sEcho = intval($_REQUEST['draw']);

				$records["data"] = array(); 

				$end = $iDisplayStart + $iDisplayLength;
				$end = $end > $iTotalRecords ? $iTotalRecords : $end;

				for($i = $iDisplayStart; $i < $end; $i++) {
					$deposit = $deposits;

					$user_info = $this->Users_model->get_user($deposit[$i]->user_id);

					if($deposit[$i]->status == 0){
						$status = 'Pending';
					}elseif($deposit[$i]->status == 1){
						$status = 'Approved';
					}elseif($deposit[$i]->status == 2){
						$status = 'Unsuccessful';
					}

					$records["data"][] = array(
						$user_info->first_name.' '.$user_info->last_name, 
						$deposit[$i]->amount,
						$deposit[$i]->ref_number,
						$deposit[$i]->date_deposit,
						$deposit[$i]->date_approved,
						$status,
						'<a href="'.site_url("admin/transactions/deposit_form/".$deposit[$i]->deposit_id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-pencil"></i> Edit</a>',
					);
				}

				if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
					$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
					$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
				}

				$records["draw"] = $sEcho;
				$records["recordsTotal"] = $iTotalRecords;
				$records["recordsFiltered"] = $iTotalRecords;

				echo json_encode($records); 
				break;

		}
	}

	/**
	 * Form actions
	 * route : form/(.*)
	 *
	 * @return void
	 */
	public function form($action)
	{
		// actions switch case
		switch($action) {
			// add deposit functionality
			case 'add_deposit':
				$ddata = [
					// 'name' => $this->input->post('name'), //'field not yet exist on table',
					// 'email' => $this->input->post('email'), //'field not yet exist on table',
					'amount' => $this->input->post('amount'),
					'date_deposit' => date('Y-m-d H:i:s'),
					'user_id' => $this->session->userdata('user_id'),
					'ref_number' => $this->generateRef()
				];

				$this->Deposit_model->add_deposit($ddata);
				redirect('transactions');
				break;
		}
	}

	// actions

	public function actionSaveInquiry()
	{
		$input = $this->input->post();

		if(config('show_registration_captcha') == 1) {
			$secret 			= config('recaptcha_secret_key');
			$verify 			= file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
			$captcha_success 	= json_decode($verify);

			if($captcha_success->success == false) {
				$this->session->set_flashdata('message', ['status' => 0, 'message' => '<p>Sorry! It looks like reCaptcha was not verified.</p>']);
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

		$data = [
			'name' => $input['name'],
			'email' => $input['email'],
			'purpose' => $input['purpose'],
			'message' => $input['message']
		];

		if($this->Page_model->save_inquiry($data)) {
			$this->session->set_flashdata('message', ['status' => 1, 'message' => '<p>Inquiry has been sent.</p>']);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('message', ['status' => 0, 'message' => '<p>An error occured.</p>']);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function actionSeed()
	{
		$this->load->database();
		$sql = file_get_contents('db/seed.sql');
		$conn = mysqli_connect($this->db->hostname, $this->db->username, $this->db->password, $this->db->database);
		mysqli_multi_query($conn, $sql);

	}

	public function actionSetLive()
	{
		$this->load->driver('cache');
        $this->cache->file->save('sconfig', ['is_live' => 1] , 100000);
	}

	// functions
	
	/**
	 * Generating reference number for deposits
	 *
	 * @param mixed $length -- number of string to be generated
	 * @return void
	 */
	public function generateRef($length = 14)
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}