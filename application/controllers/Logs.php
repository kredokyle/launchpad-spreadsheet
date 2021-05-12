<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Logs extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            if($this->session->userdata('fname')){
                $data['title'] = 'Logs';
                $data['export'] = $this->Logsmodel->loadExportLog();
                $data['login'] = $this->Logsmodel->loadLoginLog();

                $this->load->view('templates/header');
                $this->load->view('logs/index', $data);
                $this->load->view('templates/footerLogs');
            } else {
                echo "<script> alert('Please Login First') </script>";
                header("Refresh: .2;".site_url());
            }
        }
    }