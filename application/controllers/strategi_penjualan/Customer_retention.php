<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Customer_retention extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('dropdown_model');
            $this->load->model('serverside/strategi_penjualan/customer_retention_model');
            $this->load->model('chart_filter/strategi_penjualan/Customer_retention_chart_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $data = [
                'title' => 'Customer Retention | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                //dropdowns
                'subfilter_gp'=>$this->dropdown_model->subFilters('group_product'),
                'subfilter_jenis_assets'=>$this->dropdown_model->subFilters('status_asset'),
                'subfilter_so'=>$this->dropdown_model->subFilters('so'),
                'subfilter_profesi'=>$this->dropdown_model->subFilters('profesi_cust'),
                'subfilter_dealer'=>$this->dropdown_model->subFilters('dealer'),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_customer_retention',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/customer_retention', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $list = $this->customer_retention_model->get_datatables($params);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->no_aplikasi;
                $row[] = $field->nama_cust;
                $row[] = $field->status_ro;
                $row[] = $field->total_ro;
                $row[] = $field->mtd_amt;
                $row[] = $field->mtd_unit;
                $row[] = $field->tgl_appin;
                $row[] = $field->tgl_golive;
                $row[] = $field->nama_dealer;
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->customer_retention_model->count_all(),
                "recordsFiltered" => $this->customer_retention_model->count_filtered($params),
                "data" => $data,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $is_ro = $this->input->post('is_ro');
            $is_ro2 = $this->input->post('is_ro_2');
            $params = $this->input->post('params');
            $list = $this->Customer_retention_chart_model->customer_retention_chart($params,$is_ro);
            $list2 = $this->Customer_retention_chart_model->customer_retention_chart($params,$is_ro2);
            $data_fields = array();
            $data_lending = array();
            $data_lending2 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->tgl_golive;
                $data_lending[] = $field->mtd_amt;
            }
            foreach ($list2 as $field) {
                $data_lending2[] = $field->mtd_amt;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_lending" =>$data_lending,
                "data_lending2" =>$data_lending2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function double_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $is_ro = $this->input->post('is_ro');
            $is_ro2 = $this->input->post('is_ro_2');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->Customer_retention_chart_model->customer_retention_chart($params,$is_ro);
            $list_2 = $this->Customer_retention_chart_model->customer_retention_chart($params,$is_ro2);
            $list_3 = $this->Customer_retention_chart_model->customer_retention_chart($params2,$is_ro);
            $list_4 = $this->Customer_retention_chart_model->customer_retention_chart($params2,$is_ro2);
            $data_fields = array();
            $data_lending_ro1 = array();
            $data_lending_ro0 = array();
            $data_lending_last_ro1 = array();
            $data_lending_last_ro0 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->month;
                $data_lending_ro1[] = $field->mtd_amt;
            }
            foreach ($list_2 as $field) {
                $data_lending_ro0[] = $field->mtd_amt;
            }
            foreach ($list_3 as $field) {
                $data_lending_last_ro1[] = $field->mtd_amt;
            }
            foreach ($list_4 as $field) {
                $data_lending_last_ro0[] = $field->mtd_amt;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_lending_ro1" => $data_lending_ro1,
                "data_lending_ro0" => $data_lending_ro0,
                "data_lending_last_ro1" => $data_lending_last_ro1,
                "data_lending_last_ro0" => $data_lending_last_ro0,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function pie_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->Customer_retention_chart_model->get_ro($params);
            $list2 = $this->Customer_retention_chart_model->get_ro($params2);
            $data_fields = array();
            $data_fields2 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->status_ro;
            }
            foreach ($list2 as $field) {
                $data_fields2[] = $field->status_ro;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_fields2" => $data_fields2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
