<?php
    class Epd_monitoring extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
    
        public function index()
        {
            $data = [
                'title' => 'EPD Monitoring | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'monitoring_detail_month'=>$this->cabang_model->epd_monitoring('curr_month',false),
                'monitoring_detail_year'=>$this->cabang_model->epd_monitoring('curr_year',false),
                'graph_monitoring_detail_month'=>$this->cabang_model->epd_monitoring('curr_month',true),
                'graph_monitoring_detail_last_month'=>$this->cabang_model->epd_monitoring('last_month',true),
                'graph_monitoring_detail_last_year'=>$this->cabang_model->epd_monitoring('last_year',true),
                'graph_monitoring_0_month'=>$this->cabang_model->epd_monitoring('curr_month_0',true),
                'graph_monitoring_1_month'=>$this->cabang_model->epd_monitoring('curr_month_1',true),
                'identifier'=>'is_strategi_collection',
                'submenu_identity'=>'is_epd_monitoring',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_collection/epd_monitoring', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
