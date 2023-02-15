<?php
    class Performa_so extends CI_Controller
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
                'title' => 'Performa SO | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_month'=>$this->cabang_model->performa_so('','curr_month',false),
                'performa_last_month'=>$this->cabang_model->performa_so('','last_month',false),
                'performa_year'=>$this->cabang_model->performa_so('','curr_year',false),
                'performa_last_year'=>$this->cabang_model->performa_so('','last_year',false),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_performa_so',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/performa_so', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
?>