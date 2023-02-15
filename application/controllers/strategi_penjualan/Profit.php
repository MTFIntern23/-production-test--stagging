<?php
    class Profit extends CI_Controller
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
            $data = [
                'title' => 'Profit | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'current_month_profit'=>$this->cabang_model->profit_cabang('','curr_month'),
                'last_month_profit'=>$this->cabang_model->profit_cabang('','last_month'),
                'current_year_profit'=>$this->cabang_model->profit_cabang('','curr_year_val_2'),
                'last_year_profit'=>$this->cabang_model->profit_cabang('','last_year_val_2'),
                //nii
                'nii_current_month_profit'=>$this->cabang_model->profit_cabang('1','curr_month'),
                'nii_last_month_profit'=>$this->cabang_model->profit_cabang('1','last_month'),
                'nii_current_year_profit'=>$this->cabang_model->profit_cabang('1','curr_year_val'),
                'nii_last_year_profit'=>$this->cabang_model->profit_cabang('1','last_year_val'),
                //feebased
                'feebased_current_month_profit'=>$this->cabang_model->profit_cabang('2','curr_month'),
                'feebased_last_month_profit'=>$this->cabang_model->profit_cabang('2','last_month'),
                'feebased_current_year_profit'=>$this->cabang_model->profit_cabang('2','curr_year_val'),
                'feebased_last_year_profit'=>$this->cabang_model->profit_cabang('2','last_year_val'),
                //coc
                'coc_current_month_profit'=>$this->cabang_model->profit_cabang('3','curr_month'),
                'coc_last_month_profit'=>$this->cabang_model->profit_cabang('3','last_month'),
                'coc_current_year_profit'=>$this->cabang_model->profit_cabang('3','curr_year_val'),
                'coc_last_year_profit'=>$this->cabang_model->profit_cabang('3','last_year_val'),
                //exp
                'exp_current_month_profit'=>$this->cabang_model->profit_cabang('4','curr_month'),
                'exp_last_month_profit'=>$this->cabang_model->profit_cabang('4','last_month'),
                'exp_current_year_profit'=>$this->cabang_model->profit_cabang('4','curr_year_val'),
                'exp_last_year_profit'=>$this->cabang_model->profit_cabang('4','last_year_val'),
                'identifier'=>'is_profit_cabang',
                'submenu_identity'=>'',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/profit', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
?> 