<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Performa_produk extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('dropdown_model');
            $this->load->model('serverside/strategi_penjualan/product_model');
            $this->load->model('chart_filter/strategi_penjualan/product_chart_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $data = [
                'title' => 'Performa Produk | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
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
            $this->load->view('pages/strategi_penjualan/performa_produk', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->product_model->get_datatables($params);
            $list2 = $this->product_model->get_datatables($params2);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $key=>$field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->gp;
                $row[] = $list2[$key]->mtd_amt;
                $row[] = $field->mtd_amt;
                $row[] = $list2[$key]->mtd_unit;
                $row[] = $field->mtd_unit;
                if($params=='curr_month'||$params=='last_month'){
                    $row[] = '<button type="button" class="btn_session badge btn btn-primary me-2" onclick=window.location.href="'.base_url('performa_produk_detail').'/'.$this->security_idx->encrypt_url($field->id_gp).'";sessionStorage.setItem("is_mtd",true);><i
                    class="bx bx-detail me-1"></i>Detail</button>';
                }else{
                    $row[] = '<button type="button" class="btn_session badge btn btn-primary me-2" onclick=window.location.href="'.base_url('performa_produk_detail').'/'.$this->security_idx->encrypt_url($field->id_gp).'";sessionStorage.setItem("is_mtd",false);><i
                    class="bx bx-detail me-1"></i>Detail</button>';
                }
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->product_model->count_all(),
                "recordsFiltered" => $this->product_model->count_filtered($params),
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
            $list = $this->product_chart_model->product_chart($params);
            $list_2 = $this->product_chart_model->product_chart($params2);
            $data_lending = array();
            $data_gp = array();
            $data_lending2 = array();
            foreach ($list as $field) {
                $data_gp[] = $field->gp;
                $data_lending[] = $field->mtd_amt;
            }
            foreach ($list_2 as $field) {
                $data_lending2[] = $field->mtd_amt;
            }
            $output = array(
                "data_gp" =>$data_gp,
                "data_lending" =>$data_lending,
                "data_lending2" =>$data_lending2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
