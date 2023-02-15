<?php
    class History_assets_detail extends CI_Controller
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
            $id_tipe = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_tipe);
            $data = [
                'title' => 'History Assets Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'history_assets_month'=>$this->cabang_model->history_assets($id,'curr_month','tipe',false),
                'history_assets_year'=>$this->cabang_model->history_assets($id,'curr_year','tipe',false),
                'graph_history_assets_month'=>$this->cabang_model->history_assets($id,'curr_month','tipe',true),
                'graph_history_assets_year'=>$this->cabang_model->history_assets($id,'curr_year','tipe',true),
                'graph_history_assets_last_year'=>$this->cabang_model->history_assets($id,'last_year','tipe',true),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_history',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/history_assets_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
?>