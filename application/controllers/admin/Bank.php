<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('ion_auth');
        $this->load->model('Users_model');
        $this->load->model('Deposit_model');

        menu::setSelected('users');
        menu::setSelected('admins');
    }



	public function index(){

		$data = array();
	} 

    public function details($user_id){

        $data = array();
        $data['user_id'] = $user_id;
        $user_info = $this->Users_model->get_user($user_id);
        $data['user_info_details'] = $user_info;

        $this->load->view('admin/users-bank-details-tpl',$data);
    } 

    public function deposit_history($user_id){

        $data = array();

        $data['user_id'] = $user_id;

        $user_info = $this->Users_model->get_user($user_id);
        $data["first_name"] = $user_info->first_name;
        $data["last_name"] = $user_info->last_name;
        $data['user_info'] = $user_info;

        $this->load->view('admin/users-bank-deposit-tpl',$data);

    }

    function form($bank_account_id = false, $user_id)
    {
        $data = array();

        $user_id = $user_id;

        if ($bank_account_id != 0)
        {

            $bank_info = $this->Users_model->get_user_bank($bank_account_id);

            $bank_name = $bank_info->bank_name;
            $swift_code = $bank_info->swift_code;
            $account_no = $bank_info->account_no;
            $account_name = $bank_info->account_name;

        }else{

            $bank_name = "";
            $swift_code = "";
            $account_no = "";
            $account_name = "";
        }

        $data['bank_account_id'] = $bank_account_id;
        $data['user_id'] = $user_id;
        $data['bank_name'] = $bank_name;
        $data['swift_code'] = $swift_code;
        $data['account_no'] = $account_no;
        $data['account_name'] = $account_name;

        $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
        $this->form_validation->set_rules('swift_code', 'Swift Code', 'trim|required');
        $this->form_validation->set_rules('account_no', 'Account Number', 'trim|required');
        $this->form_validation->set_rules('account_name', 'Account Name', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/users-bank-form-tpl',$data);

        }else{

            $user_id = $this->input->post('user_id');
            $bank_name = $this->input->post('bank_name');
            $swift_code = $this->input->post('swift_code');
            $account_no = $this->input->post('account_no');
            $account_name = $this->input->post('account_name');

            if ($bank_account_id != 0) {

                $save_data = array(
                    'bank_account_id' => $bank_account_id,                    
                    'user_id' => $user_id,
                    'bank_name' => $bank_name,
                    'swift_code' => $swift_code,
                    'account_no' => $account_no,
                    'account_name' => $account_name
                );
                
                $bank_account_id = $this->Users_model->update_user_bank($save_data);

            }else{

                $save_data = array(
                    'user_id' => $user_id,
                    'bank_name' => $bank_name,
                    'swift_code' => $swift_code,
                    'account_no' => $account_no,
                    'account_name' => $account_name
                );

                $bank_account_id = $this->Users_model->insert_user_bank($save_data);
            }

            redirect('admin/users/bank/details/'.$user_id);
        }

    }

    public function ajax($section){
        switch ($section) {
            case 'get_user_banks':

                $user_id  = $this->input->post('user_id');

                $records = $_REQUEST;

                if(isset($records['filter'])){
                    $bank_name = $records['filter']['both']['bank_name'];
                    $account_name = $records['filter']['both']['account_name'];
                    $account_no = $records['filter']['both']['account_no'];
                }else{
                    $bank_name = '';
                    $account_name = '';
                    $account_no = '';
                }

                $order_by = 'users_bank_details.bank_account_id DESC';

                if(isset($records['order'])){
                    if($records['order'][0]['column'] == 1){
                        $order_by = 'bank_name'. ' ' . $records['order'][0]['dir'];
                    }elseif ($records['order'][0]['column'] == 2) {
                        $order_by = 'account_name' . ' ' . $records['order'][0]['dir'];
                    }elseif ($records['order'][0]['column'] == 3) {
                        $order_by = 'account_no' . ' ' . $records['order'][0]['dir'];
                    }
                }             

                $banks = $this->Users_model->get_user_banks($user_id, $bank_name, $account_name, $account_no, $order_by);

                $iTotalRecords = count($banks);
                
                $iDisplayLength = intval($_REQUEST['length']);
                $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
                $iDisplayStart = intval($_REQUEST['start']);
                
                $sEcho = intval($_REQUEST['draw']);

                $records["data"] = array(); 

                $end = $iDisplayStart + $iDisplayLength;
                $end = $end > $iTotalRecords ? $iTotalRecords : $end;

                for($i = $iDisplayStart; $i < $end; $i++) {
                    $bank = $banks;

                    $records["data"][] = array(
                        $bank[$i]->bank_name, 
                        $bank[$i]->account_name,
                        $bank[$i]->account_no,
                        '<a href="'.site_url("admin/users/bank/form/".$bank[$i]->bank_account_id."/".$bank[$i]->user_id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-circle btn-default btn-editable" onclick="deleteBank('.$bank[$i]->bank_account_id.')">Delete</a>',
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

            case 'get_user_deposit':

                $user_id  = $this->input->post('user_id');

                $records = $_REQUEST;

                if(isset($records['filter'])){
                    $amount = $records['filter']['both']['amount'];
                    $ref_number = $records['filter']['both']['ref_number'];
                    $date_deposit = $records['filter']['both']['date_deposit'];
                    $date_approved = $records['filter']['both']['date_approved'];
                    $status = $records['filter']['both']['status'];
                }else{
                    $amount = '';
                    $ref_number = '';
                    $date_deposit = '';
                    $date_approved = '';
                    $status = '';
                }

                $order_by = 'fund_transactions.id DESC';

                if(isset($records['order'])){
                    if($records['order'][0]['column'] == 1){
                        $order_by = 'amount'. ' ' . $records['order'][0]['dir'];
                    }elseif ($records['order'][0]['column'] == 2) {
                        $order_by = 'date_deposit' . ' ' . $records['order'][0]['dir'];
                    }elseif ($records['order'][0]['column'] == 3) {
                        $order_by = 'date_approved' . ' ' . $records['order'][0]['dir'];
                    }
                }             

                $deposits = $this->Deposit_model->get_user_deposit($user_id, $amount, $date_deposit, $date_approved, $status, $order_by);

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

                    if($deposit[$i]->status == 0){
                        $status = 'Pending';
                    }elseif ($deposit[$i]->status == 1) {
                        $status = 'Approved';
                    }elseif ($deposit[$i]->status == 2) {
                        $status = 'Unsuccesfull';
                    }

                    $records["data"][] = array(
                        $deposit[$i]->amount, 
                        $deposit[$i]->ref_number,
                        $deposit[$i]->created_at,
                        $deposit[$i]->approved_at,
                        $status,
                        '',
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

            case 'delete':
                $user_id = $this->input->post('id');

                $this->Admin_model->delete_admin($user_id);

                echo json_encode($user_id);
                break;
        }
    }
}