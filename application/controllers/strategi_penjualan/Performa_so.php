<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Performa_so extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('dropdown_model');
            $this->load->model('serverside/strategi_penjualan/so_model');
            $this->load->model('chart_filter/strategi_penjualan/so_chart_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $data = [
                'title' => 'Performa SO | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                //subfilter
                'subfilter_gp'=>$this->dropdown_model->subFilters('group_product'),
                'subfilter_jenis_assets'=>$this->dropdown_model->subFilters('status_asset'),
                'subfilter_jenis_ro'=>$this->dropdown_model->subFilters('status_ro'),
                'subfilter_profesi'=>$this->dropdown_model->subFilters('profesi_cust'),
                'subfilter_dealer'=>$this->dropdown_model->subFilters('dealer'),
                'subfilter_pareto'=>$this->dropdown_model->subFilters('pareto'),
                'identifier'=>'is_strategi_penjualan',
                'submenu_identity'=>'is_performa_so',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/performa_so', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $list = $this->so_model->get_datatables($params);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->nama_so;
                $row[] = $field->nama_spv;
                $row[] = $field->mtd_pencapaian;
                $row[] = $field->target;
                $row[] = $field->mtd_lending;
                $row[] = $field->mtd_persentasi;
                if($params=='curr_month'){
                    $row[] = '<button type="button" class="btn_session badge btn btn-primary me-2" onclick=window.location.href="'.base_url('performa_so_detail').'/'.$this->security_idx->encrypt_url($field->id_so).'";sessionStorage.setItem("is_mtd",true);><i
                    class="bx bx-detail me-1"></i>Detail</button>';
                }else{
                    $row[] = '<button type="button" class="btn_session badge btn btn-primary me-2" onclick=window.location.href="'.base_url('performa_so_detail').'/'.$this->security_idx->encrypt_url($field->id_so).'";sessionStorage.setItem("is_mtd",false);><i
                    class="bx bx-detail me-1"></i>Detail</button>';
                }
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->so_model->count_all(),
                "recordsFiltered" => $this->so_model->count_filtered($params),
                "data" => $data,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
        public function double_chartdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->so_chart_model->so_chart($params);
            $list_2 = $this->so_chart_model->so_chart($params2);
            $data_nama_so = array();
            $data_target = array();
            $data_target2 = array();
            $data_pencapaian = array();
            $data_pencapaian2 = array();
            foreach ($list as $field) {
                $data_nama_so[] = $field->nama_so;
                $data_target[] = $field->target;
                $data_pencapaian[] = $field->mtd_pencapaian;
            }
            foreach ($list_2 as $field) {
                $data_pencapaian2[] = $field->mtd_pencapaian;
                $data_target2[] = $field->target;
            }
            $output = array(
                "data_nama_so" => $data_nama_so,
                "data_target" =>$data_target,
                "data_target2" =>$data_target2,
                "data_pencapaian" => $data_pencapaian,
                "data_pencapaian2" =>$data_pencapaian2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
?>