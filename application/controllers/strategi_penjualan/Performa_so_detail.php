<?php
    class Performa_so_detail extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->helper('url');
            $this->load->library('Security_idx');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }

        public function index()
        {
            $id_so = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_so);
            $data = [
                'title' => 'Performa SO Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_detail_month'=>$this->cabang_model->performa_so($id,'curr_month',false),
                'performa_detail_year'=>$this->cabang_model->performa_so($id,'curr_year',false),
                'graph_performa_detail_month'=>$this->cabang_model->performa_so($id,'curr_month',true),
                'graph_performa_detail_year'=>$this->cabang_model->performa_so($id,'curr_year',true),
                'graph_performa_detail_last_year'=>$this->cabang_model->performa_so($id,'last_year',true),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_performa_so',
            ];
            
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/performa_so_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
?>