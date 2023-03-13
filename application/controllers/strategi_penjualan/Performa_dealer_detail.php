<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Performa_dealer_detail extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('dropdown_model');
            $this->load->model('serverside/strategi_penjualan/dealer_detail_model');
            $this->load->model('chart_filter/strategi_penjualan/dealer_detail_chart_model');
            $this->load->helper('url');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $id_dealer = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_dealer);
            $data = [
                'title' => 'Performa Dealer Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_detail_month'=>$this->cabang_model->performa_dealer($id,'curr_month',false),
                //subfilter
                'subfilter_gp'=>$this->dropdown_model->subFilters('group_product'),
                'subfilter_jenis_assets'=>$this->dropdown_model->subFilters('status_asset'),
                'subfilter_jenis_ro'=>$this->dropdown_model->subFilters('status_ro'),
                'subfilter_profesi'=>$this->dropdown_model->subFilters('profesi_cust'),
                'subfilter_so'=>$this->dropdown_model->subFilters('so'),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_performa_dealer',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/performa_dealer_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('id_dealer');
            $params = $this->input->post('params');
            $list = $this->dealer_detail_model->get_datatables($id,$params);
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
                $row[] = $field->jenis;
                $row[] = $field->nama_so;
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->dealer_detail_model->count_all(),
                "recordsFiltered" => $this->dealer_detail_model->count_filtered($id,$params),
                "data" => $data,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('id_dealer');
            $params = $this->input->post('params');
            $list = $this->dealer_detail_chart_model->dealer_detail_chart($id,$params);
            $data_fields = array();
            $data_lending = array();
            foreach ($list as $field) {
                $data_fields[] = $field->tgl_golive;
                $data_lending[] = $field->mtd_lending;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_lending" =>$data_lending,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function double_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('id_dealer');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->dealer_detail_chart_model->dealer_detail_chart($id,$params);
            $list_2 = $this->dealer_detail_chart_model->dealer_detail_chart($id,$params2);
            $data_fields = array();
            $data_lending = array();
            $data_lending2 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->month;
                $data_lending[] = $field->mtd_lending;
            }
            foreach ($list_2 as $field) {
                $data_lending2[] = $field->mtd_lending;
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
            $id = $this->input->post('id_dealer');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->dealer_detail_chart_model->get_brand($id,$params);
            $list_2 = $this->dealer_detail_chart_model->get_brand($id,$params2);
            $data_fields = array();
            $data_fields2 = array();
            $data_total = array();
            $data_total2 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->brand;
                $data_total[] = $field->total_jenis;
            }
            foreach ($list_2 as $field) {
                $data_fields2[] = $field->brand;
                $data_total2[] = $field->total_jenis;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_fields2" => $data_fields2,
                "data_total" => $data_total,
                "data_total2" => $data_total2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
