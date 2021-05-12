<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Users extends CI_Controller{
        public function __construct() { 
            parent::__construct();
        }

        public function index() {
            if($this->session->userdata('fname')){
                $data['title'] = 'Admin Panel';
                $data['users'] = $this->Usermodel->loadUser();
                $data['rownum'] = $this->Usermodel->getRownum();
                $data['assignedrows'] = $this->Usermodel->rowassigned();
                $data['editedRows'] = $this->Usermodel->editedRows();
                $data['file'] = $this->Usermodel->getfile();

                $this->load->view('templates/header');
                $this->load->view('users/index', $data);
                $this->load->view('templates/footerUser');
            } else {
                echo "<script> alert('Please Login First') </script>";
                header("Refresh: .2;".site_url());
            }
        }

        public function saveUser(){
            $fname = $this->input->post('first');
            $lname = $this->input->post('last');
            $uname = $this->input->post('user');
            $type = $this->input->post('type');

            $fname = strtolower($fname);
            $lname = strtolower($lname);

            $message = $this->Usermodel->saveUser(ucfirst($fname), ucfirst($lname), strtolower($uname), $type);

            echo $message;
        }

        public function changePassword(){
            $oldpass = md5($this->input->post('oldpass'));
            $newpass = md5($this->input->post('newpass'));
            $confirmpass = md5($this->input->post('confirmpass'));

            $message = $this->Usermodel->changePassword($oldpass, $newpass, $confirmpass);
            
            echo $message;
        }

        public function updateType(){
            $type = $this->input->post('updateType');
            $id = $this->input->post('updateID');

            $this->Usermodel->updateType($id, $type);

            header("location: ". base_url('users'));            
        }

        public function assignRows(){
            $username = $this->input->post('username');
            $from = $this->input->post('selectfilename');
            $to = $this->input->post('rowto');

            $result = $this->Usermodel->assignRows($username, $from, $to);
            if($result===TRUE){
                echo "<script> alert('Successfully assigned rows');</script>";
                header("Refresh: .2;". base_url('users'));    
            }else{
                echo "<script> alert('Error');</script>";
                header("Refresh: .2;". base_url('users'));
            }
        }

        public function deleteUser($id, $username){
            $this->Usermodel->delete($id, $username);
            header("location: ". base_url('users'));
        }

         public function deleteRows($username){
            $this->Usermodel->removeRows($username);
            header("location: ". base_url('users'));
        }
    }