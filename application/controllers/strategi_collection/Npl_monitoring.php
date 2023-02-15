<?php
    class Npl_monitoring extends CI_Controller
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
                'title' => 'NPL Monitoring | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_month'=>$this->cabang_model->npl_monitoring('curr_month'),
                'performa_year'=>$this->cabang_model->npl_monitoring('curr_year'),
                'performa_last_year'=>$this->cabang_model->npl_monitoring('last_year'),
                'identifier'=>'is_strategi_collection',
                'submenu_identity'=>'is_npl_monitoring',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_collection/npl_monitoring', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
