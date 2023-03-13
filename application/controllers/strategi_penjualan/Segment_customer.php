<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Segment_customer extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('dropdown_model');
            $this->load->model('serverside/strategi_penjualan/customer_segment_model');
            $this->load->model('chart_filter/strategi_penjualan/customer_segment_chart_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $data = [
                'title' => 'Segment Customer | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_segment_customer',
                //dropdowns
                'subfilter_gp'=>$this->dropdown_model->subFilters('group_product'),
                'subfilter_jenis_assets'=>$this->dropdown_model->subFilters('status_asset'),
                'subfilter_so'=>$this->dropdown_model->subFilters('so'),
                'subfilter_jenis_ro'=>$this->dropdown_model->subFilters('status_ro'),
                'subfilter_dealer'=>$this->dropdown_model->subFilters('dealer'),
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/segment_customer', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params_tipe = $this->input->post('tipe');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->customer_segment_model->get_datatables($params,$params_tipe);
            $list2 = $this->customer_segment_model->get_datatables($params2,$params_tipe);
            $data = array();
            $no = $_POST['start'];
            if($params_tipe=='pekerjaan'){
                foreach ($list as $key=>$field) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $field->profesi_cust;
                    $row[] = $list2[$key]->mtd_amt;
                    $row[] = $field->mtd_amt;
                    $row[] = $list2[$key]->mtd_unit;
                    $row[] = $field->mtd_unit;
                    $data[] = $row;
                }
            }else if($params_tipe=='pendidikan'){
                foreach ($list as $key=>$field) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $field->pendidikan_cust;
                    $row[] = $list2[$key]->mtd_amt;
                    $row[] = $field->mtd_amt;
                    $row[] = $list2[$key]->mtd_unit;
                    $row[] = $field->mtd_unit;
                    $data[] = $row;
                }
            }else if($params_tipe=='kecamatan'){
                foreach ($list as $key=>$field) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $field->kecamatan_cust;
                    $row[] = $list2[$key]->mtd_amt;
                    $row[] = $field->mtd_amt;
                    $row[] = $list2[$key]->mtd_unit;
                    $row[] = $field->mtd_unit;
                    $data[] = $row;
                }
            }else if($params_tipe=='gaji'){
                foreach ($list as $key=>$field) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $field->gaji_cust;
                    $row[] = $list2[$key]->mtd_amt;
                    $row[] = $field->mtd_amt;
                    $row[] = $list2[$key]->mtd_unit;
                    $row[] = $field->mtd_unit;
                    $data[] = $row;
                }
            }else if($params_tipe=='umur'){
                foreach ($list as $key=>$field) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $field->umur_cust;
                    $row[] = $list2[$key]->mtd_amt;
                    $row[] = $field->mtd_amt;
                    $row[] = $list2[$key]->mtd_unit;
                    $row[] = $field->mtd_unit;
                    $data[] = $row;
                }
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->customer_segment_model->count_all(),
                "recordsFiltered" => $this->customer_segment_model->count_filtered($params,$params_tipe),
                "data" => $data,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function double_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params_tipe = $this->input->post('tipe');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->customer_segment_chart_model->customer_segment_chart($params,$params_tipe);
            $list_2 = $this->customer_segment_chart_model->customer_segment_chart($params2,$params_tipe);
            $data_lending = array();
            $data_tipe = array();
            $data_lending2 = array();
            if ($params_tipe=='pekerjaan') {
                foreach ($list as $field) {
                    $data_tipe[] = $field->profesi_cust;
                    $data_lending[] = $field->mtd_amt;
                }
                foreach ($list_2 as $field) {
                    $data_lending2[] = $field->mtd_amt;
                }
            }else if($params_tipe=='pendidikan'){
                foreach ($list as $field) {
                    $data_tipe[] = $field->pendidikan_cust;
                    $data_lending[] = $field->mtd_amt;
                }
                foreach ($list_2 as $field) {
                    $data_lending2[] = $field->mtd_amt;
                }
            }else if($params_tipe=='kecamatan'){
                foreach ($list as $field) {
                    $data_tipe[] = $field->kecamatan_cust;
                    $data_lending[] = $field->mtd_amt;
                }
                foreach ($list_2 as $field) {
                    $data_lending2[] = $field->mtd_amt;
                }
            }else if($params_tipe=='gaji'){
                foreach ($list as $field) {
                    $data_tipe[] = $field->gaji_cust;
                    $data_lending[] = $field->mtd_amt;
                }
                foreach ($list_2 as $field) {
                    $data_lending2[] = $field->mtd_amt;
                }
            }else if($params_tipe=='umur'){
                foreach ($list as $field) {
                    $data_tipe[] = $field->umur_cust;
                    $data_lending[] = $field->mtd_amt;
                }
                foreach ($list_2 as $field) {
                    $data_lending2[] = $field->mtd_amt;
                }
            }
            $output = array(
                "data_tipe" =>$data_tipe,
                "data_lending" =>$data_lending,
                "data_lending2" =>$data_lending2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function pie_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params_tipe = $this->input->post('tipe');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->customer_segment_chart_model->customer_segment_chart($params,$params_tipe);
            $list_2 = $this->customer_segment_chart_model->customer_segment_chart($params2,$params_tipe);
            $data_total = array();
            $data_tipe = array();
            $data_total2 = array();
            if ($params_tipe=='pekerjaan') {
                foreach ($list as $field) {
                    $data_tipe[] = $field->profesi_cust;
                    $data_total[] = $field->total;
                }
                foreach ($list_2 as $field) {
                    $data_total2[] = $field->total;
                }
            }else if($params_tipe=='pendidikan'){
                foreach ($list as $field) {
                    $data_tipe[] = $field->pendidikan_cust;
                    $data_total[] = $field->total;
                }
                foreach ($list_2 as $field) {
                    $data_total2[] = $field->total;
                }
            }else if($params_tipe=='kecamatan'){
                foreach ($list as $field) {
                    $data_tipe[] = $field->kecamatan_cust;
                    $data_total[] = $field->total;
                }
                foreach ($list_2 as $field) {
                    $data_total2[] = $field->total;
                }
            }else if($params_tipe=='gaji'){
                foreach ($list as $field) {
                    $data_tipe[] = $field->gaji_cust;
                    $data_total[] = $field->total;
                }
                foreach ($list_2 as $field) {
                    $data_total2[] = $field->total;
                }
            }else if($params_tipe=='umur'){
                foreach ($list as $field) {
                    $data_tipe[] = $field->umur_cust;
                    $data_total[] = $field->total;
                }
                foreach ($list_2 as $field) {
                    $data_total2[] = $field->total;
                }
            }
            $output = array(
                "data_tipe" =>$data_tipe,
                "data_total" =>$data_total,
                "data_total2" =>$data_total2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
