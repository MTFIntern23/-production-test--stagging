<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Npl_monitoring extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('chart_filter/strategi_collection/npl_monitoring_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $data = [
                'title' => 'NPL Monitoring | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'identifier'=>'is_strategi_collection',
                'submenu_identity'=>'is_npl_monitoring',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_collection/npl_monitoring', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function double_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $params3 = $this->input->post('params3');
            $list = $this->npl_monitoring_model->npl_monitoring($params);
            $list_2 = $this->npl_monitoring_model->npl_monitoring($params2);
            $list_3 = $this->npl_monitoring_model->npl_monitoring($params3);
            $data_fields = array();
            $data_fields2 = array();
            $data_persentasi = array();
            $data_persentasi2 = array();
            $data_persentasi3 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->month;
                $data_persentasi[] = $field->ytd_persentasi;
            }
            foreach ($list_2 as $field) {
                $data_fields2[] = $field->month;
                $data_persentasi2[] = $field->ytd_persentasi;
            }
            foreach ($list_3 as $field) {
                $data_persentasi3[] = $field->ytd_persentasi;
            }
            $output = array(
                "data_fields" =>$data_fields,
                "data_persentasi" =>$data_persentasi,
                "data_fields2" =>$data_fields2,
                "data_persentasi2" =>$data_persentasi2,
                "data_persentasi3" =>$data_persentasi3,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
