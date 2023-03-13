<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Tod_monitoring extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('serverside/strategi_collection/tod_monitoring_1_model');
            $this->load->model('chart_filter/strategi_collection/Tod_monitoring_chart_model');
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
                'identifier'=>'is_strategi_collection',
                'submenu_identity'=>'is_tod_monitoring',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_collection/tod_monitoring', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $list = $this->tod_monitoring_1_model->get_datatables($params);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->bucket_od;
                $row[] = $field->osp_all;
                $row[] = $field->osp_restru;
                $row[] = $field->osp_normal;
                $row[] = $field->ratio_all;
                $row[] = $field->ratio_restru;
                $row[] = $field->ratio_normal;
                if($params=='curr_month'){
                    $row[] = '<button type="button" class="btn_session badge btn btn-primary me-2" onclick=window.location.href="'.base_url('tod_monitoring_detail').'/'.$this->security_idx->encrypt_url($field->bucket_od).'";sessionStorage.setItem("is_mtd",true);><i
                    class="bx bx-detail me-1"></i>Detail</button>';
                }else{
                    $row[] = '<button type="button" class="btn_session badge btn btn-primary me-2" onclick=window.location.href="'.base_url('tod_monitoring_detail').'/'.$this->security_idx->encrypt_url($field->bucket_od).'";sessionStorage.setItem("is_mtd",false);><i
                    class="bx bx-detail me-1"></i>Detail</button>';
                }
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->tod_monitoring_1_model->count_all(),
                "recordsFiltered" => $this->tod_monitoring_1_model->count_filtered($params),
                "data" => $data,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function double_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->Tod_monitoring_chart_model->tod_monitoring_chart($params);
            $list_2 = $this->Tod_monitoring_chart_model->tod_monitoring_chart($params2);
            $data_fields = array();
            $data_lending = array();
            $data_lending2 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->bucket_od;
                $data_lending[] = $field->osp_all;
            }
            foreach ($list_2 as $field) {
                $data_lending2[] = $field->osp_all;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_lending" => $data_lending,
                "data_lending2" => $data_lending2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function pie_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $list = $this->Tod_monitoring_chart_model->get_bucketod();
            $data_fields = array();
            $data_total = array();
            foreach ($list as $field) {
                $data_fields[] = $field->bucket_od;
                $data_total[] = $field->jml_bucket;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_total" => $data_total,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
