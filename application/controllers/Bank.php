<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends MY_Controller {
	
	protected $valid_actions = [
		'bank_correspondent', 'insert_user_bank', 'update_user_bank', 'delete_user_bank'
	];

	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('Users_model');
		$this->load->model('Transaction_model');
		$this->load->model('Deposit_model');
	}

	public function index()
	{
		
	}

	// actions
	public function actionBankCorrespondent()
	{
		$data = [
			'counter' => $this->input->post('counter')
		];

		$this->load->view('ajax/add-bank-correspondent-ajax', $data);
	}

	public function actionInsertUserBank()
	{
		$input = $this->input->post();
		$data = array(
			'user_id' => $this->session->userdata('user_id'),
			'bank_name' => $input['bank_name'],
			'swift_code' => $input['swift_code'],
			'account_no' => $input['account_no'],
			'account_name' => $input['account_name'],
			'dtstamp' => date("Y-m-d h:i:s"),
			'status' => 0
		);

		$bank = $this->Users_model->insert_user_bank($data);
		if($bank) {
			echo $bank;
		} else {
			echo "Error";
		}
	}

	public function actionUpdateUserBank()
	{
		$input = $this->input->post();
		$data = array(
			'bank_account_id' => $input['bank_account_id'],
			'bank_name' => $input['bank_name'],
			'swift_code' => $input['swift_code'],
			'account_no' => $input['account_no'],
			'account_name' => $input['account_name'],
			'user_id' => $this->session->userdata('user_id'),
			'dtstamp' => date("Y-m-d h:i:s"),
			'status' => 0
		);

		$bank_update = $this->Users_model->update_user_bank($data);
		if($bank_update) {
			echo "Success Update";
		} else {
			echo "Error";
		}
	}

	public function actionDeleteUserBank()
	{
		$input = $this->input->post();
		$data = array(
			'bank_account_id' => $input['bank_account_id'],
			'user_id' => $this->session->userdata('user_id')
		);

		$bank_delete = $this->Users_model->delete_user_bank($data);
		if($bank_delete) {
			echo "Delete Success";
		} else {
			echo "Error";
		}
	}

	// helpers
}