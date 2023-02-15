<?php
    class Performa_dealer extends CI_Controller
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
                'title' => 'Performa Dealer | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'current_month_dealer'=>$this->cabang_model->performa_dealer(null,'curr_month',false),
                'last_month_dealer'=>$this->cabang_model->performa_dealer(null,'last_month',false),
                'current_year_dealer'=>$this->cabang_model->performa_dealer(null,'curr_year',false),
                'last_year_dealer'=>$this->cabang_model->performa_dealer(null,'last_year',false),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_performa_dealer',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/performa_dealer', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
