<?php
    class Customer_retention extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->library('Security_idx');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
    
        public function index()
        {
            $data = [
                'title' => 'Customer Retention | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'cust_retention_month'=>$this->cabang_model->cust_retention('curr_month',false,''),
                'cust_retention_year'=>$this->cabang_model->cust_retention('curr_year',false,''),
                'graph_cust_retention_month'=>$this->cabang_model->cust_retention('curr_month',true,'1'),
                'graph_cust_retention_month_0'=>$this->cabang_model->cust_retention('curr_month',true,'0'),
                'graph_cust_retention_year'=>$this->cabang_model->cust_retention('curr_year',true,'1'),
                'graph_cust_retention_year_0'=>$this->cabang_model->cust_retention('curr_year',true,'0'),
                'graph_cust_retention_last_year'=>$this->cabang_model->cust_retention('last_year',true,'1'),
                'graph_cust_retention_last_year_0'=>$this->cabang_model->cust_retention('last_year',true,'0'),
                'get_ro_mtd'=>$this->cabang_model->get_ro('curr_month'),
                'get_ro_ytd'=>$this->cabang_model->get_ro('curr_year'),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_customer_retention',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/customer_retention', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
