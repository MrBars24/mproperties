<?php defined('BASEPATH') OR exit('No direct script access allowed.');

function sendActivationEmail($user_info)
{

    $CI = &get_instance();
    $CI->load->library('email');
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(1);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name.' '.$user_info->last_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{activation_url}', $CI->config->item('base_url') . 'activate/' . $user_info->activation_code, $row['content']);

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);
    $CI->email->from('no-reply@mymicroproperties.com');
    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);
    $CI->email->send();

}

function sendResetPassword($user_info)
{

    $CI = &get_instance();
    $CI->load->library('email');
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(2);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'account/reset_password/' . $user_info->forgotten_password_code, $row['content']);

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);
    $CI->email->send();

}

function sendApprovedKYC($user_info)
{

    $CI = &get_instance();
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(3);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    //return $row['content'];

    
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);

    $CI->email->send();
  

}

function sendRejectedKYC($user_info, $fields, $reason)
{

    $CI = &get_instance();
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(4);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{resubmit}', $CI->config->item('base_url') . 'my-profile', $row['content']);
    $row['content'] = str_replace('{fields}', $fields, $row['content']);
	$row['content'] = str_replace('{reason}', $reason, $row['content']);

    //return $row['content'];

 
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);

    $CI->email->send();


}

function sendDepositAccepted($user_info)
{

    $CI = &get_instance();
    $CI->load->library('email');
    $CI->load->model('Email_model');
    $CI->load->model('Property_model');

    $row = $CI->Email_model->get_message(5);

    $row['content'] = html_entity_decode($row['content']);
    
    $data = ['hotlist' => $CI->Property_model->get_hot_properties()];
    $hots = $CI->load->view('templates/hot-list-tpl', $data, true);
    $row['content'] = str_replace('{hot_list}', $hots, $row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'users/forgot_password/' . $user_info->activation_code, $row['content']);
    
    $row['content'] = str_replace('{vall_url}', site_url('properties'), $row['content']);

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);
    $CI->email->from('no-reply@mymicroproperties.com');
    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);
    $CI->email->send();

}

function sendDepositRequest($user_info)
{

    $CI = &get_instance();
    $CI->load->library('email');
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(6);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'users/forgot_password/' . $user_info->activation_code, $row['content']);

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);
    $CI->email->from('no-reply@mymicroproperties.com');
    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);
    $CI->email->send();

}

function sendSuccessfulTransaction($user_info, $property_id)
{

    $CI = &get_instance();
    $CI->load->model('Email_model');
    $CI->load->model('Property_model');
    $CI->load->model('Users_model');
    $property = $CI->Property_model->get_property($property_id);
    $user_info = $CI->Users_model->get_user($user_info);
    $property_images = $CI->Property_model->get_property_images($property_id);

    foreach($property_images as $image){
        if($image->is_default == 1){
            $img = $image->filename;
            break;
        }else{
            $img = $property_images[0]->filename;
        }
    }

    $row = $CI->Email_model->get_message(7);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'users/forgot_password/' . $user_info->activation_code, $row['content']);

    $row['content'] = str_replace('{property_name}', $property->property_name, $row['content']);
    $row['content'] = str_replace('{property_image}', $img, $row['content']);
    $row['content'] = str_replace('{property_price}', number_format($property->property_price), $row['content']);

    $CI->email->initialize($config);
    $CI->email->from('no-reply@mymicroproperties.com');
    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);
    $CI->email->send();

    /*
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);

    $CI->email->send();
    */

}

function sendFailTransaction($user_info)
{

    $CI = &get_instance();
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(8);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'users/forgot_password/' . $user_info->activation_code, $row['content']);

    return $row['content'];

    /*
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);

    $CI->email->send();
    */

}

function sendPropertyListing($user_info)
{

    $CI = &get_instance();
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(9);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'users/forgot_password/' . $user_info->activation_code, $row['content']);

    return $row['content'];

    /*
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);

    $CI->email->send();
    */

}

function sendPropertyTransfer($user_info)
{

    $CI = &get_instance();
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(10);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'users/forgot_password/' . $user_info->activation_code, $row['content']);

    return $row['content'];

    /*
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);

    $CI->email->send();
    */

}

function sendChat($user_info)
{

    $CI = &get_instance();
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(11);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'users/forgot_password/' . $user_info->activation_code, $row['content']);

    return $row['content'];

    /*
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);

    $CI->email->send();
    */

}

function sendJoiner($user_info)
{

    $CI = &get_instance();
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(12);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'users/forgot_password/' . $user_info->activation_code, $row['content']);

    return $row['content'];

    /*
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);

    $CI->email->send();
    */

}

function sendLatestValuation($user_info)
{

    $CI = &get_instance();
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(13);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'users/forgot_password/' . $user_info->activation_code, $row['content']);

    return $row['content'];

    /*
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);

    $CI->email->send();
    */

}

function sendNewUser($user_info)
{

    $CI = &get_instance();
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(14);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'users/forgot_password/' . $user_info->activation_code, $row['content']);

    return $row['content'];

    /*
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);

    $CI->email->send();
    */

}

function sendReminder($user_info)
{

    $CI = &get_instance();
    $CI->load->model('Email_model');

    $row = $CI->Email_model->get_message(15);

    $row['content'] = html_entity_decode($row['content']);

    $row['content'] = str_replace('{first_name}', $user_info->first_name, $row['content']);

    $row['content'] = str_replace('{url}', $CI->config->item('base_url'), $row['content']);

    $row['content'] = str_replace('{reset_password_url}', $CI->config->item('base_url') . 'users/forgot_password/' . $user_info->activation_code, $row['content']);

    return $row['content'];

    /*
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $CI->email->initialize($config);

    $CI->email->from('no-reply@mymicroproperties.com');

    $CI->email->to($user_info->email);

    $CI->email->subject($row['subject']);
    $CI->email->message($row['content']);

    $CI->email->send();
    */

}

?>