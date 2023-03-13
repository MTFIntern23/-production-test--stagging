<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Performa_profit_detail extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('serverside/profit_detail_model');
            $this->load->model('chart_filter/profit_chart_detail_model');
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
                'identifier'=>'is_profit_cabang',
                'submenu_identity'=>'',
            ];
            
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/performa_profit_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('id_komponen');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->profit_detail_model->get_datatables($id,$params);
            $list2 = $this->profit_detail_model->get_datatables($id,$params2);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $key=>$field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->month;
                $row[] = $field->profit;
                $row[] = $list2[$key]->profit;
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->profit_detail_model->count_all(),
                "recordsFiltered" => $this->profit_detail_model->count_filtered($id,$params),
                "data" => $data,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function double_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('id_komponen');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->profit_chart_detail_model->profit_detail_chart($id,$params);
            $list_2 = $this->profit_chart_detail_model->profit_detail_chart($id,$params2);
            $data_fields = array();
            $data_profit = array();
            $data_profit2 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->month;
                $data_profit[] = $field->profit;
            }
            foreach ($list_2 as $field) {
                $data_profit2[] = $field->profit;
            }
            $output = array(
                "data_fields" =>$data_fields,
                "data_profit" =>$data_profit,
                "data_profit2" =>$data_profit2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
?>