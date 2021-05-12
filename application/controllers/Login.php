<?php
	class Login extends CI_Controller{

		public function __construct() { 
	        parent::__construct();
    	}
		public function index(){
			$data['title']='Login';

			$this->session->sess_destroy();
			$this->load->view('login/header');
            $this->load->view('login/loginview', $data);
            $this->load->view('login/footer');
		}
		public function login_validation(){
			$this->load->model('Loginmodel');
			$uname = $this->input->post('username');
			$pass = md5($this->input->post('password'));
			$result = $this->Loginmodel->login($uname, $pass);
			if($result>0){
				header("Location:".base_url()."home/index");		
			}else{
				echo "<script> alert('Invalid Username or Password') </script>";
            	header("Refresh: .5;".site_url());
			}
		}
		public function logout(){
			date_default_timezone_set('Asia/Manila');
			
			$fields = array(
                'username'=>$_SESSION['uname'],
                'date'=>date("Y-m-d (l)"),
                'time'=>date("h:i:sa"),
                'event'=> 'OUT'
            );
			$this->db->insert('tbl_login_log', $fields);

			unset(
        		$_SESSION['fname'],
        		$_SESSION['lname'],
	    		$_SESSION['uname'],
	    		$_SESSION['type']
			);
			header("Location: ".base_url());
		}
	}
?>