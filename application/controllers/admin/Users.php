<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('ion_auth');
        $this->load->model('Users_model');
        $this->load->model('Property_model');
        $this->load->model('Country_model');

        menu::setSelected('users');
        menu::setSelected('admins');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('admin/login', 'refresh');
        }
    }



	public function index(){

		$data = array();

		$this->load->view('admin/users-tpl',$data);
    }   

    public function subscribers()
    {
        $data = array();
        $this->load->view('admin/subscribers-tpl');
    }

    function form($user_id = false)
    {
        $data = array();



        if ($user_id != 0)
        {

            $admin_info = $this->Users_model->get_user($user_id);
            $first_name = $admin_info->first_name;
            $last_name = $admin_info->last_name;
            $email = $admin_info->email;
            $billing_scan = $admin_info->billing_scan;
            $id_scan = $admin_info->id_scan;
            $id_back_scan= $admin_info->id_scan_back;
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

        }else{

            $first_name = "";
            $last_name = "";
            $email = "";
            $billing_scan = "";
            $id_scan = "";
            $id_back_scan= ""; 
            $address = "";
            $phone = "";
            $postal_code = ""; 
            $nationality = "";
            $unit_number = "";
            $dob = "";
            $country_of_birth = "";
            $us_resident = "";
            $residence_country = "";
            $employment_status = "";
            $occupation = "";
            $is_accredited_investor = "";
            $is_holding_public_office = "";
            $annual_income = "";
            $account_fund_source = "";
        }

        

        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $data['email'] = $email;
        $data['user_id'] = $user_id;
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
        $data["countries"] = $this->Country_model->get_countries();
        $data['id_scan'] = $id_scan;
        $data['id_back_scan'] = $id_back_scan;
        $data['billing_scan'] = $billing_scan;
        $data['employment'] = ['Employment', 'Investment', 'Inheritance', 'Ownership of Business', 'Savings'];

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');  
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('postal_code', 'Postal Code', 'trim|required');
        $this->form_validation->set_rules('nationality', 'Nationality', 'trim|required');
        $this->form_validation->set_rules('unit_number', 'Unit Number', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');


        if ($user_id == 0) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required');
        } else {
            if ($this->input->post('password') != '') {
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required');
            }
        }

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $post = $this->input->post();
            // echo '<pre>';
            // print_r($_FILES);
            // echo '</pre>';
            // exit;
            $data['first_name'] = $post["first_name"];
            $data['last_name'] = $post["last_name"];
            $data['email'] = $post["email"];  
            $data['address'] = $post["address"];
            $data['phone'] = $post["phone"];
            $data['postal_code'] = $post["postal_code"];
            $data['nationality'] = $post["nationality"];
            $data['unit_number'] = $post["unit_number"];
            $data["dob"] = $post["dob"];
            $data["country_of_birth"] = $post["country_of_birth"];
            $data["us_resident"] = $post["us_residence"];
            $data["residence_country"] = $post["country_of_residence"];
            $data["employment_status"] = $post["employment_status"];
            $data["occupation"] = $post["occupation"];
            $data["is_accredited_investor"] = $post["is_accredited_investor"];
            $data["is_holding_public_office"] = $post["is_holding_public_office"];
            $data["annual_income"] = $post["annual_income"];
            $data["account_fund_source"] = $post["account_fund_source"];
        }

        if ($this->form_validation->run() == FALSE){

            $this->load->view('admin/users-form-tpl',$data);

        }else{

            $post = $this->input->post();

            $first_name = $post["first_name"];
            $last_name = $post["last_name"];
            $email = $post["email"];
            $address = $post["address"];
            $phone = $post["phone"];
            $postal_code = $post["postal_code"];
            $nationality = $post["nationality"];
            $unit_number = $post["unit_number"];
            $dob = $post["dob"];
            $country_of_birth = $post["country_of_birth"];
            $us_resident = $post["us_residence"];
            $residence_country = $post["country_of_residence"];
            $employment_status = $post["employment_status"];
            $occupation = $post["occupation"];
            $is_accredited_investor = $post["is_accredited_investor"];
            $is_holding_public_office = $post["is_holding_public_office"];
            $annual_income = $post["annual_income"];
            $account_fund_source = $post["account_fund_source"];
            $password = $post["password"];


            if($user_id != 0) {
                $user_info = $this->Users_model->get_user($user_id);
                $id_scan_front = $user_info->id_scan;
                $id_scan_back = $user_info->id_scan_back;
                $billing_scan = $user_info->billing_scan;
            } else {
                $id_scan_front = $_FILES['id_scan']['name'];
                $id_scan_back = $_FILES['id_scan_back']['name'];
                $billing_scan = $_FILES['billing_scan']['name'];
    
            }

            if($user_id != 0){
                $last_id = $user_id;
            }else{
                $last_id = $this->Users_model->last_user_id() + 1;
            }
            

            $users = $this->Users_model->get_user($user_id);
            $user_path = 'uploads/documents/'.$last_id;


            if (isset($_FILES['id_scan'])) {
                if ($_FILES['id_scan']['name'] != '') {
                    $id_scan_front = $this->upload_image($user_path, 'id_scan', $id_scan_front);
                }
            }
            
            if (isset($_FILES['id_scan_back'])) {

                if ($_FILES['id_scan_back']['name'] != '') {
                    $id_scan_back = $this->upload_image($user_path, 'id_scan_back', $id_scan_back);
                }                    
            }

            if (isset($_FILES['billing_scan'])) {

                if ($_FILES['billing_scan']['name'] != '') {
                    $billing_scan = $this->upload_image($user_path, 'billing_scan', $billing_scan);
                }                    
            }

            // echo $id_scan_front.'<br>';
            // echo $id_scan_back.'<br>';
            // echo $billing_scan.'<br>';
            // die();
            $additional_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'address' => $address,
                'phone' => $phone,
                'postal_code' => $postal_code,
                'nationality' => $nationality,
                'unit_no' => $unit_number,
                'dob' => $dob,
                'country_of_birth' => $country_of_birth,
                'us_resident' => $us_resident,
                'residence_country' => $residence_country,
                'employment_status' => $employment_status,
                'occupation' => $occupation,
                'is_accredited_investor' => $is_accredited_investor,
                'is_holding_public_office' => $is_holding_public_office,
                'annual_income' => $annual_income,
                'account_fund_source' => $account_fund_source,
                'id_scan' => $id_scan_front,
                'id_scan_back' => $id_scan_back,
                'billing_scan' => $billing_scan
            );

           

            $group = array('5');

            if ($user_id != 0) {

                if ($_FILES['profile-photo']['name'] != '') {
                    $profile_photo = $this->upload_profile($profile_photo);
                }

                $save_data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'address' => $address,
                    'phone' => $phone,
                    'postal_code' => $postal_code,
                    'nationality' => $nationality,
                    'unit_no' => $unit_number,
                    'dob' => $dob,
                    'country_of_birth' => $country_of_birth,
                    'us_resident' => $us_resident,
                    'residence_country' => $residence_country,
                    'employment_status' => $employment_status,
                    'occupation' => $occupation,
                    'is_accredited_investor' => $is_accredited_investor,
                    'is_holding_public_office' => $is_holding_public_office,
                    'annual_income' => $annual_income,
                    'account_fund_source' => $account_fund_source,
                    'id_scan' => $id_scan_front,
                    'id_scan_back' => $id_scan_back,
                    'billing_scan' => $billing_scan
                );

                

                $this->session->set_flashdata('user_updated', 'User Updated');
                $this->ion_auth->update($user_id, $save_data);

            }else{

                //die(print_r($additional_data));

                $user_id = $this->ion_auth->register($username, $password, $email, $additional_data, $group);

                if ($_FILES['profile-photo']['name'] != '') {
                    $profile_photo = $this->upload_profile($profile_photo);
                }

                $save_data = array(
                    'profile_photo' => $profile_photo
                );
                $this->session->set_flashdata('user_added', 'User Added');
                $this->ion_auth->update($user_id, $save_data);
                

            }

            redirect('admin/users');
        }

    }

    public function portfolio($user_id)
    {
        $user = $this->Users_model->get_user($user_id); 

        $data["name"] = $user->first_name. " " .$user->last_name;
        $data["user_id"] = $user_id;

        $this->load->view('admin/users-portfolio-tpl', $data);

    }


    public function users_portfolio($user_id)
    {
        $records = $_REQUEST;

        // if(isset($records['filter'])){
        //     $id = $records['filter']['both']['id'];
        //     $first_name = $records['filter']['both']['first_name'];
        //     $last_name = $records['filter']['both']['last_name'];
        //     $email = $records['filter']['both']['email'];
        //     $phone = $records['filter']['both']['phone'];
        // }else{
        //     $id = '';
        //     $first_name = '';
        //     $last_name = '';
        //     $email = '';  
        //     $phone = '';
        // }

        // $order_by = 'users.id DESC';

        // if(isset($records['order'])){
        //     if($records['order'][0]['column'] == 1){
        //         $order_by = 'first_name'. ' ' . $records['order'][0]['dir'];
        //     }elseif ($records['order'][0]['column'] == 2) {
        //         $order_by = 'last_name' . ' ' . $records['order'][0]['dir'];
        //     }elseif ($records['order'][0]['column'] == 3) {
        //         $order_by = 'email' . ' ' . $records['order'][0]['dir'];
        //     }elseif($records['order'][0]['column'] == 5) {
        //         $order_by = 'phone' . ' ' . $records['order'][0]['dir'];
        //     }
        // }             

        $user_investments = $this->Users_model->get_invesments($user_id);

        $iTotalRecords = count($user_investments);
        
        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        
        $sEcho = intval($_REQUEST['draw']);

        $records["data"] = array(); 

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        for($i = $iDisplayStart; $i < $end; $i++) {
            $user = $user_investments;
            $property = $this->Property_model->get_property($user[$i]->property_id);
            $percentage =  ($user[$i]->percent_invested / 100) * 100;

            $records["data"][] = array(
                "<a href='".base_url()."admin/property/investment/{$property->property_id}'>".$property->property_name."</a>", 
                "$".number_format($property->property_price, 2),
                "$".number_format($property->sqft, 2),
                $user[$i]->units_invested,
                "$".number_format($user[$i]->invested_amount, 2),
                $percentage."%",
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

    public function upload_profile($profile_photo){
        $upload_p = 'uploads/profile/';

        $photo_path = $upload_p . $profile_photo;

        if (file_exists($photo_path)) {
            unlink($photo_path);
        }

        $config['upload_path'] = $upload_p;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 1024 * 125;
        $config['file_name'] = substr(md5(time()), 0, 8);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload('profile-photo');

        $this->load->library('image_lib');
        $data = $this->upload->data();

        return $data['file_name'];
    }

    public function ajax($section){
        switch ($section) {
            case 'get_all_users':
                $records = $_REQUEST;

                if(isset($records['filter'])){
                    $id = $records['filter']['both']['id'];
                    $first_name = $records['filter']['both']['first_name'];
                    $last_name = $records['filter']['both']['last_name'];
                    $email = $records['filter']['both']['email'];
                    $phone = $records['filter']['both']['phone'];
                }else{
                    $id = '';
                    $first_name = '';
                    $last_name = '';
                    $email = '';  
                    $phone = '';
                }

                $order_by = 'users.id DESC';

                if(isset($records['order'])){
                    if($records['order'][0]['column'] == 1){
                        $order_by = 'first_name'. ' ' . $records['order'][0]['dir'];
                    }elseif ($records['order'][0]['column'] == 2) {
                        $order_by = 'last_name' . ' ' . $records['order'][0]['dir'];
                    }elseif ($records['order'][0]['column'] == 3) {
                        $order_by = 'email' . ' ' . $records['order'][0]['dir'];
                    }elseif($records['order'][0]['column'] == 5) {
                        $order_by = 'phone' . ' ' . $records['order'][0]['dir'];
                    }
                }             

                $users = $this->Users_model->get_all_users($first_name, $last_name, $id, $email, false, $phone, $order_by, 5);

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

                    if($user[$i]->kyc_status == null){
                        $status = 'Inactive';
                    }else if($user[$i]->kyc_status == 0){
                        $status = 'Active';
                    }else if($user[$i]->kyc_status == 1){
                        $status = 'Validated';
                    }else if($user[$i]->kyc_status == 2){
                        $status = 'Active';
                    }
                    
                    $records["data"][] = array(
                        $user[$i]->user_id, 
                        $user[$i]->first_name,
                        $user[$i]->last_name,$user[$i]->email,
                        $user[$i]->phone,
                        $status,
                        // (!empty($user[$i]->id_scan)) ? 
                        // '<a target="_blank" href="'.site_url('uploads') . '/documents/'.$user[$i]->user_id.'/' . $user[$i]->id_scan.'">
                        //     <img src='.site_url('uploads') . '/documents/'. $user[$i]->user_id .'/' . $user[$i]->id_scan.' width="50px" height="50px">
                        // </a>' : "",

                        // (!empty($user[$i]->id_scan_back)) ? 
                        // '<a target="_blank" href="'.site_url('uploads') . '/documents/'.$user[$i]->user_id.'/' . $user[$i]->id_scan_back.'">
                        //     <img src='.site_url('uploads') . '/documents/'. $user[$i]->user_id .'/' . $user[$i]->id_scan_back.' width="50px" height="50px">
                        // </a>' : "",

                        // (!empty($user[$i]->billing_scan)) ?
                        // '<a target="_blank" href="'.site_url('uploads') . '/documents/'.$user[$i]->user_id.'/' . $user[$i]->billing_scan.'">
                        //     <img src='.site_url('uploads') . '/documents/'. $user[$i]->user_id .'/' . $user[$i]->billing_scan.' width="50px" height="50px">
                        // </a>' : '',
                        '
                        <select id="select-action" data-id="'.$user[$i]->user_id.'" class="btn btn-default">
                            <option value="0">Select Action</option>
                            <option value="1">Edit</option>
                            <option value="2">Bank Details</option>
                            <option value="3">Portfolio</option>
                            <option value="4">Deposit</option>
                            <option value="5">Delete</option>
                        </select>
                        ',
                    );

                      // <a href="'.site_url("admin/users/form/".$user[$i]->user_id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-pencil"></i> Edit</a>
                      //   <a href="'.site_url("admin/users/bank/details/".$user[$i]->user_id).'" class="btn btn-sm btn-circle btn-default btn-editable"> Bank Details</a>
                      //   <a href="'.site_url("admin/users/portfolio/details/".$user[$i]->user_id).'" class="btn btn-sm btn-circle btn-default btn-editable"> Portfolio</a>
                      //   <a href="'.site_url("admin/users/deposit/history/".$user[$i]->user_id).'" class="btn btn-sm btn-circle btn-default btn-editable"> Deposit History</a>
                      //   <a href="javascript:void(0);" class="btn btn-sm btn-circle btn-default btn-editable" onclick="deleteUser('.$user[$i]->user_id.')">Delete</a>
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

            case 'user_delete':

                $user_id = $this->input->post('id');

                $this->Users_model->delete_user($user_id);
                $this->session->set_flashdata('user_deleted', 'User Deleted');
                echo json_encode($user_id);

            break;
            case 'users_portfolio':
                $this->users_portfolio($this->input->post('user_id'));
            break;
            case 'get_subscribers':
                $this->get_subscribers();
            break;
        }
    }

    private function get_subscribers(){
        $records = $_REQUEST;
 
            
                $subscribers = $this->Users_model->get_subscribers();

                $iTotalRecords = count($subscribers);
                
                $iDisplayLength = intval($_REQUEST['length']);
                $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
                $iDisplayStart = intval($_REQUEST['start']);
                
                $sEcho = intval($_REQUEST['draw']);

                $records["data"] = array(); 

                $end = $iDisplayStart + $iDisplayLength;
                $end = $end > $iTotalRecords ? $iTotalRecords : $end;

                for($i = $iDisplayStart; $i < $end; $i++) {
                    $sub = $subscribers;

                    $user = $this->Users_model->get_user_by_email($sub[$i]->emails);

                    $records["data"][] = array(
                        $sub[$i]->id,
                        (count($user) > 0 ? $user->first_name." ".$user->last_name : ""),
                        $sub[$i]->emails,
                        (count($user) > 0 ? "member" : "non-member"),
                        $sub[$i]->date_added,
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

    private function upload_image($upload_p, $do_upload, $photo){

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

}