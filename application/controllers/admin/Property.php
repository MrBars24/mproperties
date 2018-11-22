<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends MY_Controller {

	protected $valid_actions = [
		'add_investment', 'complete_property'
	];

	public function __construct()
	{
		parent::__construct();
	
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('ion_auth');
		$this->load->model('Property_model');
		$this->load->model('Trust_model');
		$this->load->model('Transaction_model');
		$this->load->model('Users_model');

		menu::setSelected('properties');
		menu::setSelected('admins');

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('admin/login', 'refresh');

		}
	}

	public function index(){

		$data = array();

		$this->load->view('admin/property-listings-tpl',$data);
	}   

	public function listings(){

		$data = array();

		$this->load->view('admin/property-listings-tpl',$data);
	}

	public function valuation($property_id = false){

		if($property_id == false){
			redirect("admin");
		}

		$data = array();

		$property_info = $this->Property_model->get_property($property_id);

		$data['property_info'] = $property_info;

		$this->load->view('admin/property-valuation-listings-tpl',$data);
	}

	public function distribution($property_id = false){

		if($property_id == false){
			redirect("admin");
		}

		$data = array();

		$property_info = $this->Property_model->get_property($property_id);

		$data['property_info'] = $property_info;

		$this->load->view('admin/property-distribution-listings-tpl',$data);
	}

	public function rental_collections()
	{
		$data = array();

		$this->load->view("admin/rental-collections-tpl");

	}

	public function distribution_table()
	{
		$data = [];
		$this->load->view('admin/distribution-table-tpl', $data);
	}

	public function transactions($trust_id = false)
	{

		if(!$trust_id){
			redirect('admin/property/listings');
		}

		$data = array();

		$data["trust_id"] = $trust_id;

		$this->load->view('admin/transaction-records-tpl',$data);

	}

	public function form($property_id = false){
		$data = [];

		// POST
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$post = $this->input->post();


			
			$post['cash_buffer'] = $this->clean_commas($post['cash_buffer']);
			$post['property_price'] = $this->clean_commas($post['property_price']);
			$post['set_up_cost'] = $this->clean_commas($post['set_up_cost']);


			$prop_detail = [
				'property_id' => $property_id,
				'property_name' => $post['property_name'],
				'address' => $post['address'],
				'developer' => $post['developer'],
				'property_size' => $this->clean_commas($post['property_size']),
				'property_price' => $post['property_price'],
				'property_description' => $post['property_description'],
				'tags' => empty($post['property_tags']) ? "" : implode(',',$post['property_tags']),
				'district_id' => $post['district_id'],
				'sqft' => $this->clean_commas($post['property_sqft']),
				'baths' => $post['property_bath'],
				'floor_level' => $post['property_floor_level'],
				'furnishing' => $post['property_furnishing'],
				'tenure' => $post['property_tenure'],
				'bedrooms' => $post['property_bedrooms'],
				'top' => $post['property_top'],
				'images' => json_encode($post['images']),
				'years' => $post['property_years'],
				'strata_fee' => $post['strata_fee'],
				'listed_at' =>  date("Y-m-d H:i:s", strtotime($post['listed_at'])),
				'listing_id' =>$post['listing_id'],
				'lat' => $post['lat'],
				'lng' => $post['lng'],
				'postalcode' => $post['postal'],
			];

			/**
			 * BSD
			 * PURCHASE PRICE | RATE | AMOUNT
			 * 180k			  | 1%   | 1,800
			 * 180k			  | 2%   | 3,600
			 * 640k			  | 3%   | 19,200
			 * Amount remain  | 4%   | property_value - 1,000,000
			 */

			$pp = $post['property_price'];
			
			$bsd = [
				'first' => min($pp * 0.01, 1800),
				'second' => min($pp * 0.02, 3600),
				'third' => min($pp * 0.03, 19200),
				'remain' => max(($pp - 1000000) * 0.04, 0)
			];

			//   Property_value * 0.25 
			// + MIN(B3*0.01,1800)
			// + MIN((B3-180000)*0.02,3600)
			// + MIN((B3-360000)*0.03,19200)
			// + MAX((B3-1000000)*0.04,0)
			$sd = $bsd['first'] + $bsd['second'] + $bsd['third'] + $bsd['remain'];
			$tax = ($post['property_price'] * 0.25) + $sd;
			$nav = $post['property_price'] + $tax + $post['cash_buffer'] + $post['set_up_cost'];
			
			//echo $sd;
			//exit;
			
			$initial_nav = 1.28 * $post['property_price'] + $sd;
			$pct = [
				'property_value_pct' => ($pp / $initial_nav),
				'bsd_pct' => ($sd / $initial_nav),
				'absd_pct' => (($pp * 0.25) / $initial_nav),
				'cash_pct' => (($pp * 0.02) / $initial_nav),
				'setup_cost_pct' => (($pp * 0.01) / $initial_nav),
			];

			$trust_detail = [
				'units_issued' => $this->clean_commas($post['units_issued']),
				//'price_per_unit' => $post['price_per_unit'],
				'property_value' => $post['property_price'],
				'price_per_unit' => $nav / $this->clean_commas($post['units_issued']), // NAV / Units
				'ammortised_tax_months' => $this->clean_commas($post['ammortised_tax_months']),
				'cash_buffer' => $post['cash_buffer'],
				'platform_fee_percentage' => $this->clean_commas($post['platform_fee_percentage']),
				'cash_buffer_percentage' => $post['cash_buffer_p'],
				'tax' => $tax, //$post['property_price'] * CURRENT_TAX,
				'tax_percentage_use' => NULL, //CURRENT_TAX,
				'nav' => $nav,
				'initial_nav' => $initial_nav,
				'cost_amortization' => $initial_nav - 1.02 * $post['property_price'],
				'cost_amortization_per_month' => ($initial_nav - 1.02 * $post['property_price']) / 180,
				'setup_cost' => $post['set_up_cost'],	
				'setup_cost_percentage' => $post['set_up_cost_p'],
			];

			
		

			$trust_detail += $pct;
			if ($property_id != 0) {
				$trust_detail['property_id'] = $this->Property_model->update_property($prop_detail);
				$this->Property_model->update_trust_account($trust_detail);

				;

			} else{
				$trust_detail['property_id'] = $this->Property_model->insert_property($prop_detail);
				$this->Property_model->insert_trust_account($trust_detail);

				$property = $this->Property_model->get_all_properties();
				$last_id = end($property);

				$rental_collection = [
					"property_id" => $trust_detail['property_id'],
					"rental_pct" => $post["rental_percentage"],
					"rental_payment" => $this->clean_commas($post["rental_amount"]),
					"rental_contract_start_date" => date("Y-m-d H:i:s", strtotime($post['start_date'])),
					"rental_contract_end_date"	=> date("Y-m-d H:i:s", strtotime($post['end_date']))
				];

				$this->Property_model->insert_rental_collections($rental_collection);

			}
					
			if($post['images']) {

				$this->Property_model->delete_property_images($property_id);
				

				foreach($this->input->post('images') as $key => $image)
				{	
					
					$property_image['property_id'] = $trust_detail['property_id'];
					$property_image['image_id'] = $image['image_id'];
					$property_image['filename'] = $image['filename'];
					$property_image['caption'] = $image['caption'];
					$property_image['alt'] = $image['alt'];
					$property_image['sort_order'] = $image['sort_order'];

					if($image['link'] != "" && isset($image['link'])){
						$property_image['link'] = $image['link'];
					}else{
						$property_image['link'] = null;
					}

					if($post["primary_image"] == $image['image_id']){
						$property_image['is_default'] = 1;
					}else{
						$property_image['is_default'] = 0;
					}

					if(isset($post['is_360'][$key])){
						$property_image['is_360'] = 1;
					}else{
						$property_image['is_360'] = 0;
					}


					$this->Property_model->insert_property_image($property_image);
				}
			}
			
			if($property_id != 0){
				$this->session->set_flashdata("property_updated", "Property Updated");
				redirect('admin/property/form/' . $property_id);
			}else{
				$this->session->set_flashdata("property_added", "Property Added");
				redirect('admin/property');
			}
			
		} 
		// GET
		else {
			// initialize
			$districts = $this->Property_model->get_districts(); // get district
			$property = $this->Property_model->get_all_properties();
			$data = [
				'districts' => $districts,
				'property_id' => '',
				'district_id' => '',
				'property_name' => '',
				'address' => '',
				'developer' => '',
				'property_size' => '',
				'property_price' => '',
				'property_description' => '',
				'property_tags' => '',
				'property_sqft' => '',
				'property_bedrooms' => '',
				'property_baths' => '',
				'property_top' => '',
				'property_furnishing' => '',
				'property_floor_level' => '',
				'property_tenure' => '',
				'images' => '',
				'units_issued' => '',
				'price_per_unit' => '',
				'ammortised_tax_months' => '',
				'cash_buffer' => '',
				'cash_buffer_percentage' => '',
				'platform_fee_percentage' => '',
				'nav' => '',
				'property_years' => '',
				'tax' => '',
				'tax_percentage_use' => '',
				'strata_fee' => '',
				'listed_at' => '',
				'listing_id' => '',
				'lat' => '',
				'lng' => '',
				'postalcode' => '',
				'setup_cost' => '',
				'setup_cost_percentage' => '',
				'trust_id' => '',
				'cash_account' => '',
				'rental' => '',
				'is_locked' => 0,
				'rental_collections' => ""
			];

			if ($property_id != 0) {

				$images = $this->Property_model->get_property_images($property_id); // get property image
				$property_info = $this->Property_model->get_property($property_id); // get property
				$trust_info = $this->Trust_model->get_trust_account($property_id); // get trust account
				$total_expenses = $this->Trust_model->cash_account_sum($trust_info->trust_id, 2);
				$total_income = $this->Trust_model->cash_account_sum($trust_info->trust_id, 1);
				$cash_account = $trust_info->cash_buffer + $total_income - $total_expenses;
				$nav = $this->Property_model->get_latest_nav($property_id);

				$data = [
					'districts' => $districts,
					'property_id' => $property_id,
					'district_id' => $property_info->district_id,
					'property_name' => $property_info->property_name,
					'address' => $property_info->address,
					'developer' => $property_info->developer,
					'property_size' => $property_info->property_size,
					'property_price' => $property_info->property_price,
					'property_description' => $property_info->property_description,
					'property_tags' => $property_info->tags,
					'property_sqft' => $property_info->sqft,
					'property_bedrooms' => $property_info->bedrooms,
					'property_baths' => $property_info->baths,
					'property_top' => $property_info->top,
					'property_furnishing' => $property_info->furnishing,
					'property_floor_level' => $property_info->floor_level,
					'property_tenure' => $property_info->tenure,
					'images' => $images,
					'units_issued' => $trust_info->units_issued,
					'price_per_unit' => $trust_info->price_per_unit,
					'ammortised_tax_months' => $trust_info->ammortised_tax_months,
					'cash_buffer' => $trust_info->cash_buffer,
					'cash_buffer_percentage' => $trust_info->cash_buffer_percentage,
					'platform_fee_percentage' => $trust_info->platform_fee_percentage,
					//'dtstamp' => $property_info->added_at,
					'property_years' => $property_info->years,
					'nav' => $nav->nav,
					'tax' => $trust_info->tax,
					'tax_percentage_use' => $trust_info->tax_percentage_use,
					'strata_fee' => $property_info->strata_fee,
					'listed_at' => $property_info->listed_at,
					'listing_id' => $property_info->listing_id,
					'lat' => $property_info->lat,
					'lng' => $property_info->lng,
					'postalcode' => $property_info->postalcode,
					'setup_cost' => $trust_info->setup_cost,
					'setup_cost_percentage' => $trust_info->setup_cost_percentage,
					'trust_id' => $trust_info->trust_id,
					'cash_account' => $cash_account,
					'rental' => $trust_info->rental,
					'is_locked' => $property_info->is_fulfilled,
					'rental_collections' => $this->Property_model->get_rental_collecttion($property_id)
				];
				//$data['images'] = (array)json_decode($images);

			}

		}
		
		$this->load->view('admin/property-form-tpl', $data);
	}

	public function expense_income($trust_id){

		if($this->input->server('REQUEST_METHOD') == 'POST'){

			$post = $this->input->post();

			$type = $post['modal_cash_type'] == 'expense' ? $this->config->item('property_expense') : $this->config->item('property_income');

			$data = [
				"trust_id" => $trust_id,
				"amount" => $this->clean_commas($post['amount']),
				"type" => $type,
				"description" => $post['description'],
				"added_at" => $post['date']
			];

			$this->Trust_model->add_trust_cash_account($data);
			$this->session->set_flashdata("cash_account_updated", "Cash Account updated");
			redirect("admin/property/form/".$post['property_id']);
		}

	}


	public function product_image_pupload()
	{
		$data['file_name'] = false;
		$data['error'] = false;

		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']   = config_item('size_limit');
		$config['upload_path'] = 'uploads/images/full';
		$config['encrypt_name'] = true;
		$config['remove_spaces'] = true;

		$this->load->library('upload', $config);


		if ($this->upload->do_upload('file')) {

			$upload_data = $this->upload->data();
			$this->load->library('image_lib');

			//big
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/full/' . $upload_data['file_name'];
			$config['new_image'] = 'uploads/images/big/' . $upload_data['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 1000;
			$config['height'] = 1333;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();

			//medium
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/big/' . $upload_data['file_name'];
			$config['new_image'] = 'uploads/images/medium/' . $upload_data['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 480;
			$config['height'] = 640;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();

			//small image
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/medium/' . $upload_data['file_name'];
			$config['new_image'] = 'uploads/images/small/' . $upload_data['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 255;
			$config['height'] = 340;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();

			//cropped thumbnail
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/small/' . $upload_data['file_name'];
			$config['new_image'] = 'uploads/images/thumbnails/' . $upload_data['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 190;
			$config['height'] = 253;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();

			$data['file_name'] = $upload_data['file_name'];
			$data['response'] = $upload_data;

			$data['id'] = $upload_data['raw_name'];
			$data['filename'] = $upload_data['file_name'];
			$data['alt'] = '';
			$data['caption'] = '';
			$data['chk'] = '';
			$data['is_360'] = '';

			//$filename = base_url("uploads/images/thumbnails") . '/' . $data['filename'];
			$filename = $data['filename'];

			//$res = $this->partial('admin/product-image', $data, true);
			//$response['response'] = $res;

			$response['result'] = 'OK';
			$response['id'] = $data['id'];
			$response['template'] = '<tr>
				<td>
					<input type="hidden" name="images[' . $data['id'] . '][filename]" value="' . $filename . '"/>
					<input type="hidden" name="images[' . $data['id'] . '][is_new]" value="' . $data['id'] . '"/>
					<input type="hidden" name="images[' . $data['id'] . '][image_id]" value="' . $data['id'] . '"/>
					<img class="gc_thumbnail" src="'. base_url("uploads/images/thumbnails") . '/' . $filename .'" style="padding:5px; border:1px solid #ddd"/>
				</td>
				<td>
					<input name="images['. $data['id'].'][caption]" value="'. $data['caption'].'" class="form-control" placeholder="'. $data['caption'].'"/>
				</td>
				<td>
					<input name="images[' . $data['id'] . '][alt]" value="' . $data['alt'] . '" class="form-control" placeholder="' . $data['alt'] . '"/>
				</td>
				<td>
					<input type="text" class="form-control" name="images[' . $data['id'] . '][sort_order]" value="1">
				</td>
				<td class="text-center">
					<label><input type="radio" name="primary_image" value="' . $data['id'] . '" '.$data['chk'].'/> </label>
				</td>
				<td class="text-center">
					<label><input type="checkbox" name="is_360[]" value="' . $data['id'] . '" '.$data['is_360'].'/> </label>
				</td>
				<td class="text-center">
					<label><input type="text" name="images['. $data['id'].'][link]" disabled/> </label>
				</td>
				<td class="text-center">
					<a href="javascript:;" class="btn btn-default btn-sm" onclick="return remove_image($(this));" rel="' . $data['id'] . '" >
						<i class="fa fa-times"></i> Remove </a>
				</td>
			</tr>';
		}


		if ($this->upload->display_errors() != '') {
			$response['error'] = $this->upload->display_errors();
			//$response['response'] = '';

			$response['result'] = null;
			$response['template'] = null;
			$response['id'] = '0';
			$response['test'] = $upload_data;
		}

		//$this->upload->output()->set_content_type('application/json')->set_output(json_encode($upload_data));
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function ajax($section){

		if(!$this->input->is_ajax_request()){
			redirect('admin');
		}

		switch ($section) {
			case 'get_all_properties':
				$this->get_all_properties();			
				break;
			case 'get_property_valuation':
				$this->get_property_valuation();
				break;
			case 'property_delete':
				$this->property_delete();
				break;
			case 'get_property_investments':
				$this->get_property_investments($this->input->post('property_id'));
				break;
			case 'transation_records':
				$this->transation_records($this->input->post('trust_id'));
				break;
			case 'get_property_distribution':
				$this->get_property_distribution();
				break;
			case 'get_distribution_table':
				$this->get_distribution_table();
				break;
			case 'insert_rental_collections':
				$this->insert_rental_collections();
				break;
			case 'get_rental_collections':
				$this->get_rental_collections();
				break;
		}
	}
	public function get_rental_collections(){


		// $records["data"] = array();
		// $records["recordsTotal"] = 0;
		// $records["recordsFiltered"] = 0;
		// echo json_encode($records);
		// exit;

		$collections = $this->Property_model->get_collections();
		// foreach ($collections as $c) {
		// 	print_r($c)."<br>";
		// 	print_r(json_decode($c->meta));
		// }
		// exit;

		$iTotalRecords = count($collections);
		
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		
		$sEcho = intval($_REQUEST['draw']);

		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		for($i = $iDisplayStart; $i < $end; $i++) {

			$collection = $collections;
			
			$status = $collection[$i]->status == 1 ? "in_arrear" : "pending";
			$property_id = $this->Property_model->get_property($collection[$i]->property_id)->listing_id;
			$due_date = empty($collection[$i]->meta) ? "0000-00-00 00:00:00" : json_decode($collection[$i]->meta)->due_date; 
			$contract_date = empty($collection[$i]->meta) ? "0000-00-00 00:00:00" : json_decode($collection[$i]->meta)->contract_date; 
			$to_renewal = $this->dateDiff(date("Y-m-d H:i:s"), date("Y-m-d H:i:s", strtotime("+2 years", strtotime($contract_date))));
			$in_arrear = $due_date > date("Y-m-d H:i:s") ? 0 : $this->dateDiff($due_date, date("Y-m-d H:i:s"));

			// $user= $this->Users_model->get_user($distribution[$i]->investor_id);
			//$trust = $this->Property_model->get_trust_account($distribution[$i]->property_id);

			$records["data"][] = array(
				$due_date,
				$property_id,
				$collection[$i]->amount,
				$status,
				$in_arrear,
				$contract_date,
				$to_renewal,
				$status == 0 ? "<a href='javascript:void(0);' class='btn btn-default'>Receive</a>" : ""

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
	protected function insert_rental_collections()
	{
		$post = $this->input->post();

		$property_id  = $post["property_id"];
		$rental_percentage = $post["rental_percentage"];
		$rental_amount = $post["rental_amount"];
		$start_date = $post["start_date"];
		$end_date = $post["end_date"];

		if(!empty($property_id) && !empty($rental_percentage) && !empty($rental_amount) && !empty($start_date) && !empty($end_date)){
			$rental_collection = [
				"property_id" => $property_id,
				"rental_pct" => $rental_percentage,
				"rental_payment" => $this->clean_commas($rental_amount),
				"rental_contract_start_date" => date("Y-m-d H:i:s", strtotime($start_date)),
				"rental_contract_end_date"	=> date("Y-m-d H:i:s", strtotime($end_date))
			];
	
			if($this->Property_model->insert_rental_collections($rental_collection)){
				echo 1;
			}else {
				echo 0;
			}
		}else{
			echo 3;
		}
		

	}

	protected function get_distribution_table()
	{

		$distributions = $this->Property_model->get_distributions();
		$iTotalRecords = count($distributions);
		
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		
		$sEcho = intval($_REQUEST['draw']);

		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		for($i = $iDisplayStart; $i < $end; $i++) {
			$distribution = $distributions;
			
			$status = $distribution[$i]->dstatus == 1? "sent" : "pending";
			// $property = $this->Property_model->get_property($distribution[$i]->property_id);
			// $user= $this->Users_model->get_user($distribution[$i]->investor_id);
			$trust = $this->Property_model->get_trust_account($distribution[$i]->property_id);
			$records["data"][] = array(
				$distribution[$i]->property_id,
				$distribution[$i]->investor_id,
				$distribution[$i]->bank_name,
				$distribution[$i]->swift_code,
				$distribution[$i]->account_name,
				$distribution[$i]->account_no,
				number_format($distribution[$i]->amount),
				number_format($distribution[$i]->amount / $trust->price_per_unit, 4),
				$status,
				// '<a class="btn btn-default" href="'.base_url().'">Confirm</a>'
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

	protected function get_all_properties()
	{
		$records = $_REQUEST;

		if(isset($records['filter'])){
			$property_name = $records['filter']['both']['property_name'];
			$address = $records['filter']['both']['address'];
			$developer = $records['filter']['both']['developer'];
			$property_price = $records['filter']['both']['property_price'];
			$district_name = $records['filter']['both']['district_name'];
			$tags = $records['filter']['both']['tags'];
			$status = $records['filter']['both']['status'];

		}else{
			$property_name = "";
			$address = "";
			$developer = "";
			$property_description = "";
			$property_price = "";
			$district_name = "";
			$tags = "";
			$status = "";
		}

		$property_status = $status;

		$order_by = 'properties.property_id DESC';

		if(isset($records['order'])){
			if($records['order'][0]['column'] == 1){
				$order_by = 'property_name'. ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 2) {
				$order_by = 'address' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 3) {
				$order_by = 'developer' . ' ' . $records['order'][0]['dir'];
			}elseif ($records['order'][0]['column'] == 4) {
				$order_by = 'property_price' . ' ' . $records['order'][0]['dir'];
			}elseif($records['order'][0]['column'] == 5) {
				$order_by = 'district_name' . ' ' . $records['order'][0]['dir'];
			}elseif($records['order'][0]['column'] == 6) {
				$order_by = 'tags' . ' ' . $records['order'][0]['dir'];
			}elseif($records['order'][0]['column'] == 8) {
				$order_by = 'properties.status' . ' ' . $records['order'][0]['dir'];
			}
		}             

		$properties = $this->Property_model->get_all_properties($property_name, $address, $developer, $property_price, $district_name, $tags, $property_status, $order_by);

		//die('<pre>'.print_r($properties).'</pre>');
		$iTotalRecords = count($properties);
		
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		
		$sEcho = intval($_REQUEST['draw']);

		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		for($i = $iDisplayStart; $i < $end; $i++) {
			$property = $properties;

			$percentage = $this->Property_model->get_invesments_percent($property[$i]->property_id);
			$trust_id = $this->Trust_model->get_trust_account($property[$i]->property_id)->trust_id;

			$percent = !empty($percentage) ? $percentage : 0;
			// if(empty($investment_status)){
			// 	$invest_status = "Incomplete";
			// }else if($investment_status->is_fullfilled === 0){
			// 	$invest_status = "Incomplete";
			// }else if($investment_status == 1){
			// 	$invest_status = "Completed";
			// }
			// if($property[$i]->is_fulfilled == "1"){
			// 	$status = "Completed";
			// 	$button = "Available";
			// }else 
			if($property[$i]->pstatus === "1"){
				$status = "Disable";
				$button = "Available";
			}else if($property[$i]->pstatus === "0"){
				$status = "Available";
				$button = "Disable";
			}

			if($property[$i]->is_featured == 1){
				$flag = 'text-primary';
				$is_featured = "Unmark as Featured";
			}else if($property[$i]->is_featured == 0){
				$flag = '';
				$is_featured = "Mark as Featured";
			}

			$complete = "";
			if($property[$i]->is_fulfilled && empty($property[$i]->is_completed)) {
				$complete = '<option value="7">Mark as completed</option>';
			}
			
			
			$records["data"][] = array(
				'<span class="'.$flag.'">'.$property[$i]->property_name.'</span>', 
				$property[$i]->address,
				$property[$i]->developer,
				number_format($property[$i]->property_price),
				$this->Property_model->get_districts($property[$i]->property_id)->district_name,
				$property[$i]->tags,
				number_format($percent, 2)."%",
				$status,
				'
				<select id="select-action" data-id="'.$property[$i]->property_id.'">
					<option value="0">Select Action</option>
					<option value="1">Edit</option>
					<option value="2">Overview</option>
					<option value="3">'. $is_featured .'</option>
					<option value="4">Valuation</option>
					<option value="5">Distribution</option>
					<option value="6">'.$button.'</option>'
					. $complete .
					'
					<option value="9">Delete</option>
				</select>
				',
			);
			//<option value="8" data-id="'.$trust_id.'">Transaction records</option>
			// <a href="'.site_url("admin/property/form/".$property[$i]->property_id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-pencil"></i> Edit</a>
			// <a href="'.site_url("admin/property/investment/".$property[$i]->property_id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-pencil"></i> Overview</a>
			// <a href="'.site_url("admin/property/valuation/".$property[$i]->property_id).'" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-bar-chart"></i> Valuation</a>
			// <a href="'.site_url("admin/property/status/".strtolower($button)."/".$property[$i]->property_id).'" class="btn btn-sm btn-circle btn-default btn-editable">'.$button.'</a>                        
			// <a href="javascript:void(0);" class="btn btn-sm btn-circle btn-default btn-editable" onclick="deleteProperty('.$property[$i]->property_id.')">Delete</a>
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

	protected function transation_records($trust_id)
	{

		$cash_accounts = $this->Trust_model->get_trust_cash_account($trust_id);

		//die('<pre>'.print_r($properties).'</pre>');
		$iTotalRecords = count($cash_accounts);
		
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		
		$sEcho = intval($_REQUEST['draw']);

		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		for($i = $iDisplayStart; $i < $end; $i++) {
			$cash_account = $cash_accounts;
			$type = $cash_account[$i]->type == 1 ? 'Income' : 'Expense';
			$records["data"][] = array(
				date("Y-m-d", strtotime($cash_account[$i]->added_at)),
				number_format($cash_account[$i]->amount, 2 ),
				$cash_account[$i]->description,
				$type
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


	protected function get_property_valuation()
	{
		$records = $_REQUEST;

		if(isset($records['filter'])){
			$value = $records['filter']['both']['value'];
			$date = $records['filter']['both']['date'];
		}else{
			$value = "";
			$date = "";
		}

		$property_id = xss_clean($this->input->post("property_id"));

		$order_by = 'property_valuation.id DESC';   

		$valuations = $this->Property_model->get_property_valuations($property_id, false, false, $order_by);

		$iTotalRecords = count($valuations);
		
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		
		$sEcho = intval($_REQUEST['draw']);

		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		for($i = $iDisplayStart; $i < $end; $i++) {
			$valuation = $valuations;

			$records["data"][] = array(
				number_format($valuation[$i]->property_value), 
				number_format($valuation[$i]->property_value_tax),
				number_format($valuation[$i]->property_value_cash),
				number_format($valuation[$i]->setup_cost),
				number_format($valuation[$i]->nav),
				number_format($valuation[$i]->total_units),
				number_format($valuation[$i]->price_per_unit),
				$valuation[$i]->created_at,
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

	protected function get_property_distribution()
	{
		$records = $_REQUEST;

		if(isset($records['filter'])){
			$value = $records['filter']['both']['value'];
			$date = $records['filter']['both']['date'];
		}else{
			$value = "";
			$date = "";
		}

		$property_id = xss_clean($this->input->post("property_id"));

		$distributions = $this->Property_model->get_orders($property_id);

		$iTotalRecords = count($distributions);
		
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		
		$sEcho = intval($_REQUEST['draw']);

		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		for($i = $iDisplayStart; $i < $end; $i++) {
			$distribution = $distributions;

			$property = $this->Property_model->get_property($distribution[$i]->property_id);
			$user = $this->Users_model->get_user($distribution[$i]->investor_id);

			$records["data"][] = array(
				$property->property_name, 
				$user->first_name .' '.$user->last_name,
				$distribution[$i]->amount,
				mp_format($distribution[$i]->distributed_unit),
				$distribution[$i]->created_at,
				$distribution[$i]->updated_at,
				'<a class="btn btn-default" href="#">Confirm</a>'
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

	protected function get_property_investments($property_id)
	{
		
		$investments = $this->Property_model->get_invesments($property_id);
		//die('<pre>'.print_r($properties).'</pre>');
		$iTotalRecords = count($investments);
		
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		
		$sEcho = intval($_REQUEST['draw']);

		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;
		//die(print_r($investments));
		for($i = $iDisplayStart; $i < $end; $i++) {
			$investment = $investments;

			

			$investor = $this->Users_model->get_user($investment[$i]->investor_id);

			
			$records["data"][] = array(
				'<a href="'.base_url().'admin/users/portfolio/details/'.$investment[$i]->investor_id.'">'.$investor->first_name.' '.$investor->last_name.'</a>',
				number_format($investment[$i]->invested_amount, 2),
				$investment[$i]->units_invested,
				($investment[$i]->percent_invested / 100) * 100 . "%",
				$investment[$i]->created_at,
				""
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

	public function property_investment_details($property_id)
	{

		$property = $this->Property_model->get_property($property_id);

		$total_percentage = $this->Property_model->get_invesments_percent($property_id);
		$data['property_title'] = $property->property_name;
		$data['total_percentage'] = $total_percentage != null ? $total_percentage / 100 : 0;

		$this->load->view("admin/property-investment-details-tpl", $data);

	}

	protected function property_delete()
	{
		$property_id = $this->input->post('id');
		$this->Property_model->delete_property($property_id);
		$this->session->set_flashdata("property_deleted", "Property Deleted");
		echo json_encode($property_id);
	}

	public function status($type, $id)
	{
		$this->Property_model->change_status($type, $id);
		$this->session->set_flashdata('property_status', 'Property has been ' . $type);
		redirect('admin/property');
	}

	public function featured($property_id, $type)
	{	

		if($type == "mark"){
			$data['is_featured'] = 1;
		}else if($type == "unmark"){
			$data['is_featured'] = 0;
		}
		
		$data['property_id'] = $property_id;

		$property = $this->Property_model->get_property($property_id);

		$this->Property_model->update_property($data);
		$this->session->set_flashdata("message", "You {$type}ed {$property->property_name} as featured");
		redirect('admin/property');
	}

	public function delete_property_image($property_id, $image_id)
	{
		// if(!$this->input->is_ajax_request()){
		// 	redirect('admin/property');
		// }
		if($property_id == 0 || empty($image_id)){
			redirect('admin/property');
		}

		$property_image = json_decode($this->Property_model->get_property($property_id)->images);

		if(property_exists($property_image, $image_id)){
			unset($property_image->$image_id);
		}

		$property_image = json_encode($property_image);
		$data['images'] = $property_image;
		$data['property_id'] = $property_id;
		
		$this->Property_model->update_property($data);
		$this->Property_model->delete_property_image($image_id);
		
		$this->session->set_flashdata("image_deleted", "Image Deleted");

		redirect("admin/property/form/".$property_id);

	}

	public function actionCompleteProperty($id)
	{

		if($this->session->userdata()) {
			$this->Transaction_model->markCompleteProperty($id);
		}
		
		redirect('admin/property');
	}

	public function confirm_distribution($id)
	{
		$this->Property_model->confirm_distribution($id);
		$this->session->set_flashdata('distribution_success', 'Distribution success');
		redirect();
	}
	// helpers
	private function clean_commas($str)
	{
		return str_replace(',', '', $str);
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
	
	private function dateDiff($start, $end) {

		$start_ts = strtotime($start);
		
		$end_ts = strtotime($end);
		
		$diff = $end_ts - $start_ts;
		
		return round($diff / 86400);
		
	}

}