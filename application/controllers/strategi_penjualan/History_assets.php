<?php
    class History_assets extends CI_Controller
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
                'title' => 'History Assets | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                //tipe
                'current_month_history_tipe'=>$this->cabang_model->history_assets(null,'curr_month','tipe',false),
                'last_month_history_tipe'=>$this->cabang_model->history_assets(null,'last_month','tipe',false),
                'current_year_history_tipe'=>$this->cabang_model->history_assets(null,'curr_year','tipe',false),
                'last_year_history_tipe'=>$this->cabang_model->history_assets(null,'last_year','tipe',false),
                //brand
                'current_month_history_brand'=>$this->cabang_model->history_assets(null,'curr_month','brand',false),
                'last_month_history_brand'=>$this->cabang_model->history_assets(null,'last_month','brand',false),
                'current_year_history_brand'=>$this->cabang_model->history_assets(null,'curr_year','brand',false),
                'last_year_history_brand'=>$this->cabang_model->history_assets(null,'last_year','brand',false),
                //
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_history',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/history_assets', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
