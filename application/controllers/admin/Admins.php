<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('ion_auth');
        $this->load->model('Users_model');

        menu::setSelected('users');
        menu::setSelected('admins');
    }



	public function index(){

		$data = array();

		$this->load->view('admin/admins-tpl',$data);
	}   

    function form($admin_id = false)
    {
        $data = array();

        if ($admin_id != 0)
        {

            $admin_info = $this->Users_model->get_user($admin_id);

            $first_name = $admin_info->first_name;
            $last_name = $admin_info->last_name;
            $email = $admin_info->email;
            $selected_group = '';
            $groups = '';
            $profile_photo = $admin_info->profile_photo;


        }else{

            $first_name = '';
            $last_name = '';
            $email = '';
            $selected_group = 1;
            $groups = array(1 => 'Super Administrator',
                2 => 'Account Manager',
                3 => 'Property Manager',
                4 => 'Content Manager',
                5 => 'User',
                6 => 'Real Estate Agent',
                7 => 'Promoters',
                8 => 'KYC Manager',
                9 => 'Escrow Manager');

            $profile_photo = '';
        }

        $data['admin_id'] = $admin_id;
        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $data['email'] = $email;
        $data['selected_group'] = $selected_group;
        $data['groups'] = $groups;
        $data['profile_photo'] = $profile_photo;

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($admin_id == 0) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required');
        } else {
            if ($this->input->post('password') != '') {
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required');
            }
        }

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = strtolower($this->input->post('email'));
        }





        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/admins-form-tpl',$data);

        }else{

            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $username = strtolower($this->input->post('email'));
            $password = $this->input->post('password');
            $email = strtolower($this->input->post('email'));
            $group = $this->input->post('user_group');



            $additional_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name
            );

            $group = array($group);

            if ($admin_id != 0) {

                if ($_FILES['profile-photo']['name'] != '') {
                    $profile_photo = $this->upload_profile($profile_photo);
                }

                $save_data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'password' => $password,
                    'profile_photo' => $profile_photo
                );

                $this->ion_auth->update($admin_id, $save_data);
                $this->session->set_flashdata('admin_updated', 'Admin Updated');
                redirect('admin/admins');
            }else{

                $admin_id = $this->ion_auth->register($username, $password, $email, $additional_data, $group);

                if ($_FILES['profile-photo']['name'] != '') {
                    $profile_photo = $this->upload_profile($profile_photo);
                }

                $save_data = array(
                    'profile_photo' => $profile_photo
                );

                $this->ion_auth->update($admin_id, $save_data);
                redirect($this->redirect($group[0]));
            }

            
            
        }

    }

    public function upload_profile($profile_photo){
        $upload_p = 'uploads/profile/';

        $photo_path = $upload_p . $profile_photo;

        // if (file_exists($photo_path)) {
        //     unlink($photo_path);
        // }

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
                    $username = $records['filter']['both']['username'];
                    $first_name = $records['filter']['both']['first_name'];
                    $last_name = $records['filter']['both']['last_name'];
                    $email = $records['filter']['both']['email'];
                }else{
                    $username = '';
                    $first_name = '';
                    $last_name = '';
                    $email = '';
                }

                $order_by = 'users.id DESC';

                if(isset($records['order'])){
                    if($records['order'][0]['column'] == 1){
                        $order_by = 'first_name'. ' ' . $records['order'][0]['dir'];
                    }elseif ($records['order'][0]['column'] == 2) {
                        $order_by = 'last_name' . ' ' . $records['order'][0]['dir'];
                    }elseif ($records['order'][0]['column'] == 3) {
                        $order_by = 'email' . ' ' . $records['order'][0]['dir'];
                    }
                }             

                $users = $this->Users_model->get_all_users($first_name, $last_name, $username, $email, false, false, $order_by, 1);

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
                        $user[$i]->username, $user[$i]->first_name,$user[$i]->last_name,$user[$i]->email,
                        '<a href="'.site_url("admin/admins/form/".$user[$i]->user_id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-pencil"></i> Edit</a><a href="javascript:void(0);" class="btn btn-sm btn-circle btn-default btn-editable" onclick="deleteAdmin('.$user[$i]->user_id.')">Delete</a>',
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

            case 'admin_delete':
                $admin_id = $this->input->post('id');
                $this->Users_model->delete_user($admin_id);

                echo json_encode($admin_id);
                break;
        }
    }

    protected function redirect($type)
    {   
        $type = (int)$type;
        $page = '';
        $user_type = '';

        switch ($type) {
            case 1:
                $page = 'admin/admins';
                $user_type = 'Admin';
                break;
            case 2:
                $page = 'admin/account-managers';
                $user_type = 'Account Manager';
                break;
            case 3:
                $page = 'admin/property-managers';
                $user_type = 'Property Manager';
                break;
            case 4:
                $page = 'admin/content-managers';
                $user_type = 'Content Manager';
                break;
            case 5:
                $page = 'admin/users';
                $user_type = 'User';
                break;
            case 6:
                $page = 'admin/real-estate-agents';
                $user_type = 'Real Estate Agent';
                break;
            case 7:
                $page = 'admin/promoters';
                $user_type = 'Promoter';
                break;
            case 8:
                $page = 'admin/know-your-client';
                $user_type = 'Know Your Client';
                break;
            case 9:
                $page = 'admin/escrow-managers';
                $user_type = 'Escrow Manager';
                break;
            default:
                $page = 'admin/admins';
                $user_type = 'Admin';
                     
        }
        
        $this->session->set_flashdata('message', $user_type . ' Added');
        
        return $page;

    }

}