<?php

class Usermodel extends CI_Model{
    function __construct() {
        parent::__construct();  // call model constructor$this->load->database();
        $this->load->database();
    }

    function loadUser(){        
        $this->db->order_by('type', 'asc');
        $query = $this->db->get('tbl_users');
        return $query->result_array();
    }

    function rowassigned(){        
        $query = $this->db->query("SELECT COUNT(id), username FROM tbl_main GROUP BY username;");
        $res = $query->result_array();
        $result = array();
        foreach ($res as $value) {
            $result += array($value['username']=>$value['COUNT(id)']);
        }
        return $result;
    }

    function getfile(){        
        $query = $this->db->query("SELECT COUNT(id), file_name FROM tbl_main WHERE username = 'Admin' GROUP BY file_name;");
        $res = $query->result_array();
        $result = array();
        foreach ($res as $value) {
            $result += array($value['file_name']=>$value['COUNT(id)']);
        }
        return $result;
    }

    function editedRows(){
        $query = $this->db->query("SELECT COUNT(id), username FROM tbl_main WHERE isEdited IS NOT NULL OR isQualified IS NOT NULL GROUP BY username;");
        $res = $query->result_array();
        $result = array();
        foreach ($res as $value) {
            $result += array($value['username']=>$value['COUNT(id)']);
        }
        return $result;   
    }

    function getRownum(){
        $query = $this->db->query('SELECT * FROM tbl_main');
        return $query->num_rows();
    }

    function assignRows($username, $from, $to){
        $this->db->query("UPDATE tbl_main SET username= '".$username."' WHERE file_name='".$from."' AND username = 'Admin' AND isQualified IS NULL ORDER BY RAND() LIMIT ".$to);

        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function saveUser($fname, $lname, $uname, $type){
        $this->db->select('*')
                       ->where('username', $uname);
        $query=$this->db->get('tbl_users');

        if ( $query->num_rows() > 0 ){
            return "Username";
        } else {
            $pword = md5('launchpad123');
            $fields = array(
                'first_name'=>$fname,
                'last_name'=>$lname,
                'username'=>$uname,
                'password'=> $pword,
                'type'=>$type
            );

            if($this->db->insert('tbl_users', $fields)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    function delete($id, $username){
        $this->db->set('username', '-REMOVED-')
                        ->where('isQualified', 2)
                        ->or_where('isQualified', 1)
                        ->where('username', $username)
                        ->update('tbl_main');

        $this->db->set('username', 'Admin')
                        ->set('isEdited', NULL)
                        ->where('isQualified', NULL)
                        ->where('username', $username)
                        ->update('tbl_main');

        $this->db->where('id',$id)
                        ->delete('tbl_users');
    }
    
    function removeRows($username){
        $this->db->set('username', 'Admin')
                        ->set('isEdited', NULL)
                        ->where('username', $username)
                        ->where('isQualified', NULL)
                        ->update('tbl_main');
    }

    function updateType($id, $type){
        $this->db->set('type', $type)
                        ->where('id', $id)
                        ->update('tbl_users');
    }

    function changePassword($oldpass, $newpass, $confirmpass){
    $pword = $this->db->where('username', $_SESSION['uname'])
                                    ->get('tbl_users')->row()->password;
    
    if($pword === $oldpass){ //old passwords match
        if($newpass !== $oldpass){ //old and new not match
            if($newpass === $confirmpass){ //new and confirm match
                if($this->db->set('password', $newpass)
                                ->where('username', $_SESSION['uname'])
                                ->update('tbl_users')){
                                    return 'Success';
                }else return 'Fail';
            }else return 'NotMatch';
        }else return 'Same'; 
    }else return 'Incorrect';

    }
}