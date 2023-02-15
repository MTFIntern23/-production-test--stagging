<?php
    class Performa_armo extends CI_Controller
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
                'title' => 'Performa Armo | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_month'=>$this->cabang_model->performa_armo('','curr_month',false),
                'performa_last_month'=>$this->cabang_model->performa_armo('','last_month',false),
                'performa_year'=>$this->cabang_model->performa_armo('','curr_year',false),
                'performa_last_year'=>$this->cabang_model->performa_armo('','last_year',false),
                'identifier'=>'is_strategi_collection',
                'submenu_identity'=>'is_performa_armo',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_collection/performa_armo', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
