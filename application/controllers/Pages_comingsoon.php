<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Pages_comingsoon extends CI_Controller
    {
        public function index()
        {
            $data = [
                'title' => 'Coming Soon',
            ];
            $this->load->view('templates/basic_header',$data);
            $this->load->view('pages/pages_comingsoon');
            $this->load->view('templates/basic_footer');
            $this->output->cache(43200);
        }
    }
