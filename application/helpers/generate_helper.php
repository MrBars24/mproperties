<?php defined('BASEPATH') OR exit('No direct script access allowed.');

function config($item)
{
	$CI =& get_instance();
	return $CI->config->item($item);
}

function get_notification($types = NULL)
{
	$CI =& get_instance();
	$CI->load->model('notification_model');
	
	return $CI->notification_model->get_notifications($types);
}

function generate_code($length=16)
{
	$vowels = '0123';
	$consonants = '456ABCDEFGHIJKLMNOPQRSTUVWXYZ789';
 
	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}

function mp_format($num, $decimal_places = 2, $decimal_point = '.', $thousand_separator = ',')
{
	if(strrpos(floatval($num), '.'))
	{
		return number_format($num, $decimal_places, $decimal_point, $thousand_separator);
	}

	return floatval($num);
}

?>