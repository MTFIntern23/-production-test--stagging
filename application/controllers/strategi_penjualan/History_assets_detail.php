<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class History_assets_detail extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('dropdown_model');
            $this->load->model('serverside/strategi_penjualan/history_detail_model');
            $this->load->model('chart_filter/strategi_penjualan/History_chart_detail_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $id_tipe = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_tipe);
            $data = [
                'title' => 'History Assets Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'history_assets_month'=>$this->cabang_model->history_assets($id,'curr_month','tipe',false),
                //subfilter
                'subfilter_gp'=>$this->dropdown_model->subFilters('group_product'),
                'subfilter_so'=>$this->dropdown_model->subFilters('so'),
                'subfilter_jenis_ro'=>$this->dropdown_model->subFilters('status_ro'),
                'subfilter_profesi'=>$this->dropdown_model->subFilters('profesi_cust'),
                'subfilter_dealer'=>$this->dropdown_model->subFilters('dealer'),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_history',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/history_assets_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $id = $this->input->post('id_tipe');
            $params = $this->input->post('params');
            $list = $this->history_detail_model->get_datatables($id,$params);
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
                "recordsTotal" => $this->history_detail_model->count_all(),
                "recordsFiltered" => $this->history_detail_model->count_filtered($id,$params),
                "data" => $data,
            );
            echo json_encode($output);
        }
        public function chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('id');
            $params_tipe = $this->input->post('tipe');
            $params = $this->input->post('params');
            $list = $this->History_chart_detail_model->history_detail_chart($id,$params,$params_tipe);
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
            $id = $this->input->post('id');
            $params_tipe = $this->input->post('tipe');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->History_chart_detail_model->history_detail_chart($id,$params,$params_tipe);
            $list_2 = $this->History_chart_detail_model->history_detail_chart($id,$params2,$params_tipe);
            $data_lending = array();
            $data_fields = array();
            $data_lending2 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->month;
                $data_lending[] = $field->mtd_lending;
            }
            foreach ($list_2 as $field) {
                $data_lending2[] = $field->mtd_lending;
            }
            $output = array(
                "data_fields" =>$data_fields,
                "data_lending" =>$data_lending,
                "data_lending2" =>$data_lending2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
?>