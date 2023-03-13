<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Tod_monitoring_detail extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('dropdown_model');
            $this->load->model('serverside/strategi_collection/tod_monitoring_model');
            $this->load->model('chart_filter/strategi_collection/Tod_monitoring_detail_chart_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $id_tod = $this->uri->segment(2);
            $id = $this->security_idx->decrypt_url($id_tod);
            $data = [
                'title' => 'TOD Monitoring Detail | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'performa_detail_month'=>$this->cabang_model->tod_monitoring($id,'curr_month',false),
                //dropdowns
                'subfilter_gp'=>$this->dropdown_model->subFilters('group_product'),
                'subfilter_jenis_assets'=>$this->dropdown_model->subFilters('status_asset'),
                'subfilter_so'=>$this->dropdown_model->subFilters('so'),
                'subfilter_jenis_ro'=>$this->dropdown_model->subFilters('status_ro'),
                'subfilter_profesi'=>$this->dropdown_model->subFilters('profesi_cust'),
                'subfilter_dealer'=>$this->dropdown_model->subFilters('dealer'),
                'subfilter_armo'=>$this->dropdown_model->subFilters('armo'),
                'identifier'=>'is_strategi_collection',
                'submenu_identity'=>'is_tod_monitoring',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_collection/tod_monitoring_detail', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('bucket_od');
            $params = $this->input->post('params');
            $list = $this->tod_monitoring_model->get_datatables($id,$params);
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
                $row[] = $field->nama_armo;
                $row[] = $field->od;
                $row[] = $field->osp;
                $row[] = $field->instalment_amt;
                $row[] = $field->instalment_number;
                $row[] = $field->tenor;
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->tod_monitoring_model->count_all(),
                "recordsFiltered" => $this->tod_monitoring_model->count_filtered($id,$params),
                "data" => $data,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $id = $this->input->post('bucket_od');
            $params = $this->input->post('params');
            $list = $this->Tod_monitoring_detail_chart_model->tod_monitoring_chart($id,$params);
            $data_fields = array();
            $data_lending = array();
            foreach ($list as $field) {
                $data_fields[] = $field->tgl_golive;
                $data_lending[] = $field->mtd_osp;
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
            $id = $this->input->post('bucket_od');
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->Tod_monitoring_detail_chart_model->tod_monitoring_chart($id,$params);
            $list_2 = $this->Tod_monitoring_detail_chart_model->tod_monitoring_chart($id,$params2);
            $data_fields = array();
            $data_lending = array();
            $data_lending2 = array();
            foreach ($list as $field) {
                $data_fields[] = $field->month;
                $data_lending[] = $field->mtd_osp;
            }
            foreach ($list_2 as $field) {
                $data_lending2[] = $field->mtd_osp;
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
