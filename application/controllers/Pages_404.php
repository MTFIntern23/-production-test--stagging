<?php
    class Pages_404 extends CI_Controller
    {
        public function index()
        {
            $data = [
                'title' => '404 Error',
            ];
            $this->load->view('templates/pages_404', $data);
        }
    }
