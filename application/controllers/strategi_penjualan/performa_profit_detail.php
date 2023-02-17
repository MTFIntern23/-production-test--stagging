<?php
    class Performa_profit_detail extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->helper('url');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }

        public function index()
        {
            $id_profit = urldecode($this->uri->segment(2));
            $id = $this->security_idx->decrypt_url($id_profit);
            $data = [
                'title' => 'Performa Profit Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'current_month_detail_profit'=>$this->cabang_model->profit_cabang($id,'curr_month'),
                'last_month_detail_profit'=>$this->cabang_model->profit_cabang($id,'last_month'),
                'current_year_detail_profit'=>$this->cabang_model->profit_cabang($id,'curr_year_val'),
                'last_year_detail_profit'=>$this->cabang_model->profit_cabang($id,'last_year_val'),
                'identifier'=>'is_profit_cabang',
                'submenu_identity'=>'',
            ];
            
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/performa_profit_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
?>