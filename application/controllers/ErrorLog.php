<?php

    class ErrorLog extends CI_Controller{

        public function __construct()
        {
            $this->load->model('Error_log_model');
        }

        public function save_error_logs()
        { 

            $data = [
                "message" => "",		
                "counter" => "",	
                "is_sent" =>
                "environment" => "",	
                "route_name" => "",	
                "route_action" => "",		
                "request_uri" => "",
                "request_method" => "",
                "response_code" => "",	
                "request_input" => "",	
                "auth_user" => "",	
                "sent_at" => "",	
                "timestamp" => "",	
                "stacktrace" => "",	
            ];

            $this->Error_log_model->insert_error_logs($data);

        }

        
    }