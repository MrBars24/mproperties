<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends MY_Controller {

	protected $valid_actions = [
		'get_all_orders', 'get_all_trades', 'get_all_deposits', 'approve_deposit', 'get_all_withdrawals', 'approve_withdrawal', 'get_notification'
	];

	public function __construct()
	{
		parent::__construct();
	
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('ion_auth');
		$this->load->model('Property_model');
		$this->load->model('Order_model');
		$this->load->model('Trade_model');
		$this->load->model('Deposit_model');
		$this->load->model('Users_model');
		$this->load->model('Withdrawal_model');
		$this->load->model('Notification_model');


		menu::setSelected('transactions');

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('admin/login', 'refresh');

		}
	}



	public function index(){

		$data = array();

	}   

	public function orders(){

		$data = array();

		$this->load->view('admin/order-listings-tpl',$data);
	}

	public function trades(){

		$data = array();

		$this->load->view('admin/trade-listings-tpl',$data);
	}

	public function deposits(){

		$data = array();
		if(isset($_GET['a']) && $_GET['a'] == 'read') {
			// set as opened
			$this->Transaction_model->open_deposits();
		}

		$this->load->view('admin/deposit-listings-tpl',$data);
	}

	public function withdrawals()
	{
		$data = array();

		if(isset($_GET['a']) && $_GET['a'] == 'read') {
			// set as opened
			$this->Transaction_model->open_withdrawals();
		}

		$this->load->view('admin/withdrawal-listings-tpl',$data);
	}

	public function order_form($order_id = false)
	{

		$data = array();

		if ($order_id != 0) {
			$order_info = $this->Order_model->get_order($order_id);

			$units = $order_info->units;
			$final_amount = $order_info->final_amount;
			$amount_before_tax = $order_info->amount_before_tax;
			$platform_fee_percentage = $order_info->platform_fee_percentage;
			$platform_fee_amount = $order_info->platform_fee_amount;
			$tax_percentage = $order_info->tax_percentage;
			$tax_amount = $order_info->tax_amount;
			$selected_status = $order_info->status;
			$status = array(0 => 'Pending',
				1 => 'Approved');

		} else {
			$units = '';
			$final_amount = '';
			$amount_before_tax = '';
			$platform_fee_percentage = '';
			$platform_fee_amount = '';
			$tax_percentage = '';
			$tax_amount = '';
		}

		$data['order_id'] = $order_id;
		$data['units'] = $units;
		$data['final_amount'] = $final_amount;
		$data['amount_before_tax'] = $amount_before_tax;
		$data['platform_fee_percentage'] = $platform_fee_percentage;
		$data['platform_fee_amount'] = $platform_fee_amount;
		$data['tax_percentage'] = $tax_percentage;
		$data['tax_amount'] = $tax_amount;
		$data['selected_status'] = $selected_status;
		$data['status'] = $status;


		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$save_data['trade_id'] = $order_id;
			$save_data['units'] = $this->input->post('units');
			$save_data['final_amount'] = $this->input->post('final_amount');
			$save_data['amount_before_tax'] = $this->input->post('amount_before_tax');
			$save_data['platform_fee_percentage'] = $this->input->post('platform_fee_percentage');
			$save_data['platform_fee_amount'] = $this->input->post('platform_fee_amount');
			$save_data['tax_percentage'] = $this->input->post('tax_percentage');
			$save_data['tax_amount'] = $this->input->post('tax_amount');
			$save_data['status'] = $this->input->post('status');

			if ($order_id != 0) {
				$this->Order_model->update_order($save_data);
			}

			redirect('admin/transactions/orders');

		}

		$this->load->view('admin/order-form-tpl', $data);
	}

	public function trade_form($trade_id = false)
	{

		$data = array();

		if ($trade_id != 0) {
			$trade_info = $this->Trade_model->get_trade($trade_id);

			$units = $trade_info->units;
			$final_amount = $trade_info->final_amount;
			$amount_before_tax = $trade_info->amount_before_tax;
			$platform_fee_amount = $trade_info->platform_fee_amount;
			$tax_percentage = $trade_info->tax_percentage;
			$tax_amount = $trade_info->tax_amount;
			$selected_status = $trade_info->status;
			$status = array(0 => 'Pending',
				1 => 'Approved');

		} else {
			$units = '';
			$final_amount = '';
			$amount_before_tax = '';
			$platform_fee_amount = '';
			$tax_percentage = '';
			$tax_amount = '';
			$selected_status = '';
		}

		$data['trade_id'] = $trade_id;
		$data['units'] = $units;
		$data['final_amount'] = $final_amount;
		$data['amount_before_tax'] = $amount_before_tax;
		$data['platform_fee_amount'] = $platform_fee_amount;
		$data['tax_percentage'] = $tax_percentage;
		$data['tax_amount'] = $tax_amount;
		$data['selected_status'] = $selected_status;
		$data['status'] = $status;


		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$save_data['trade_id'] = $trade_id;
			$save_data['units'] = $this->input->post('units');
			$save_data['final_amount'] = $this->input->post('final_amount');
			$save_data['amount_before_tax'] = $this->input->post('amount_before_tax');
			$save_data['platform_fee_amount'] = $this->input->post('platform_fee_amount');
			$save_data['tax_percentage'] = $this->input->post('tax_percentage');
			$save_data['tax_amount'] = $this->input->post('tax_amount');
			$save_data['status'] = $this->input->post('status');

			if ($trade_id != 0) {
				$this->Trade_model->update_trade($save_data);
			}

			redirect('admin/transactions/trades');

		}

		$this->load->view('admin/trade-form-tpl', $data);
	}

	public function deposit_form($deposit_id = false)
	{

		$data = array();

		if ($deposit_id != 0) {
			$deposit_info = $this->Deposit_model->get_deposit($deposit_id);

			$user_id = $deposit_info->user_id;
			$amount = $deposit_info->amount;
			$ref_number = $deposit_info->ref_number;
			$date_deposit = $deposit_info->created_at;
			$status = $deposit_info->status;
		}

		$data['id'] = $deposit_id;
		$data['amount'] = $amount;
		$data['ref_number'] = $ref_number;
		$data['date_deposit'] = $date_deposit;
		$data['status'] = $status;


		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$save_data['id'] = $deposit_id;
			$status = $this->input->post('status');


			if($status == 1){
				$save_data['approved_at'] = date('Y-m-d H:i:s');
			}

			$save_data['status'] = $status;

			if ($deposit_id != 0) {
				$this->Deposit_model->update_deposit($save_data);
			}

			if($status == 1){
				$status_text = 'Received';
			}else if($status == 0){
				$status_text = 'Pending';
			}

			$this->session->set_flashdata("message", "Deposit ".$status_text);

			redirect('admin/transactions/deposits');

		}

		$this->load->view('admin/deposit-form-tpl', $data);
	}

	public function withdrawal_form($withdrawal_id = false)
	{
		$data = array();

		if ($withdrawal_id != 0) {
			$deposit_info = $this->Withdrawal_model->get_withdrawal($withdrawal_id);

			$user_id = $deposit_info->user_id;
			$amount = $deposit_info->amount;
			$ref_number = $deposit_info->ref_number;
			$date_deposit = $deposit_info->created_at;
			$status = $deposit_info->status;
		}

		$data['id'] = $withdrawal_id;
		$data['amount'] = $amount;
		$data['ref_number'] = $ref_number;
		$data['date_deposit'] = $date_deposit;
		$data['status'] = $status;


		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$save_data['id'] = $withdrawal_id;
			$status = $this->input->post('status');


			if($status == 1){
				$save_data['approved_at'] = date('Y-m-d H:i:s');
			}

			$save_data['status'] = $status;

			if ($withdrawal_id != 0) {
				$this->Withdrawal_model->update_withdrawal($save_data);
			}

			redirect('admin/transactions/withdrawals');
		}

		$this->load->view('admin/withdrawal-form-tpl', $data);

	}

	public function actionGetAllOrders()
	{
		$records = $_REQUEST;

		if(isset($records['filter'])){
			$property_id = $records['filter']['both']['property_id'];
			$units = $records['filter']['both']['units'];
			$final_amount = $records['filter']['both']['final_amount'];
			$status = $records['filter']['both']['status'];
		}else{
			$property_id = "";
			$units = "";
			$final_amount = "";
			$status = "";
		}

		$order_by = 'property_investment.id DESC';

		if(isset($records['order'])){
			if($records['order'][0]['column'] == 1){
				$order_by = 'property_id'. ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 2) {
				$order_by = 'units' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 3) {
				$order_by = 'final_amount' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 4) {
				$order_by = 'status' . ' ' . $records['order'][0]['dir'];
			}
		}             

		$orders = $this->Order_model->get_all_orders($property_id, $units, $final_amount, $status, $order_by, false);

		$iTotalRecords = count($orders);
		
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		
		$sEcho = intval($_REQUEST['draw']);

		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		for($i = $iDisplayStart; $i < $end; $i++) {
			$order = $orders;
			$user_info = $this->Users_model->get_user($order[$i]->investor_id);
			$property_info = $this->Property_model->get_property($order[$i]->property_id);

			if($order[$i]->status == 0){
				$status = 'Pending';
			}elseif($order[$i]->status == 1){
				$status = 'Approved';
			}elseif($order[$i]->status == 2){
				$status = 'Unfulfilled';
			}

			$records["data"][] = array(
				$user_info->first_name.' '.$user_info->last_name, 
				isset($property_info->property_name) ? $property_info->property_name : "", 
				$order[$i]->units_invested,
				$order[$i]->invested_amount,
				$status,
				'
				<a href="javascript:void(0);" class="btn btn-sm btn-circle btn-default btn-editable" onclick="deleteOrders('.$order[$i]->id.')">Delete</a>',
			);

			//<a href="'.site_url("admin/transactions/order_form/".$order[$i]->property_id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-pencil"></i> Edit</a>
		}

		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;

		echo json_encode($records);
	}

	public function actionGetAllTrades()
	{
		$records = $_REQUEST;

		if(isset($records['filter'])){
			$property_id = $records['filter']['both']['property_id'];
			$units = $records['filter']['both']['units'];
			$final_amount = $records['filter']['both']['final_amount'];
			$status = $records['filter']['both']['status'];
		}else{
			$property_id = "";
			$units = "";
			$final_amount = "";
			$status = "";
		}

		$order_by = 'property_investment.id DESC';

		if(isset($records['order'])){
			if($records['order'][0]['column'] == 1){
				$order_by = 'property_id'. ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 2) {
				$order_by = 'units' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 3) {
				$order_by = 'final_amount' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 4) {
				$order_by = 'status' . ' ' . $records['order'][0]['dir'];
			}
		}             

		$trades = $this->Trade_model->get_all_trades($property_id, $units, $final_amount, $status, $order_by);

		$iTotalRecords = count($trades);
		
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		
		$sEcho = intval($_REQUEST['draw']);

		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		for($i = $iDisplayStart; $i < $end; $i++) {
			$trade = $trades;

			$user_info = $this->Users_model->get_user($trade[$i]->user_id);
			$property_info = $this->Property_model->get_property($trade[$i]->property_id);

			if($trade[$i]->status == 0){
				$status = 'Pending';
			}elseif($trade[$i]->status == 1){
				$status = 'Approved';
			}elseif($trade[$i]->status == 2){
				$status = 'Unfulfilled';
			}

			$records["data"][] = array(
				$user_info->first_name.' '.$user_info->last_name, 
				isset($property_info->property_name) ? $property_info->property_name : "", 
				$trade[$i]->units,
				number_format($trade[$i]->final_amount, 2),
				$status,
				'<a href="'.site_url("admin/transactions/trade_form/".$trade[$i]->property_id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-pencil"></i> Edit</a>
				<a href="javascript:void(0);" class="btn btn-sm btn-circle btn-default btn-editable" onclick="deleteTrade('.$trade[$i]->trade_id.')">Delete</a>',
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
	}

	public function actionGetAllDeposits()
	{
		$records = $_REQUEST;

		if(isset($records['filter'])){
			$user = $records['filter']['both']['user'];
			$fname = $records['filter']['both']['first_name'];
			$lname = $records['filter']['both']['last_name'];
			$amount = $records['filter']['both']['amount'];
			$date_deposit = $records['filter']['both']['date_deposit'];
			$date_approved = $records['filter']['both']['date_approved'];
			$status = $records['filter']['both']['status'];
		}else{
			$user = "";
			$fname = "";
			$lname = "";
			$amount = "";
			$date_deposit = "";
			$date_approved = "";
			$status = "";
		}

		$order_by = 'fund_transactions.id DESC';

		if(isset($records['order'])){
			if($records['order'][0]['column'] == 1){
				$order_by = 'users.first_name'. ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 2) {
				$order_by = 'users.last_name' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 3) {
				$order_by = 'amount' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 4) {
				$order_by = 'created_at' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 5) {
				$order_by = 'approved_at' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 6) {
				$order_by = 'status' . ' ' . $records['order'][0]['dir'];
			}
		}             

		// if escrow manager show only pending items
		$user_info = $this->Users_model->get_user_group($_SESSION['user_id']);
		// if($user_info->group_id == 9){
		// 	$status = '0';
		// }

		$deposits = $this->Deposit_model->get_all_deposits($user, $fname, $lname, $amount, $date_deposit, $date_approved, $status, $order_by);

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

			$pending = '';
			$receive = '';
			if($deposit[$i]->status == 0){
				$status = 'Pending';
				$pending = "selected";
			}elseif($deposit[$i]->status == 1){
				$status = 'Received';
				$receive = "selected";
			}elseif($deposit[$i]->status == 2){
				$status = 'Unsuccessful';
			}

			$info = array(
				$user_info->id,
				$user_info->first_name,
				$user_info->last_name, 
				number_format($deposit[$i]->amount, 2),
				$deposit[$i]->created_at,
				$deposit[$i]->approved_at,
				$status
			);

			$user_info = $this->Users_model->get_user_group($_SESSION['user_id']);
			// if($user_info->group_id == 9){
			// 	if(!$deposit[$i]->status) {
			// 		$info[] = '<a href="'.site_url("admin/transactions/action/approve_deposit/".$deposit[$i]->id).'" class="btn btn-sm btn-circle btn-default btn-editable btn-receive"><i class="fa fa-pencil"></i> Receive</a>';
			// 	} else {
			// 		$info[] = '';
			// 	}
			// } else {
			// 	$info[] = '<a href="'.site_url("admin/transactions/deposit_form/".$deposit[$i]->id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
			// }	
			$status_value = $deposit[$i]->status;
			$csrf_hash = $this->security->get_csrf_hash();
			$csrf_name = $this->security->get_csrf_token_name();

			$info[] = "<form method='POST' id='deposit_form_".$deposit[$i]->id."' action='".site_url("admin/transactions/deposit_form/".$deposit[$i]->id)."'>
							<input type='hidden' value='$csrf_hash' name='$csrf_name'>
							<select class='form-control' name='status' id='select_status' data-id='".$deposit[$i]->id."'>
								<option $receive value='1'>Receive</option>
								<option $pending value='0'>Pending</option>
							</select>
						</form>";


			$records["data"][] = $info;
		}

		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;

		echo json_encode($records);
	}

	public function actionGetAllWithdrawals()
	{
		$records = $_REQUEST;

		if(isset($records['filter'])){
			$user = $records['filter']['both']['user'];
			$fname = $records['filter']['both']['first_name'];
			$lname = $records['filter']['both']['last_name'];
			$amount = $records['filter']['both']['amount'];
			$date_deposit = $records['filter']['both']['date_deposit'];
			$date_approved = $records['filter']['both']['date_approved'];
			$status = $records['filter']['both']['status'];
		}else{
			$user = "";
			$fname = "";
			$lname = "";
			$amount = "";
			$date_deposit = "";
			$date_approved = "";
			$status = "";
		}

		$order_by = 'fund_transactions.id DESC';

		if(isset($records['order'])){
			if($records['order'][0]['column'] == 1){
				$order_by = 'users.first_name'. ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 2) {
				$order_by = 'users.last_name' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 3) {
				$order_by = 'amount' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 4) {
				$order_by = 'created_at' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 5) {
				$order_by = 'approved_at' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 6) {
				$order_by = 'status' . ' ' . $records['order'][0]['dir'];
			}
		}             

		// if escrow manager show only pending items
		$user_info = $this->Users_model->get_user_group($_SESSION['user_id']);
		// if($user_info->group_id == 9){
		// 	$status = '0';
		// }

		$withdrawals = $this->Withdrawal_model->get_all_withdrawals($user, $fname, $lname, $amount, $date_deposit, $date_approved, $status, $order_by);

		$iTotalRecords = count($withdrawals);
		
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		
		$sEcho = intval($_REQUEST['draw']);

		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		for($i = $iDisplayStart; $i < $end; $i++) {
			$withdrawal = $withdrawals;

			$user_info = $this->Users_model->get_user($withdrawal[$i]->user_id);

			if($withdrawal[$i]->status == 0){
				$status = 'Pending';
			}elseif($withdrawal[$i]->status == 1){
				$status = 'Approved';
			}elseif($withdrawal[$i]->status == 2){
				$status = 'Unsuccessful';
			}

			$info = array(
				$user_info->id,
				$user_info->first_name,
				$user_info->last_name, 
				$withdrawal[$i]->amount,
				$withdrawal[$i]->created_at,
				$withdrawal[$i]->approved_at,
				$status
			);

			$user_info = $this->Users_model->get_user_group($_SESSION['user_id']);
			if($user_info->group_id == 9){
				if(!$withdrawal[$i]->status) {
					$info[] = '<a href="'.site_url("admin/transactions/action/approve_withdrawal/".$withdrawal[$i]->id).'" class="btn btn-sm btn-circle btn-default btn-editable btn-receive"><i class="fa fa-pencil"></i> Approve</a>';
				} else {
					$info[] = '';
				}
			} else {
				$info[] = '<a href="'.site_url("admin/transactions/withdrawal_form/".$withdrawal[$i]->id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-pencil"></i> Edit</a>';
			}

			$records["data"][] = $info;
		}

		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;

		echo json_encode($records);

	}




	public function ajax($section){
		switch ($section) {
			case 'trade_delete':
				$trade_id = $this->input->post('id');
				$this->Trade_model->delete_trade($trade_id);

				echo json_encode($trade_id);
				break;

			case 'order_delete':
				$trade_id = $this->input->post('id');
				$this->Order_model->delete_orders($trade_id);
	
				echo json_encode($trade_id);
				break;

            case 'get_notifications':
				// $data = array();
				
                // $user_info = $this->Users_model->get_user_group($_SESSION['user_id']);
                // $transaction_funds = $this->Transaction_model->get_transactions_by_status(0);

                // $data['group_id'] = $user_info->group_id;
                // $data['total_transaction_fund'] = count($transaction_funds);
				// $data['transaction_funds'] = $transaction_funds;

				// $this->output->set_content_type('application/json')->set_output(json_encode($data));
				
				// $type_id = $this->config->item('n_deposit_coming');
				// $user_info = $this->Users_model->get_user_group($_SESSION['user_id']);
				// $notifications = $this->Notification_model->get_notifications($type_id);

				// $response['notif'] = $notifications;
				// $response['notif_count'] = count($notifications);

				// $this->output->set_content_type('application/json')->set_output(json_encode($response));
				// break;
				break;
        }
	}

	public function actionApproveDeposit($deposit_id)
	{

		if ($deposit_id != 0) {
			$deposit_info = $this->Deposit_model->get_deposit($deposit_id);
		}

		$save_data['id'] = $deposit_id;
		$save_data['approved_at'] = date('Y-m-d H:i:s');
		$save_data['status'] = TRUE;

		if ($deposit_id != 0) {
			$this->Deposit_model->update_deposit($save_data);

            $user_id = $deposit_info->user_id;

            $user_info = $this->Users_model->get_user($user_id);

            //send email
            sendDepositAccepted($user_info);
		}

		redirect('admin/transactions/deposits');
	}

	public function actionGetNotification()
	{	
			$type_id =  $this->ion_auth->get_users_groups()->row()->id;
			$user_info = $this->Users_model->get_user_group($_SESSION['user_id']);
			$notifications = $this->Notification_model->get_notifications($type_id);

			$response['notif'] = $notifications;
			$response['notif_count'] = count($notifications);

			$this->output->set_content_type('application/json')->set_output(json_encode($response));

	}

	public function actionApproveWithdrawal($withdrawal_id)
	{

		if ($withdrawal_id != 0) {
			$deposit_info = $this->Withdrawal_model->get_withdrawal($withdrawal_id);
		}

		$save_data['id'] = $withdrawal_id;
		$save_data['approved_at'] = date('Y-m-d H:i:s');
		$save_data['status'] = TRUE;

		if ($withdrawal_id != 0) {
			$this->Deposit_model->update_deposit($save_data);

            $user_id = $deposit_info->user_id;

            $user_info = $this->Users_model->get_user($user_id);

            //send email
            //sendDepositAccepted($user_info);
		}

		redirect('admin/transactions/withdrawals');
	}
}