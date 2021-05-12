<?php
class Loginmodel extends CI_Model{
    public function __construct(){ //CONSTRUCTOR
        parent::__construct();
        $this->load->database(); //LOAD DATABASE
        $this->load->library('session');
	}
	
    public function login($username, $password){
		date_default_timezone_set('Asia/Manila');
		$num = 0;

		$query = $this->db->query("SELECT * FROM tbl_users WHERE username ='".$username."' AND password ='".$password."'");
		
    	foreach ($query->result() as $row) {
    		$_SESSION['fname'] = $row->first_name;
    		$_SESSION['lname'] = $row->last_name;
    		$_SESSION['uname'] = $row->username;
			$_SESSION['type'] = $row->type;

			$fields = array(
                'username'=>$row->username,
                'date'=>date("Y-m-d (l)"),
                'time'=>date("h:i:sa"),
                'event'=> 'IN'
            );
			$this->db->insert('tbl_login_log', $fields);
			
    		$num++;
    	}
    	return $num;
    }
}
?>