<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Performa_armo extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('serverside/strategi_collection/armo_model');
            $this->load->model('chart_filter/strategi_collection/armo_chart_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $data = [
                'title' => 'Performa Armo | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'identifier'=>'is_strategi_collection',
                'submenu_identity'=>'is_performa_armo',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_collection/performa_armo', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $filter = $this->input->post('filter');
            $subfilter = $this->input->post('subFilter');
            if($filter==''||$filter=='all'||!isset($filter)){
                $subfilter_decode = $subfilter;
            }else{
                $subfilter_decode = $this->security_idx->sodiumDecrypt($subfilter);
            }
            $list = $this->armo_model->get_datatables($filter,$subfilter_decode);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->nama_armo;
                $row[] = $field->nama_spv;
                $row[] = $field->pencapaian;
                $row[] = $field->target;
                $row[] = $field->persentasi;
                $row[] = '<button type="button" class="btn_session badge btn btn-primary me-2" onclick=window.location.href="'.base_url('performa_armo_detail').'/'.$this->security_idx->encrypt_url($field->id_armo).'";sessionStorage.setItem("is_mtd",true);><i
                class="bx bx-detail me-1"></i>Detail</button>';
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->armo_model->count_all(),
                "recordsFiltered" => $this->armo_model->count_filtered($filter,$subfilter_decode),
                "data" => $data,
            );
            echo json_encode($output);
        }
        public function double_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->armo_chart_model->armo_chart($params);
            $list_2 = $this->armo_chart_model->armo_chart($params2);
            $data_fields = array();
            $data_pencapaian = array();
            $data_target = array();
            $data_pencapaian2 = array();
            $data_target2 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->nama_armo;
                $data_target[] = $field->target;
                $data_pencapaian[] = $field->pencapaian;
            }
            foreach ($list_2 as $field) {
                $data_target2[] = $field->target;
                $data_pencapaian2[] = $field->pencapaian;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_target" => $data_target,
                "data_pencapaian" => $data_pencapaian,
                "data_target2" => $data_target2,
                "data_pencapaian2" => $data_pencapaian2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
