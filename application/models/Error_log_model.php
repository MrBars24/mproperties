<?php

    class Error_log_model extends CI_Controller{

        public function __construct()
        {                
            parent::__construct();
        }

        public function insert_error_logs($data)
        {
            return $this->db->insert('error_log', $data);
        }


    }