<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
    var $use_template = '';
    var $use_template_file = '';
    var $template_data = array();
	var $CI;

	function __construct(){
		$this->CI =& get_instance();
		$default_title = "SAMPLE APP";
	}

	function set_title($title){
		if($title){
			$this->template_data['title'] = $title;
		}else{
			$this->template_data['title'] = $default_title;
		}
	}

	function set_additional_css($css_set){
        $this->template_data['additional_css'] = $css_set;
    }

    function set_additional_js($js_set){
        $this->template_data['add_js'] = $js_set;
    }

	function append_css($css){
		if(is_array($css)){
			foreach($css as $c){
				array_push($this->template_data['additional_css'],$c);
			}
		}else{
			array_push($this->template_data['additional_css'],$css);
		}

	}

	function append_js($js){
		if(is_array($js)){
			foreach($js as $j){
				array_push($this->template_data['add_js'],$j);
			}
		}else{
			array_push($this->template_data['add_js'],$js);
		}
	}

    public function set_template($name,$file="main"){
        $this->use_template = $name;
        $this->use_template_file = $file;
    }

    public function load_sub($key,$value){
        if(is_array($key)){
            $this->template_data = $key;
        }else{
            $this->template_data[$key] = $value;
        }
    }
    
	public function set_subview($key, $value){
		if(empty($value)){
			$this->template_data[$key] = "";
		}else{
			$this->template_data[$key] = $this->CI->load->view($value,$this->template_data,true);
		}
	}


    public function load($path,$from_db=false){
    	if($from_db){
    		$this->CI->load->helper("file");
    		write_file("application/views/qazwsx.php",$path);
    		$content = $this->CI->load->view("qazwsx",$this->template_data,true);

    		$this->template_data["content"] = $content;
    	}else{
	        $content = $this->CI->load->view($path,$this->template_data,true);
	        $this->template_data["content"] = $content;
    	}

    	$template_path = $this->use_template . "/" . $this->use_template_file;
        $this->CI->load->view("templates/".$template_path,$this->template_data);
    }

	public function extra_js($extra_js){
		$this->template_data['extra_js']  = $extra_js;
	}
}
?>