<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Performa_produk_detail extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('dropdown_model');
            $this->load->model('serverside/strategi_penjualan/product_detail_model');
            $this->load->model('chart_filter/strategi_penjualan/product_detail_chart_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $id_product = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_product);
            $data = [
                'title' => 'Performa Produk Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_product_month'=>$this->cabang_model->performa_product($id,'curr_month',false),
                //subfilter
                'subfilter_jenis_assets'=>$this->dropdown_model->subFilters('status_asset'),
                'subfilter_so'=>$this->dropdown_model->subFilters('so'),
                'subfilter_jenis_ro'=>$this->dropdown_model->subFilters('status_ro'),
                'subfilter_dealer'=>$this->dropdown_model->subFilters('dealer'),
                'subfilter_profesi'=>$this->dropdown_model->subFilters('profesi_cust'),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_performa_produk',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/performa_produk_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('id_product');
            $params = $this->input->post('params');
            $list = $this->product_detail_model->get_datatables($id,$params);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->no_aplikasi;
                $row[] = $field->nama_cust;
                $row[] = $field->produk;
                $row[] = $field->lending_amt;
                $row[] = $field->tgl_appin;
                $row[] = $field->tgl_golive;
                $row[] = $field->jenis;
                $row[] = $field->nama_so;
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->product_detail_model->count_all(),
                "recordsFiltered" => $this->product_detail_model->count_filtered($id,$params),
                "data" => $data,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('id_gp');
            $params = $this->input->post('params');
            $list = $this->product_detail_chart_model->product_detail_chart($id,$params);
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
            $id = $this->input->post('id_gp');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->product_detail_chart_model->product_detail_chart($id,$params);
            $list_2 = $this->product_detail_chart_model->product_detail_chart($id,$params2);
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
            $id = $this->input->post('id_gp');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->product_detail_chart_model->get_product($id,$params);
            $list_2 = $this->product_detail_chart_model->get_product($id,$params2);
            $data_fields = array();
            $data_fields2 = array();
            $data_total = array();
            $data_total2 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->produk;
                $data_total[] = $field->jml_produk;
            }
            foreach ($list_2 as $field) {
                $data_fields2[] = $field->produk;
                $data_total2[] = $field->jml_produk;
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
?>