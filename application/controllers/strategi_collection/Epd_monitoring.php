<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Epd_monitoring extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('cabang_model');
        $this->load->model('dropdown_model');
        $this->load->model('serverside/strategi_collection/epd_monitoring_model', 'epd_monitoring_model');
        $this->load->model('chart_filter/strategi_collection/epd_monitoring_chart_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data = [
            'title' => 'EPD Monitoring | MyBranch by CPM',
            'current_user'=>$this->auth_model->current_user(),
            'current_cabang'=>$this->cabang_model->current_cabang(),
            'graph_monitoring_detail_month'=>$this->cabang_model->epd_monitoring('curr_month', true),
            'graph_monitoring_detail_last_month'=>$this->cabang_model->epd_monitoring('last_month', true),
            'graph_monitoring_detail_last_year'=>$this->cabang_model->epd_monitoring('last_year', true),
            //dropdowns
            'subfilter_gp'=>$this->dropdown_model->subFilters('group_product'),
            'subfilter_jenis_assets'=>$this->dropdown_model->subFilters('status_asset'),
            'subfilter_so'=>$this->dropdown_model->subFilters('so'),
            'subfilter_jenis_ro'=>$this->dropdown_model->subFilters('status_ro'),
            'subfilter_profesi'=>$this->dropdown_model->subFilters('profesi_cust'),
            'subfilter_dealer'=>$this->dropdown_model->subFilters('dealer'),
            'subfilter_armo'=>$this->dropdown_model->subFilters('armo'),
            'identifier'=>'is_strategi_collection',
            'submenu_identity'=>'is_epd_monitoring',
        ];
        // $data = ['current_user'=>$this->auth_model->current_user()];
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('pages/strategi_collection/epd_monitoring', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function listdata()
    {
        $params = $this->input->post('params');
        $filter = $this->input->post('filter');
        $subfilter = $this->input->post('subFilter');
        if ($filter==''||$filter=='all'||!isset($filter)) {
            $subfilter_decode = $subfilter;
        } else {
            $subfilter_decode = $this->security_idx->sodiumDecrypt($subfilter);
        }
        $list = $this->epd_monitoring_model->get_datatables($params, $filter, $subfilter_decode);
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
            $row[] = $field->nama_armo;
            $row[] = $field->epd;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->epd_monitoring_model->count_all(),
            "recordsFiltered" => $this->epd_monitoring_model->count_filtered($params, $filter, $subfilter_decode),
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function chartdata()
    {
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();
        $params = $this->input->post('params');
        $filter = $this->input->post('filter');
        $subfilter = $this->input->post('subFilter');
        $subfilter_decode = $this->security_idx->sodiumDecrypt($subfilter);
        // $data = $this->chart_epd_model->epd_monitoring($params,$filter,$subfilter);
        $data = 'Halo';
        $output = array(
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function double_chartdata()
    {
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();
        $params = $this->input->post('params');
        $params2 = $this->input->post('params2');
        $list = $this->epd_monitoring_chart_model->epd_monitoring_chart($params);
        $list_2 = $this->epd_monitoring_chart_model->epd_monitoring_chart($params2);
        $data_fields = array();
        $data_lending = array();
        $data_lending2 = array();
        foreach ($list as $field) {
            $data_fields[] = $field->periode;
            $data_lending[] = $field->persentasi;
        }
        foreach ($list_2 as $field) {
            $data_lending2[] = $field->persentasi;
        }
        $output = array(
            "data_fields" => $data_fields,
            "data_lending" => $data_lending,
            "data_lending2" => $data_lending2,
        );
        $output[$csrf_name] = $csrf_hash;
        echo json_encode($output);
    }
    public function pie_chartdata()
    {
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();
        $list = $this->epd_monitoring_chart_model->epd_monitoring_chart('curr_month');
        $data_total = array();
        foreach ($list as $field) {
            $data_total[] = $field->account;
        }
        $output = array(
            "data_total" => $data_total,
        );
        $output[$csrf_name] = $csrf_hash;
        echo json_encode($output);
    }
}
