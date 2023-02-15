<?php
    class Tod_monitoring extends CI_Controller
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
                'title' => 'TOD Monitoring | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'current_month_tod'=>$this->cabang_model->tod_monitoring(null,'curr_month',false),
                'last_month_tod'=>$this->cabang_model->tod_monitoring(null,'last_month',false),
                'current_year_tod'=>$this->cabang_model->tod_monitoring(null,'curr_year',false),
                'last_year_tod'=>$this->cabang_model->tod_monitoring(null,'last_year',false),
                'count_bucket_od'=>$this->cabang_model->get_bucketod(null,'curr_month'),
                'identifier'=>'is_strategi_collection',
                'submenu_identity'=>'is_tod_monitoring',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_collection/tod_monitoring', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }
