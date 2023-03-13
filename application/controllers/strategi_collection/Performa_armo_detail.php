<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Performa_armo_detail extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('serverside/strategi_collection/armo_detail_model');
            $this->load->model('chart_filter/strategi_collection/armo_detail_chart_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $id_armo = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_armo);
            $data = [
                'title' => 'Performa Armo Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_detail_month'=>$this->cabang_model->performa_armo($id,'curr_month',false),
                'identifier'=>'is_strategi_collection',
                'submenu_identity'=>'is_performa_armo',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_collection/performa_armo_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $id = $this->input->post('id_armo');
            $params = $this->input->post('params');
            $list = $this->armo_detail_model->get_datatables($id,$params);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->no_aplikasi;
                $row[] = $field->nama_cust;
                $row[] = $field->lending_amt;
                $row[] = $field->tgl_appin;
                $row[] = $field->tgl_golive;
                $row[] = $field->nama_so;
                $row[] = $field->od;
                $row[] = $field->osp;
                $row[] = $field->instalment_amt;
                $row[] = $field->instalment_number;
                $row[] = $field->tenor;
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->armo_detail_model->count_all(),
                "recordsFiltered" => $this->armo_detail_model->count_filtered($id,$params),
                "data" => $data,
            );
            echo json_encode($output);
        }
        public function chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id_armo = $this->input->post('id_armo');
            $list = $this->armo_detail_chart_model->armo_detail_chart($id_armo,'curr_month');
            $data_fields = array();
            $data_lending = array();
            foreach ($list as $field) {
                $data_fields[] = $field->tgl_golive;
                $data_lending[] = $field->mtd_lending_amt;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_lending" => $data_lending,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function double_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id_armo = $this->input->post('id_armo');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->armo_detail_chart_model->armo_detail_chart($id_armo,$params);
            $list_2 = $this->armo_detail_chart_model->armo_detail_chart($id_armo,$params2);
            $data_fields = array();
            $data_lending = array();
            $data_lending2 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->month;
                $data_lending[] = $field->mtd_lending_amt;
            }
            foreach ($list_2 as $field) {
                $data_lending2[] = $field->mtd_lending_amt;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_lending" => $data_lending,
                "data_lending2" => $data_lending2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
