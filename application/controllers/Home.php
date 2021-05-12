<?php
    class Home extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            if($this->session->userdata('fname')){
                $data['title'] = 'Home';

                $this->load->view('templates/header');
                $this->load->view('home/index', $data);
                $this->load->view('templates/footer');
            } else {
                echo "<script> alert('Please Login First') </script>";
                header("Refresh: .2;".site_url());
            }
        }
    }