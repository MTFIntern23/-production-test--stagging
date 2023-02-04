<?php
    class Api_test extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
        }
        public function index()
        {
            echo "test";
            var_dump($this->cabang_model->performa_lending('last_year')); 
        }
    }

