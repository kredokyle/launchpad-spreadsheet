<?php
class Reportmodel extends CI_Model{
    function __construct() {
        parent::__construct(); 
        $this->load->database();
    }
    // DATE(isEdited) = CURDATE()
    function loadreports(){
    	$query = $this->db->query("SELECT COUNT(isEdited), COUNT(isQualified), isEdited, username FROM tbl_main WHERE isEdited IS NOT NULL OR isQualified IS NOT NULL GROUP BY isEdited, username ");
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
}
?>