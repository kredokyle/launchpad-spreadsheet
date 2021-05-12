<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Reports extends CI_Controller {
    	public function __construct() { 
            parent::__construct();
        }

        public function index(){
            if($this->session->userdata('fname')){
                $data['title'] = 'Reports';
                $data['value'] = $this->Reportmodel->loadreports();
                $data['assignedrows'] = $this->Reportmodel->rowassigned();
                if(empty($data['value'])){
                    $data['isempty'] = "Report is empty";
                }
        
                $this->load->view('templates/header');
                $this->load->view('reports/view', $data);
                $this->load->view('templates/footerReports');        
            } else {
                echo "<script> alert('Please Login First') </script>";
                header("Refresh: .2;".site_url());
            }
        }
    }
?>