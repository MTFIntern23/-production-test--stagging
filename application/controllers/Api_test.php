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
            echo urldecode('Biaya%20Tarik');
            var_dump($this->cabang_model->epd_monitoring('curr_month_0',true));
            // if($this->cabang_model->performa_lending('today')[0]==0){
            //     var_dump(0);
            // }else{
            //     $_percentage_ = (($this->cabang_model->performa_lending('today')[0]-$this->cabang_model->performa_lending('today')[1])*100/$$this->cabang_model->performa_lending('today')[0]);
            //     if($_percentage_>0){
            //         var_dump($_percentage_);
            //     }else{
            //         var_dump(0);
            //     }
            // }
        }
    }

