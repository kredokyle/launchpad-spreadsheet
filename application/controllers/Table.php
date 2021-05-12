<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        if($this->session->userdata('fname')){
            $data['title'] = "Main";
            $numRows = $this->Tablemodel->countRows();

            if($numRows == 0){
                $this->load->view('templates/headerTable');
                $this->load->view('templates/footer');

                echo "<div class='alert alert-danger text-center m-4 font-weight-bold'>Table is empty.</div>";
            } else {
                if(!empty($_SESSION['filterIndustry']) || !empty($_SESSION['filterState'])){
                    $data['value'] = $this->Tablemodel->loadMain();
                }

                $data['numRows'] = $numRows;
                $this->load->view('templates/headerTable');
                $this->load->view('tables/view', $data);
                $this->load->view('templates/footerTable');
            }
        } else {
            echo "<script> alert('Please login first') </script>";
            header("Refresh: .2;".site_url());
        }
    }

    public function viewAll(){
        $_SESSION['filterIndustry'] = '*';
        $_SESSION['filterState'] = null;

        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function profiled(){
        $data['numRows'] = $this->Tablemodel->countProfiled();
        $data['value'] = $this->Tablemodel->loadProfiled();
        $data['title'] = 'Profiled';
        if(empty($data['value'])){
            $this->load->view('templates/headerTable');
            $this->load->view('templates/footer');

            echo "<div class='alert alert-danger text-center m-4 font-weight-bold'>No rows profiled.</div>";
        }else{
            if(!empty($_SESSION['filterIndustry']) || !empty($_SESSION['filterState'])){
                $data['value'] = $this->Tablemodel->loadProfiled();
            }
            $this->load->view('templates/headerTable');
            $this->load->view('tables/view', $data);
            $this->load->view('templates/footerTable');
        }
    }

    public function qualified(){
        $data['numRows'] = $this->Tablemodel->countQualified();
        $data['value'] = $this->Tablemodel->loadQualified();
        $data['title'] = 'Qualified';
        if(empty($data['value'])){
            $this->load->view('templates/headerTable');
            $this->load->view('templates/footer');
            
            echo "<div class='alert alert-danger text-center m-4 font-weight-bold'>No rows qualified.</div>";
        }else{
            if(!empty($_SESSION['filterIndustry']) || !empty($_SESSION['filterState'])){
                $data['value'] = $this->Tablemodel->loadQualified();
            }
            $this->load->view('templates/headerTable');
            $this->load->view('tables/view', $data);
            $this->load->view('templates/footerTable');
        }
    }

    public function archived(){
        $data['numRows'] = $this->Tablemodel->countArchived();
        $data['value'] = $this->Tablemodel->loadArchived();
        $data['title'] = 'Archived';
        if(empty($data['value'])){
            $this->load->view('templates/headerTable');
            $this->load->view('templates/footer');
            
            echo "<div class='alert alert-danger text-center m-4 font-weight-bold'>No rows archived.</div>";
        }else{
            if(!empty($_SESSION['filterIndustry']) || !empty($_SESSION['filterState'])){
                $data['value'] = $this->Tablemodel->loadArchived();
            }
            $this->load->view('templates/headerTable');
            $this->load->view('tables/view', $data);
            $this->load->view('templates/footerTable');
        }        
    }

    public function sesFilter(){
        $ind = $this->input->post('findustry');
        $sta = $this->input->post('fstate');

        $_SESSION['filterIndustry'] = $ind;
        $_SESSION['filterState'] = $sta;

        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }
    
    public function saveData(){
        if( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
            redirect('table');
        }

        $id = $this->input->post('id');
        $field = $this->input->post('field');
        $value = $this->input->post('value');

        $fields = array($field => $value);
        
        $this->Tablemodel->saveData($id, $fields);
    }

    public function saveNewData(){
        if( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
            redirect('table');
        }

        // $status = $this->input->post('status',true);
        $phonenumber = $this->input->post('phonenumber',true);
        $jobtitle = $this->input->post('jobtitle',true);
        $firstname = $this->input->post('firstname',true);
        $lastname = $this->input->post('lastname',true);
        $address = $this->input->post('address',true);
        // $county = $this->input->post('county',true);
        // $area = $this->input->post('area',true);
        $city = $this->input->post('city',true);
        $state = $this->input->post('state',true);
        $zip = $this->input->post('zip',true);
        $companyname = $this->input->post('companyname',true);
        $industry = $this->input->post('industry',true);
        $siccode = $this->input->post('siccode',true);
        $naicscode = $this->input->post('naicscode',true);
        $employeesize = $this->input->post('employeesize',true);
        $annualrevenue = $this->input->post('annualrevenue',true);
        $website = $this->input->post('website',true);
        // $phonenumber2 = $this->input->post('phonenumber2',true);
        // $extensionnumber = $this->input->post('extensionnumber',true);
        // $directline = $this->input->post('directline',true);
        $email = $this->input->post('email',true);
        // $mobilenumber = $this->input->post('mobilenumber',true);
        $comments = $this->input->post('comments',true);
        // $dmverified = $this->input->post('dmverified',true);
        // $profcompleted = $this->input->post('profcompleted',true);
        // $mobilenumber2 = $this->input->post('mobilenumber2',true);
        
$fields = array(
            // 'status' => $status,
            'phone_number' => $phonenumber,
            'job_title' => $jobtitle,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'address' => $address,
            // 'address_county' => $county,
            // 'address_area' => $area,
            'address_city' => $city,
            'address_state' => $state,
            'address_zip' => $zip,
            'company_name' => $companyname,
            'industry' => $industry,
            'sic_code' => $siccode,
            'naics_code' => $naicscode,
            'employee_size' => $employeesize,
            'annual_revenue' => $annualrevenue,
            'website' => $website,
            // 'phone_number2' => $phonenumber2,
            // 'extension_number' => $extensionnumber,
            // 'direct_line' => $directline,
            'email' => $email,
            // 'mobile_number' => $mobilenumber,
            'comment' => $comments,
            // 'dm_verified' => $dmverified,
            // 'prof_completed' => $profcompleted,
            // 'mobile_number2' => $mobilenumber2,
            'username' => 'Admin'
          );
          
        $this->Tablemodel->saveNewData($fields);
    }

    public function deleteRow(){
        if( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
            redirect('table');
        }

        $deleteId = $this->input->post('id',true);
        
        $this->Tablemodel->deleteRow($deleteId);
    }

    public function isQualified(){
        if( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
            redirect('home/index');
        }

        $id = $this->input->post('id');
        $value = $this->input->post('value');

        $this->Tablemodel->isQualified($id, $value);
    }

    public function archive(){
        if( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
            redirect('table');
        }

        $arr = $this->input->post('exportArray');
        $title = $this->input->post('exportTitle');
        
        $this->Tablemodel->archive($arr, $title);
    }
}