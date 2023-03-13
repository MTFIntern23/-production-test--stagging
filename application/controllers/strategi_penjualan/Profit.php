<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Profit extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
            $this->load->model('cabang_model');
            $this->load->model('serverside/profit_model');
            $this->load->model('chart_filter/profit_chart_model');
            if (!$this->auth_model->current_user()) {
                redirect('auth');
            }
        }
        public function index()
        {
            $data = [
                'title' => 'Profit | MyBranch by CPM',
                'current_user'=>$this->auth_model->current_user(),
                'current_cabang'=>$this->cabang_model->current_cabang(),
                'identifier'=>'is_profit_cabang',
                'submenu_identity'=>'',
            ];
            // $data = ['current_user'=>$this->auth_model->current_user()];
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('pages/strategi_penjualan/profit', $data);
            $this->load->view('templates/dashboard_footer');
        }
        public function listdata(){
            $csrf_name = $this->security->get_csrf_token_name();
            $csrf_hash = $this->security->get_csrf_hash();
            $params = $this->input->post('params');
            $params2 = $this->input->post('params2');
            $list = $this->profit_model->get_datatables($params);
            $list2 = $this->profit_model->get_datatables($params2);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $key=>$field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->komponen_profit;
                $row[] = $list2[$key]->profit;
                $row[] = $field->profit;
                if($params=='curr_month'||$params=='last_month'){
                    $row[] = '<button type="button" class="btn_session badge btn btn-primary me-2" onclick=window.location.href="'.base_url('performa_profit_detail').'/'.$this->security_idx->encrypt_url($field->id_komponen).'";sessionStorage.setItem("is_mtd",true);><i
                    class="bx bx-detail me-1"></i>Detail</button>';
                }else{
                    $row[] = '<button type="button" class="btn_session badge btn btn-primary me-2" onclick=window.location.href="'.base_url('performa_profit_detail').'/'.$this->security_idx->encrypt_url($field->id_komponen).'";sessionStorage.setItem("is_mtd",false);><i
                    class="bx bx-detail me-1"></i>Detail</button>';
                }
                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->profit_model->count_all(),
                "recordsFiltered" => $this->profit_model->count_filtered($params),
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
            $list = $this->profit_chart_model->profit_chart($id,$params);
            $list_2 = $this->profit_chart_model->profit_chart($id,$params2);
            $data_profit = array();
            $data_profit2 = array();
            foreach ($list as $field) {
                $data_profit[] = $field->profit;
            }
            foreach ($list_2 as $field) {
                $data_profit2[] = $field->profit;
            }
            $output = array(
                "data_profit" =>$data_profit,
                "data_profit2" =>$data_profit2,
            );
            $output[$csrf_name] = $csrf_hash;
            echo json_encode($output);
        }
    }
?> 