<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Lending extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('serverside/strategi_penjualan/lending_model');
            $this->load->model('chart_filter/strategi_penjualan/lending_chart_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $data = [
                'title' => 'Lending | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_lending_cabang',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/lending', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $list = $this->lending_model->get_datatables($params);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->periode;
                $row[] = $field->komitment;
                $row[] = $field->target;
                $row[] = $field->aktual;
                $row[] = $field->achv;
                $row[] = $field->gap;
                $row[] = $field->app_in;
                $row[] = $field->approved;
                $row[] = $field->purchase_order;
                $row[] = $field->golive;
                $row[] = $field->actpo;
                $row[] = $field->actpoapp;
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->lending_model->count_all(),
                "recordsFiltered" => $this->lending_model->count_filtered($params),
                "data" => $data,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $list = $this->lending_chart_model->lending_chart($params);
            $data_fields = array();
            $data_aktual = array();
            $data_target = array();
            $data_komitment = array();
            foreach ($list as $field) {
                $data_fields[] = $field->periode;
                $data_aktual[] = $field->aktual;
                $data_target[] = $field->target;
                $data_komitment[] = $field->komitment;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_aktual" =>$data_aktual,
                "data_target" => $data_target,
                "data_komitment" => $data_komitment,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function double_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->lending_chart_model->lending_chart($params);
            $list_2 = $this->lending_chart_model->lending_chart($params2);
            $data_fields = array();
            $data_aktual = array();
            $data_aktual2 = array();
            $data_target = array();
            $data_komitment = array();
            foreach ($list as $field) {
                $data_fields[] = $field->month;
                $data_aktual[] = $field->ytd_aktual;
                $data_target[] = $field->ytd_target;
                $data_komitment[] = $field->ytd_komitment;
            }
            foreach ($list_2 as $field) {
                $data_aktual2[] = $field->ytd_aktual;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_aktual" =>$data_aktual,
                "data_aktual2" =>$data_aktual2,
                "data_target" => $data_target,
                "data_komitment" => $data_komitment,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
?>