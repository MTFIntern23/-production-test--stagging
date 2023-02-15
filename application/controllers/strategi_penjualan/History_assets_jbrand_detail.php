<?php
    class History_assets_jbrand_detail extends CI_Controller
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
            $id_jbrand = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_jbrand);
            $data = [
                'title' => 'History Assets Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'history_assets_month'=>$this->cabang_model->history_assets($id,'curr_month','brand',false),
                'history_assets_year'=>$this->cabang_model->history_assets($id,'curr_year','brand',false),
                'graph_history_assets_month'=>$this->cabang_model->history_assets($id,'curr_month','brand',true),
                'graph_history_assets_year'=>$this->cabang_model->history_assets($id,'curr_year','brand',true),
                'graph_history_assets_last_year'=>$this->cabang_model->history_assets($id,'last_year','brand',true),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_history',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/history_assets_jbrand_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
?>