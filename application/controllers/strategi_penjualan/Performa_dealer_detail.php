<?php
    class Performa_dealer_detail extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->library('Security_idx');
            $this->load->helper('url');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }

        public function index()
        {
            $id_dealer = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_dealer);
            $data = [
                'title' => 'Performa Dealer Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_detail_month'=>$this->cabang_model->performa_dealer($id,'curr_month',false),
                'performa_detail_year'=>$this->cabang_model->performa_dealer($id,'curr_year',false),
                'graph_performa_detail_month'=>$this->cabang_model->performa_dealer($id,'curr_month',true),
                'graph_performa_detail_year'=>$this->cabang_model->performa_dealer($id,'curr_year',true),
                'graph_performa_detail_last_year'=>$this->cabang_model->performa_dealer($id,'last_year',true),
                'get_brand_mtd'=>$this->cabang_model->get_brand($id,'curr_month'),
                'get_brand_ytd'=>$this->cabang_model->get_brand($id,'curr_year'),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_performa_dealer',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/performa_dealer_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
