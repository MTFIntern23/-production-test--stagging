<?php
    class Performa_armo_detail extends CI_Controller
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
            $id_armo = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_armo);
            $data = [
                'title' => 'Performa Armo Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_detail_month'=>$this->cabang_model->performa_armo($id,'curr_month',false),
                'performa_detail_year'=>$this->cabang_model->performa_armo($id,'curr_year',false),
                'graph_performa_detail_month'=>$this->cabang_model->performa_armo($id,'curr_month',true),
                'graph_performa_detail_year'=>$this->cabang_model->performa_armo($id,'curr_year',true),
                'graph_performa_detail_last_year'=>$this->cabang_model->performa_armo($id,'last_year',true),
                'identifier'=>'is_strategi_collection',
                'submenu_identity'=>'is_performa_armo',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_collection/performa_armo_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
