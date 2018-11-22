<?php

class MY_Controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function action($request)
	{
		$arguments = $this->uri->segment_array();
		$response = NULL;
		
		foreach($arguments as $index => $args) {
			if($args === 'action') {
				unset($arguments[$index]);
				break;
			}
			
			unset($arguments[$index]);
		}
		
		$request = reset($arguments);
		array_shift($arguments);

		if(in_array($request, $this->valid_actions)) {
			$action = $this->snakeToCamelCase($request);
			
			$method = 'action' . $action;

			// perform a dynamic method call with variable number of arguments;
			$response = call_user_func_array([$this, $method], $arguments);
		}

		// response
		return $response;
	}

	/**
	 * snakeToCamelCase
	 * Transform snake case to camel case
	 *
	 * @param string $string
	 * @param boolean $capitalizeFirstCharacter
	 * @return string
	 */
	public function snakeToCamelCase($string, $capitalizeFirstCharacter = true) 
	{
		$str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
		if(!$capitalizeFirstCharacter) {
			$str = lcfirst($str);
		}
		return $str;
	}

	
	/**
	 * Computation function for Profile Percentage
	 *
	 * @param mixed $user
	 * @return void
	 */
	public function computeProfilePercentage($user = NULL)
	{
		if(empty($user)) {
			$user = $this->Users_model->get_user($this->session->userdata('user_id'));
		}

		$requirements = [
			'personal' => [
				'first_name', 'last_name', 'phone', 'dob', 'us_resident', 'nationality'
			],
			'residential' => [
				'residence_country', 'postal_code', 'address', 'unit_no'
			],
			'occupation' => [
				'employment_status', 'occupation', 'annual_income', 'is_accredited_investor', 'is_holding_public_office', 'account_fund_source'
			],
			'documents' => [
				'billing_scan', 'id_scan', 'id_scan_back'
			]
		];
		
		$data = [
			'personal' => 'required',
			'residential' => 'required',
			'occupation' => 'required',
			'documents' => 'required',
			'total_percent' => 0,
			'status' => $user->is_complete
		];

		foreach($requirements as $key => $require) {
			$is_complete = TRUE;

			foreach($require as $r) {
				if(is_null($user->$r) || strlen($user->$r) <= 0) {
					$is_complete = FALSE;
					break;
				}
			}

			if($is_complete) {
				$data['total_percent'] += 25;
				$data[$key] = 'completed';
			} 
		}

		return $data;
	}
}