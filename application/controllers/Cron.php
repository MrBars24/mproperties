<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaction_model');
		$this->load->model('Property_model');
		$this->load->model('Trust_model');

	}

	public function updateDeposits()
	{
		$this->Transaction_model->updateExpiredDeposit();
	}

	public function generate_rental_payment($testing = FALSE)
	{
		$properties = $this->Property_model->get_rental_due_property($testing);
		
		$time = ($testing) ? strtotime($this->config->item('system_date') . date(' H:i:s')) : time();

		$data = [];
		foreach($properties as $key => $property){
			$data[] = [
				'property_id' => $property->property_id,
				'trust_id' => NULL,
				'amount' => $property->rental_payment,
				'type' => 1,
				'description' => 'Rental',
				'table' => 'rental_collection',
				'added_at' => date("Y-m-d", $time),
				'meta' => json_encode([
						'rental_contract_id' => $property->id,
						'due_date' => ($property->is_new) ? date('Y-m-d', strtotime("$property->day_due -1 months")) : $property->day_due,
						'contract_date' => $property->rental_contract_start_date
					]
				)
			];
		}

		if(count($data) > 0) {
			$this->Property_model->add_rental($data);
		}

		if($_SERVER['HTTP_REFERER'] == site_url('test/test')) {
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function property_valuation($testing = FALSE)
	{

		$properties = $this->Property_model->get_due_properties();
		foreach($properties as $key => $property){

			if(!empty($property->last_valauation) && !empty($property->last_distribution)) {
				if($property->last_valuation == $property->last_distribution) continue;
			}

			$urban_zoom = new stdClass();
			if($this->config->item('urbanzone_state')) {
				$urban_zoom = $this->urban_zoom($property->postalcode, $property->floor_level, $property->units_issued, $property->property_size, false);
			} else {
				$urban_zoom->valuation = $_REQUEST['property_value'];
			}
			
			$tax_span = 180 - ($property->valuation_count); // @todo : compute 180 - (total count of valuation of a property)

			$platform_fee = 0;
			if($property->is_quarter) {
				$platform_fee = ($property->platform_fee_percentage / 100) * ($urban_zoom->valuation / 4);
			}
			$income = $this->Property_model->get_property_component($property->trust_id, $this->config->item('property_income'))->total;
			$expense = $this->Property_model->get_property_component($property->trust_id, $this->config->item('property_expense'))->total;
			
			$setup_cost = $property->setup_cost * $tax_span / 180;
			
			$cash_buff = empty($property->val_property_value_cash) ? $property->cash_buffer : $property->val_property_value_cash;
			$units = empty($property->val_total_units) ? $property->units_issued : $property->val_total_units;
			
			$tax =  $property->tax * ($tax_span / 180);
			$cash = $cash_buff + $income - $expense - $platform_fee;
			
			$nav = $urban_zoom->valuation + $tax + $cash + $setup_cost;
			$new_price = $nav / $units;
			
			$data = [
				"property_id" => $property->property_id,
				"property_value" => $urban_zoom->valuation,
				"nav" => $nav,
				"property_value_tax" => $tax,
				"property_value_cash" => $cash,
				"total_units" => $units,
				"price_per_unit" => $new_price,
				"setup_cost" => $setup_cost,
				'return' => empty($property->val_return) ? (($new_price / $property->price_per_unit) - 1) : ($new_price / $property->val_price_per_unit) - 1,
				'platform_fee' => $platform_fee
			];

			if($testing) {
				$created = $this->config->item('system_date') . date(' H:i:s');

				$data += [
					'created_at' => $created
				];
			}

			// @todo : Insert latest investment
			$this->Property_model->add_property_valuation($data, $testing);
			if($property->is_quarter) {
				$this->distribution($property, $data, $testing);
			}

		}

		if($_SERVER['HTTP_REFERER'] == site_url('test/test')) {
			redirect($_SERVER['HTTP_REFERER']);
		}

	}

	private function distribution($property, $computed, $testing = FALSE)
	{
		$tax = $computed['property_value_tax'];
		$cash = $computed['property_value'] * 0.02;
		$setup_cost = $computed['setup_cost'];

		$excess_cash = $computed['property_value_cash'] - $cash;
		$total_units = $computed['total_units'] - $excess_cash / $computed['price_per_unit'];
	
		$data = [
			"property_id" => $property->property_id,
			"property_value" => $computed['property_value'],
			"nav" => $computed['property_value'] + $tax + $cash + $setup_cost,
			"property_value_tax" => $computed['property_value_tax'],
			"property_value_cash" => $cash,
			"total_units" => $total_units,
			"price_per_unit" => $computed['price_per_unit'],
			"setup_cost" => $computed['setup_cost'],
			"return" => $computed['return'],
			'is_distribution' => 1,
			'excess' => $excess_cash
		];

		$this->Property_model->add_property_valuation($data, $testing);

	}

	// get month differential
	private function get_month_diff($start)
	{
		$end = date('Y-m-d h:i:s');
		$start = new DateTime($start);
		$end   = new DateTime($end);
		$diff  = $start->diff($end);
		return $diff->format('%y') * 12 + $diff->format('%m');
	}

	private function urban_zoom($postal_code, $floor_number, $unit_number, $sqft, $housing_type)
	{
		$url =  "https://www.urbanzoom.com/api/v1/ml/new_valuation?postal_code={$postal_code}&floor_number={$floor_number}&unit_number={$unit_number}&area_in_sqft={$sqft}&housing_type=Condo&flat_type=&locale=en";
 
		$ch = curl_init();
 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  
		curl_setopt($ch, CURLOPT_URL,$url);
	
		$result = curl_exec($ch);
	  
		curl_close($ch);

		return json_decode($result);
	}

}