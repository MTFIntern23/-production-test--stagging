<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Performa_so_detail extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('dropdown_model');
            $this->load->model('serverside/strategi_penjualan/so_detail_model');
            $this->load->model('chart_filter/strategi_penjualan/so_detail_chart_model');
            $this->load->helper('url');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $id_so = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_so);
            $data = [
                'title' => 'Performa SO Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_detail_month'=>$this->cabang_model->performa_so($id,'curr_month',false),
                //subfilter
                'subfilter_gp'=>$this->dropdown_model->subFilters('group_product'),
                'subfilter_jenis_assets'=>$this->dropdown_model->subFilters('status_asset'),
                'subfilter_jenis_ro'=>$this->dropdown_model->subFilters('status_ro'),
                'subfilter_profesi'=>$this->dropdown_model->subFilters('profesi_cust'),
                'subfilter_dealer'=>$this->dropdown_model->subFilters('dealer'),
                'subfilter_pareto'=>$this->dropdown_model->subFilters('pareto'),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_performa_so',
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_performa_so',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/performa_so_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('id_so');
            $params = $this->input->post('params');
            $list = $this->so_detail_model->get_datatables($id,$params);
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
                $row[] = $field->nama_dealer;
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->so_detail_model->count_all(),
                "recordsFiltered" => $this->so_detail_model->count_filtered($id,$params),
                "data" => $data,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('id_so');
            $params = $this->input->post('params');
            $list = $this->so_detail_chart_model->so_detail_chart($id,$params);
            $data_fields = array();
            $data_values = array();
            foreach ($list as $field) {
                $data_fields[] = $field->tgl_golive;
                $data_values[] = $field->mtd_lending_amt;
            }
            $output = array(
                "data_fields" => $data_fields,
                "data_values" =>$data_values,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function double_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('id_so');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->so_detail_chart_model->so_detail_chart($id,$params);
            $list_2 = $this->so_detail_chart_model->so_detail_chart($id,$params2);
            $data_fields1 = array();
            $data_values1 = array();
            $data_fields2 = array();
            $data_values2 = array();
            foreach ($list as $field) {
                $data_fields1[] = $field->tgl_golive;
                $data_values1[] = $field->mtd_lending_amt;
            }
            foreach ($list_2 as $field) {
                $data_fields2[] = $field->tgl_golive;
                $data_values2[] = $field->mtd_lending_amt;
            }
            $output = array(
                "data_fields1" => $data_fields1,
                "data_values1" =>$data_values1,
                "data_fields2" => $data_fields2,
                "data_values2" =>$data_values2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
?>