<?php
    class Performa_produk_detail extends CI_Controller
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
            $id_product = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_product);
            $data = [
                'title' => 'Performa Produk Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_product_month'=>$this->cabang_model->performa_product($id,'curr_month',false),
                'performa_product_year'=>$this->cabang_model->performa_product($id,'curr_year',false),
                'graph_performa_product_month'=>$this->cabang_model->performa_product($id,'curr_month',true),
                'graph_performa_product_year'=>$this->cabang_model->performa_product($id,'curr_year',true),
                'graph_performa_product_last_year'=>$this->cabang_model->performa_product($id,'last_year',true),
                'count_produk_mtd'=>$this->cabang_model->get_product($id,'curr_month'),
                'count_produk_ytd'=>$this->cabang_model->get_product($id,'curr_year'),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_performa_produk',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/performa_produk_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
?>