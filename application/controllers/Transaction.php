<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends MY_Controller {

	protected $valid_actions = [
		'check_investment', 'add_investment', 'cancel_order', 'edit_order'
	];

	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('encryption');
		$this->load->model('Users_model');
		$this->load->model('Transaction_model');
		$this->load->model('Trust_model');
		$this->load->model('Deposit_model');
		$this->load->model('Property_model');
		$this->load->model('Notification_model');
	}

	public function index()
	{
		$data = [
			'transactions' => $this->Transaction_model->get_transactions()
		];

		$this->load->view('transactions-tpl', $data);
	}

	public function investments()
	{
		$user_id =  $this->session->userdata('user_id');

		$data = [
            'user_info' => $this->Users_model->get_user($user_id),
			'balance' => $this->Transaction_model->get_balance(),
			'pending_investment' => $this->Transaction_model->get_investment(0),
			'processing_investment' => $this->Transaction_model->get_investment(2),
			'completed_investment' => $this->Transaction_model->get_investment(1),
			'banks' => $this->Users_model->get_bank_by_user($user_id),
		];

		$this->load->view('investments-tpl', $data);
	}
	
	public function completed_investments()
	{
		$user_id =  $this->session->userdata('user_id');

		$data = [
            'user_info' => $this->Users_model->get_user($user_id),
			'completed_investment' => $this->Transaction_model->get_investment(1, TRUE)
	];

		$this->load->view('completed-transaction', $data);
	}

	public function checkout()
	{
		$data = [
			'property' => $this->Property_model->get_property($_GET['pid'])
		];

		$this->load->view('checkout-tpl', $data);
	}

	public function order_summary()
	{
		$hash = $this->encryption->decrypt(rawurldecode($this->input->get('q')));
		$data = unserialize($hash);
		
		if(!$data) {
			redirect('/');
		}

		$balance = $this->Transaction_model->get_balance();
		$property = $this->Property_model->get_property($data['property_id']);
		$trust = $this->Trust_model->get_trust_account($data['property_id']);
		$investment_amount = $data['units'] * $property->price_per_unit;
		$investment_amount = round($investment_amount, 2);

		$prop_value = round($investment_amount * ($trust->property_value_pct), 2);
		$comp = [
			'investor_id' => $this->session->userdata('user_id'),
			'invested_amount' => number_format($investment_amount, 2),
			'units_invested' => $data['units'],
			'percent_invested' => number_format(($data['units'] / $property->units_issued) * 100, 2),
			'bsd' => number_format($investment_amount * ($trust->bsd_pct), 2),
			'bsd_p' => round((float)$trust->bsd_pct * 100, 2) . '%',
			'absd' => number_format($investment_amount * ($trust->absd_pct), 2),
			'absd_p' => round((float)$trust->absd_pct * 100, 2) . '%',
			'property_value' => number_format($prop_value, 2),
			'property_value_p' => round((float)$trust->property_value_pct * 100, 2) . '%',
			'cash' => number_format($investment_amount * ($trust->cash_pct), 2),
			'cash_p' => round((float)$trust->cash_pct * 100, 2) . '%',
			'setup' => number_format($investment_amount * ($trust->setup_cost_pct), 2),
			'setup_p' => round((float)$trust->setup_cost_pct * 100, 2) . '%',
			'balance' => number_format($balance['credit_balance'], 2),
			'balance_remain' => number_format($balance['credit_balance'] - $investment_amount, 2)
		];

		//number_format($balance['credit_balance'] - $investment_amount, 2)

		$data = $data + $comp;

		$this->load->view('order-summary-tpl', $data);
	}

	// actions
	public function actionCheckInvestment($property)
	{
		$input = $this->input->post();
		$property = $this->Property_model->get_property($property);
		
		$kyc_status = $this->Users_model->isValidatedAccount();
		if($kyc_status != 1) {
			// account not validated
			$this->session->set_flashdata('message', ['status' => 0, 'message' => '<p>Sorry your account is not valid or not yet validated. Please proceed to My Profile to validate your account.</p>']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		$balance = $this->Transaction_model->get_balance();
		if($balance['credit_balance'] < $input['units'] * $property->price_per_unit) {
			// not enough balance
			$this->session->set_flashdata('message', ['status' => 0, 'message' => '<p>Insufficient funds , please make a deposit to add funds into your account. <a href="'.site_url('credit-balance').'">Go To Credit Balance</a></p>']);
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data = [
			'property_id' => $property->property_id,
			'units' => $input['units'],
			'unit' => (isset($input['unit'])) ? $input['unit'] : "",
			'property' => (isset($input['property'])) ? $input['property'] : "",
		];

		$data = serialize($data);
		$ciphertext = $this->encryption->encrypt($data);
		redirect('order-summary?q=' . rawurlencode($ciphertext));

	}

	public function actionAddInvestment()
	{
		$hash = $this->encryption->decrypt(rawurldecode($this->input->get('q')));
		$data = unserialize($hash);
		
		if(!$data) {
			redirect('/');
		}

		
		if((isset($data['unit']) && $data['unit'] != "") || (isset($data['property']) && $data['property'] != "")){
			$this->actionEditOrder($data);
			exit;
		}
		
		unset($data['unit']);
		unset($data['property']);


		$property = $this->Property_model->get_property($data['property_id']);
		$trust = $this->Trust_model->get_trust_account($data['property_id']);
		$investment_amount = $data['units'] * $property->price_per_unit;
		$investment_amount = round($investment_amount, 2);
		//print_r($data['units'] * $property->price_per_unit);
		$prop_value = $investment_amount * ($trust->property_value_pct);

		$comp = [
			'investor_id' => $this->session->userdata('user_id'),
			'invested_amount' => $investment_amount,
			'units_invested' => $data['units'],
			'percent_invested' => ($data['units'] / $property->units_issued) * 100,
			'bsd' => $investment_amount * ($trust->bsd_pct),
			'absd' => $investment_amount * ($trust->absd_pct),
			'property_value' => $prop_value,
			'cash' => $investment_amount * ($trust->cash_pct),
			'setup_cost' => $investment_amount * ($trust->setup_cost_pct),
		];

		$data = $data + $comp;
		unset($data['units']);

		$this->Transaction_model->add_investment($data);
		
		$percent = $this->Transaction_model->checkPropertyStatus($data['property_id']);
		
		if($percent >= 99.99){
			$get_investments = $this->Users_model->get_invesments($_SESSION['user_id'], $data['property_id']);
			foreach($get_investments as $in){
				$this->Transaction_model->cancel_order($in->property_id, true);
			}
		}

		//sendSuccessfulTransaction($this->session->userdata('user_id'), $data['property_id']);
		redirect('checkout?pid=' . $data['property_id']);
		//redirect('credit-balance');
	}

	public function actionCancelOrder($id)
	{
		if($this->session->userdata('user_id')) {

			

			$res = $this->Transaction_model->cancel_order($id);

			if($res) {
				$json = json_encode(['success' => TRUE]);
			} else {
				$json = json_encode(['success' => FALSE]);
			}

		} else {
			$json = json_encode(['success' => FALSE]);
		}

		$this->output->set_content_type('application/json')
				->set_output($json);
	}

	public function actionEditOrder($input = false)
	{
		// $hash = $this->encryption->decrypt(rawurldecode($this->input->get('q')));
		// $data = unserialize($hash);

		// if(!$data) {
		// 	redirect('/');
		// }

		if($input === false){
			$data = $this->input->post();
		}else{
			$data['property'] = $input['property_id'];
			$data['unit'] = $input['unit'];
		}	

		$property = $this->Property_model->get_property($data['property']);
		$trust = $this->Trust_model->get_trust_account($data['property']);
		$investment_amount = $data['unit'] * $trust->price_per_unit;
		
		$prop_value = $investment_amount * ($trust->property_value_pct);

		$comp = [
			'invested_amount' => $investment_amount,
			'units_invested' => $data['unit'],
			'percent_invested' => ($data['unit'] / $property->units_issued) * 100,
			'bsd' => $investment_amount * ($trust->bsd_pct),
			'absd' => $investment_amount * ($trust->absd_pct),
			'property_value' => $prop_value,
			'cash' => $investment_amount * ($trust->cash_pct),
			'setup_cost' => $investment_amount * ($trust->setup_cost_pct),
		];

		$data = $data + $comp;
		unset($data['units']);
		unset($data['unit']);

		$this->Transaction_model->update_investment($data);
		
		// sendSuccessfulTransaction($this->session->userdata('user_id'), $data['property_id']);
		redirect('orders');
	}

	// helper
	private function checkLastNumber($val)
	{
		
	}
	
}