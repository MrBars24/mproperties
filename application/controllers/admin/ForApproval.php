<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForApproval extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('ion_auth');
        $this->load->model('Users_model');
        $this->load->model('Notification_model');


        menu::setSelected('users');
        menu::setSelected('admins');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('admin/login', 'refresh');

        }
    }


    public function index()
    {

		$data = array();

		$this->load->view('admin/for-approval-tpl',$data);
	}   

    function form($user_id = false)
    {
        $data = array();

        $admin_info = $this->Users_model->get_user($user_id);
        $first_name = $admin_info->first_name;
        $last_name = $admin_info->last_name;
        $email = $admin_info->email;
        $billing_scan = $admin_info->billing_scan;
        $id_scan = $admin_info->id_scan;
        $id_back_scan= $admin_info->id_scan_back;
        $selected_for_approval_status = $admin_info->for_approval;
        $for_approval_status = array(1 => 'Approve',
            2 => 'Reject');
        $reason_for_rejection = $admin_info->reason_for_rejection;
        $address = $admin_info->address;
        $phone = $admin_info->phone;
        $postal_code = $admin_info->postal_code;
        $nationality = $admin_info->nationality;
        $unit_number = $admin_info->unit_no;
        $dob = $admin_info->dob;
        $country_of_birth = $admin_info->country;
        $us_resident = $admin_info->us_resident;
        $residence_country = $admin_info->residence_country;
        $employment_status = $admin_info->employment_status;
        $occupation = $admin_info->occupation;
        $is_accredited_investor = $admin_info->is_accredited_investor;
        $is_holding_public_office = $admin_info->is_holding_public_office;
        $annual_income = $admin_info->annual_income;
        $account_fund_source = $admin_info->account_fund_source;

        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $data['email'] = $email;
        $data['user_id'] = $user_id;
        $data['billing_scan'] = $billing_scan;
        $data['id_scan'] = $id_scan;
        $data['id_back_scan'] = $id_back_scan;
        $data['selected_for_approval_status'] = $selected_for_approval_status;
        $data['for_approval_status'] = $for_approval_status;
        $data['reason_for_rejection'] = $reason_for_rejection;
        $data['address'] = $address;
        $data['phone'] = $phone;
        $data['postal_code'] = $postal_code;
        $data['nationality'] = $nationality;
        $data['unit_number'] = $unit_number;
        $data["dob"] = $dob;
        $data["country_of_birth"] = $country_of_birth;
        $data["us_resident"] = $us_resident;
        $data["residence_country"] = $residence_country;
        $data["employment_status"] = $employment_status;
        $data["occupation"] = $occupation;
        $data["is_accredited_investor"] = $is_accredited_investor;
        $data["is_holding_public_office"] = $is_holding_public_office;
        $data["annual_income"] = $annual_income;
        $data["account_fund_source"] = $account_fund_source;
        $data['reject_fields'] = [
            'First Name',
            'Last Name',
            'Phone',
            'Date of Birth',
            'Country of Birth',
            'U.S Residence',
            'Nationality',
            'Country of Residence',
            'Postal Code',
            'Unit Number',
            'Address',
            'Employment Status',
            'Occupation',
            'Annual Income Level',
            'Accredited Investor',
            'Holding Public Office',
            'Source of Account funds',
            'E-mail',
            'Identification',
            'Identification Back',
            'Proof of Address'
        ];

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = strtolower($this->input->post('email'));
            $for_approval_status = $this->input->post('for_approval_status');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            $data['postal_code'] = $this->input->post('postal_code');
            $data['nationality'] = $this->input->post('nationality');
            $data['race'] = $this->input->post('race');
            $data['religion'] = $this->input->post('religion');
            $data['unit_number'] = $this->input->post('unit_number');

            $reason_for_rejection = NULL;
            if($for_approval_status == 2){ //reject
                $is_complete = 0;
                $for_approval_status = 0;
                $kyc_status = 2;
                $status_text = 'rejected';
                $reason_for_rejection = $this->input->post('reason_for_rejection');

                $rejected_fields = implode(',', $this->input->post('rejected_fields'));

                //send email
                sendRejectedKYC($admin_info, $rejected_fields, $reason_for_rejection);
            }else{
                $is_complete = 1; //approve
                $reason_for_rejection = '';
                $kyc_status = 1;
                $for_approval_status = 0;
                $status_text = 'approved';
                //send email
                sendApprovedKYC($admin_info);
            }


            $save_data = array(
                'id' => $user_id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'is_complete' => $is_complete,
                'for_approval' => $for_approval_status,
                'kyc_status' => $kyc_status,
                'reason_for_rejection' => $reason_for_rejection,
                'address' => $address,
                'phone' => $phone,
                'postal_code' => $postal_code,
                'nationality' => $nationality,
                'race' => $race,
                'religion' => $religion,
                'unit_number' => $unit_number,
                'approve_by' => $this->ion_auth->user()->row()->id,
                'approve_at' => date("Y-m-d H:i:s"),
                'rejected_fields' => $rejected_fields,
            );

            $this->session->set_flashdata('message', 'You have '.$status_text.' '.$first_name.' '.$last_name);
            $this->Users_model->update_account_information($save_data);

            redirect('admin/forApproval');
        }

        $this->load->view('admin/for-approval-form-tpl', $data);

    }

    public function ajax($section){
        
        if(!$this->input->is_ajax_request()){
            redirect('admin');
        }
        
        switch ($section) {
            case 'get_all_users':
                $this->get_all_users();
                break;

            case 'user_delete':
                $this->user_delete();
                break;
            case 'get_notifications':
                $this->get_notifications();
                break;
        }
    }

    protected function get_notifications()
    {
        $type_id = $this->config->item('n_for_approval');
        $user_info = $this->Users_model->get_user_group($_SESSION['user_id']);
        $notifications = $this->Notification_model->get_notifications($type_id);

        $response['notif'] = $notifications;
        $response['notif_count'] = count($notifications);

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
        
    }

    protected function get_all_users()
    {
        $records = $_REQUEST;

        if(isset($records['filter'])){
            $id = $records['filter']['both']['id'];
            $first_name = $records['filter']['both']['first_name'];
            $last_name = $records['filter']['both']['last_name'];
        }else{
            $id = '';
            $first_name = '';
            $last_name = '';
        }

        $order_by = 'users.id DESC';

        if(isset($records['order'])){
            if($records['order'][0]['column'] == 1){
                $order_by = 'first_name'. ' ' . $records['order'][0]['dir'];
            }elseif ($records['order'][0]['column'] == 2) {
                $order_by = 'last_name' . ' ' . $records['order'][0]['dir'];
            }
        }
        
        $this->db->where('for_approval', 1);
        $users = $this->Users_model->get_all_users($first_name, $last_name, $id, false, false, false, $order_by, 5);

        $iTotalRecords = count($users);
        
        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        
        $sEcho = intval($_REQUEST['draw']);

        $records["data"] = array(); 

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        for($i = $iDisplayStart; $i < $end; $i++) {
            $user = $users;

            $records["data"][] = array(
                $user[$i]->id, 
                $user[$i]->first_name,
                $user[$i]->last_name,
                '<a href="'.site_url("admin/forApproval/form/".$user[$i]->user_id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-pencil"></i> Edit</a>',
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

    protected function user_delete()
    {
        $user_id = $this->input->post('id');

        $this->Users_model->delete_user($user_id);

        echo json_encode($user_id);
    }

}