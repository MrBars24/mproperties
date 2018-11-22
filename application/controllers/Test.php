<?php
class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaction_model');
        $this->load->model('Users_model');

    }

    public function mail()
    {
        $em = $_GET['email'];
        $this->load->library('email');

        $this->email->from('no-reply@mymicroproperties.com', 'TESTER01');
        $this->email->to($em);

        $this->email->subject('Email Testing');
        $this->email->message('Testing the email class.');

        var_dump($this->email->send());
    }

    public function print_model($model_name, $fn)
    {
        var_dump($this->$model_name->$fn());
    }


    public function test()
    {
        $data = [];
        $this->load->view('test-tpl', $data);

    }

    public function add_district()
    {
        // $data = [
        //     ["district_number"=>"01", "district_name" =>	"Raffles Place, Cecil, Marina, People's Park"],
        //     ["district_number"=>"02", "district_name" =>	"Anson, Tanjong Pagar"],
        //     ["district_number"=>"03", "district_name" =>	"Queenstown, Tiong Bahru"],
        //     ["district_number"=>"04", "district_name" =>	"Telok Blangah, Harbourfront"],
        //     ["district_number"=>"05", "district_name" =>	"Pasir Panjang, Hong Leong Garden, Clementi New Town"],
        //     ["district_number"=>"06", "district_name" => "High Street, Beach Road (part)"],
        //     ["district_number"=>"07", "district_name" =>	"Middle Road, Golden Mile"],
        //     ["district_number"=>"08", "district_name" =>	"Little India"],
        //     ["district_number"=>"09", "district_name" =>	"Orchard, Cairnhill, River Valley"],
        //     ["district_number"=>"10", "district_name" =>	"Ardmore, Bukit Timah, Holland Road, Tanglin"],
        //     ["district_number"=>"11", "district_name" =>	"Watten Estate, Novena, Thomson"],
        //     ["district_number"=>"12", "district_name" =>	"Balestier, Toa Payoh, Serangoon"],
        //     ["district_number"=>"13", "district_name" =>	"Macpherson, Braddell"],
        //     ["district_number"=>"14", "district_name" =>	"Geylang, Eunos"],
        //     ["district_number"=>"15", "district_name" =>	"Katong, Joo Chiat, Amber Road"],
        //     ["district_number"=>"16", "district_name" =>	"Bedok, Upper East Coast, Eastwood, Kew Drive"],
        //     ["district_number"=>"17", "district_name" =>	"Loyang, Changi"],
        //     ["district_number"=>"18", "district_name" =>	"Tampines, Pasir Ris"],
        //     ["district_number"=>"19", "district_name" =>	"Serangoon Garden, Hougang, Ponggol"],
        //     ["district_number"=>"20", "district_name" =>	"Bishan, Ang Mo Kio"],
        //     ["district_number"=>"21", "district_name" =>	"Upper Bukit Timah, Clementi Park, Ulu Pandan"],
        //     ["district_number"=>"22", "district_name" =>	"Jurong"],
        //     ["district_number"=>"23", "district_name" =>	"Hillview, Dairy Farm, Bukit Panjang, Choa Chu Kang"],
        //     ["district_number"=>"24", "district_name" =>	"Lim Chu Kang, Tengah"],
        //     ["district_number"=>"25", "district_name" =>	"Kranji, Woodgrove"],
        //     ["district_number"=>"26", "district_name" =>	"Upper Thomson, Springleaf"],
        //     ["district_number"=>"27", "district_name" =>	"Yishun, Sembawang"],
        //     ["district_number"=>"28", "district_name" =>	"Seletar"],
        // ];

        // foreach($data as $d){
        //     $this->db->insert('districts', $d);
        // }
    
    }

    public function print_now()
    {
        $date = $this->config->item('system_date');
        print_r($date . date(' H:i:s'));
    }

    public function log_number()
    {
        $num = $_GET['num'];
        var_dump(strrpos(floatval($num), '.'));
    }

    public function subscribe(){
        $data = [
            "emails" => $this->input->post('email')
        ];
        $this->Users_model->insert_subscriber($data);
        //$this->session->set_flashdata("subscribe", "Thank you for RSVP to our soft launch event. <br/> We are looking forward to a great time!");
        redirect($_SERVER["HTTP_REFERER"]);
    }

	public function live($status)
    {
        $this->load->driver('cache');
        $this->cache->file->save('sconfig', ['is_live' => $status] , 100000);
    }

}