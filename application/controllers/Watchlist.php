<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Watchlist extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('ion_auth');
		$this->load->model('Users_model');
		$this->load->model('Property_model');
    }

    public function index()
	{
        $watch = $this->Property_model->get_property_watch();

		$data = [
            'watchlists' => $watch,
            'count_properties' => count($watch)
        ];

		$this->load->view('watch-list-tpl', $data);
	}
    
}