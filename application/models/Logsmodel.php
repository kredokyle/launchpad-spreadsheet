<?php
class Logsmodel extends CI_Model{
    function __construct() {
        parent::__construct(); 
        $this->load->database();
    }

    function loadExportLog(){
        $query = $this->db->order_by('id', 'asc')
                                        ->get('tbl_export_log');
        return $query->result_array();
    }

    function loadLoginLog(){
        $query = $this->db->order_by('id', 'asc')
                                        ->get('tbl_login_log');
        return $query->result_array();
    }
}