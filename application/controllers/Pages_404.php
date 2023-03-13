<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Pages_404 extends CI_Controller
    {
        public function index()
        {
            $data = [
                'title' => '404 Error',
            ];
            $this->load->view('templates/basic_header',$data);
            $this->load->view('pages/pages_404');
            $this->load->view('templates/basic_footer');
            $this->output->cache(43200);
        }
    }
