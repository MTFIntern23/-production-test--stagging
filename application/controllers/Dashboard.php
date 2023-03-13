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
            'performa_month'=>$this->cabang_model->performa_lending('curr_month'),
            //!!
            'performa_dealer'=>$this->cabang_model->performa_dealer(null,null,false),
            //!!end
            'performa_lending_today'=>$this->cabang_model->performa_lending('today'),
            'identifier'=>'is_home',
            'submenu_identity'=>'',
        ];
        $this->load->view('templates/dashboard_header',$data);
        $this->load->view('pages/dashboard',$data);
        $this->load->view('templates/dashboard_footer',$data);
    }
    public function api_test(){
        echo "test";
        var_dump($this->cabang_model->performa_lending_db_today()); 
    }
}
?>