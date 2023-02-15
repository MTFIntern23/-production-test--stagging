<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('cabang_model');
        if(!$this->auth_model->current_user()){
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard | MyBranch by CPM',
            'current_user'=>$this->auth_model->current_user(),
            'current_cabang'=>$this->cabang_model->current_cabang(),
            'performa_so'=>$this->cabang_model->performa_so('','curr_month',false),
            'performa_dealer'=>$this->cabang_model->performa_dealer(null,null,false),
            'performa_lending_today'=>$this->cabang_model->performa_lending('today'),
            'performa_month'=>$this->cabang_model->performa_lending('curr_month'),
            'performa_last_month'=>$this->cabang_model->performa_lending('last_month'),
            'performa_year'=>$this->cabang_model->performa_lending('curr_year'),
            'performa_last_year'=>$this->cabang_model->performa_lending('last_year'),
            'current_month_profit'=>$this->cabang_model->profit_cabang('','curr_month'),
            'last_month_profit'=>$this->cabang_model->profit_cabang('','last_month'),
            //tod
            'current_month_tod'=>$this->cabang_model->tod_monitoring(null,'curr_month',false),
            'last_month_tod'=>$this->cabang_model->tod_monitoring(null,'last_month',false),
            //npl
            'performa_month_npl'=>$this->cabang_model->npl_monitoring('curr_month'),
            //cwo
            'performa_month_cwo'=>$this->cabang_model->cwo_monitoring('curr_month'),
            'identifier'=>'is_home',
            'submenu_identity'=>'',
        ];
        $test['join2'] = $this->cabang_model->performa_so('','curr_month',false); 
        // $data = ['current_user'=>$this->auth_model->current_user()];
        $this->load->view('templates/dashboard_header',$data);
        $this->load->view('pages/dashboard',$data);
        $this->load->view('templates/dashboard_footer',$data);
    }

    public function api_test(){
        echo "test";
        var_dump($this->cabang_model->performa_lending_db_today()); 
        // var_dump($this->cabang_model->performa_dealer()); 
    }
}
?>