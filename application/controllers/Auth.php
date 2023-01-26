<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('auth_model');
    }

    public function index()
    {
        $data['meta'] = [
            'title' => 'Login | MyBranch by CPM',
        ];
        if($this->auth_model->current_user()){
            redirect('dashboard');
        }else{
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
    }
    public function login()
    {
        $rules = $this->auth_model->rules();
        $this->form_validation->set_rules($rules);
        $username = $this->input->post('username');
        $password = $this->input->post('password');
            if ((!isset($password) || $password == '' || $password == 'undefined')&&(!isset($username) || $username == '' || $username == 'undefined')) {
                $data = array(
                    'token' => $this->security->get_csrf_hash(),
                    'value' => 4,
                );
                echo json_encode($data); 
                exit();
            }
            if (!isset($username) || $username == '' || $username == 'undefined') {
                $data = array(
                    'token' => $this->security->get_csrf_hash(),
                    'value' => 2,
                );
                echo json_encode($data); 
                exit();
            }
            if (!isset($password) || $password == '' || $password == 'undefined') {
                $data = array(
                    'token' => $this->security->get_csrf_hash(),
                    'value' => 3,
                );
                echo json_encode($data); 
                exit();
            }
            if($this->input->post('remember_me'))
            {
                $exp = (int) $this->config->item('remember_me_expiration');
                $this->config->set_item('sess_expiration', $exp);
            }
            if($this->auth_model->login($username,$password)){
                $data = array(
                    'token' => $this->security->get_csrf_hash(),
                    'value' => 1,
                );
                echo json_encode($data); 
            }else{
                $data = array(
                    'token' => $this->security->get_csrf_hash(),
                    'value' => 5,
                );
                echo json_encode($data); 
            }
        
    }
    public function logout(){
        $this->load->model('auth_model');
        $this->auth_model->logout();
        redirect('auth');
    }
}
?>