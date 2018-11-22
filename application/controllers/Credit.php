<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Credit extends MY_Controller {
	
	protected $valid_actions = [
		'add_deposit',
		'withdraw_funds'
	];

	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('Users_model');
		$this->load->model('Transaction_model');
		$this->load->model('Deposit_model');
		$this->load->model('Withdrawal_model');
		$this->load->model('Property_model');
		$this->load->model('Notification_model');

	}

	public function index()
	{

		$user_id =  $this->session->userdata('user_id');

		$data = [
            'user_info' => $this->Users_model->get_user($user_id),
			'banks' => $this->Users_model->get_bank_by_user($user_id),
			'balance' => $this->Transaction_model->get_balance(),
			'get_close_investment' => $this->Transaction_model->get_close_investment("array")
	
		];


		$this->load->view('credit-balance-tpl', $data);
	}

	// actions
	public function actionAddDeposit()
	{

		//$fmt = numfmt_create('en_EN', NumberFormatter::DECIMAL);
		// numfmt_parse($fmt, $this->input->post('amount'))
		$ddata = [
			'absolute_amount' => $this->clean_commas($this->input->post('amount')),
			'amount' => $this->clean_commas($this->input->post('amount')),
			'user_id' => $this->session->userdata('user_id'),
			'ref_number' => $this->generateRef(),
			'transaction_type' => $this->config->item('funds_deposit')
		];

        $user_id = $_SESSION['user_id'];
        $user_info = $this->Users_model->get_user($user_id);

        //send email
        //sendDepositRequest($user_info);

		$this->Deposit_model->add_deposit($ddata);


		$notif = [
			'type_id' => $this->config->item('n_deposit_coming'),
			'receiver_id' => 0,
			'receiver_type' => 'escrow_manager',
			'sender_id' => $this->session->userdata('user_id'),
			'sender_type' => 'user',
			'link' => 'admin/transactions/deposits',
			'summary' => 'New deposit coming',
			'message' => '-'.$this->input->post('amount'),
		];

		$this->Notification_model->insert_notification($notif);

		redirect('transactions');
	}

	public function actionWithdrawFunds()
	{

		$data = [
			'absolute_amount' => $this->input->post('amount'),
			'amount' => '-'.$this->input->post('amount'),
			'user_id' => $this->session->userdata('user_id'),
			'ref_number' => $this->generateRef(),
			'transaction_type' => $this->config->item('funds_withdrawal')
		];

		$this->Withdrawal_model->add_withdrawal($data);

		$notif = [
			'type_id' => $this->config->item('n_deposit_coming'),
			'receiver_id' => 0,
			'receiver_type' => 'escrow_manager',
			'sender_id' => $this->session->userdata('user_id'),
			'sender_type' => 'user',
			'link' => 'admin/transactions/withdrawals',
			'summary' => 'New withdrawals request',
			'message' => number_format($this->input->post('amount')),
		];

		$this->Notification_model->insert_notification($notif);

		redirect('transactions');

	}

	// helpers

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

	private function clean_commas($str)
	{
		return str_replace(',', '', $str);
	}
}