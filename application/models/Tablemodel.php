<?php
class Tablemodel extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function countRows(){
        if($_SESSION['type'] !== 'User'){
            $numRows = $this->db->where('isEdited', NULL)
                                                    ->where('isQualified', NULL)
                                                    ->from('tbl_main')
                                                    ->count_all_results();
        }else{
            $numRows = $this->db->where('isEdited', NULL)
                                                    ->where('isQualified', NULL)
                                                    ->where(['username'=>$_SESSION['uname']])
                                                    ->from("tbl_main")
                                                    ->count_all_results();
        }
        return $numRows;
    }

// mao ni query para mudikit ang same phone numbers
// $query = $this->db->query('
//             SELECT a.* 
//             FROM tbl_main a 
//                 JOIN 
//                 (SELECT phone_number, MIN(id) as minId FROM tbl_main b GROUP BY phone_number) b 
//                 USING (phone_number) 
//              WHERE isEdited IS NULL AND isQualified IS NULL ORDER BY minId, id, phone_number');

    function loadMain(){
        if($_SESSION['type'] !== 'User'){        
            if($_SESSION['filterIndustry'] === '*'){
                $query = $this->db->where('isEdited', NULL)
                                                ->where('isQualified', NULL)
                                                ->get('tbl_main');
            }else{
            $query = $this->db->like('industry', $_SESSION['filterIndustry'])
                                            ->like('address_state', $_SESSION['filterState'])
                                            ->where('isEdited', NULL)
                                            ->where('isQualified', NULL)
                                            ->get('tbl_main');
            }
            
        }else{
            if($_SESSION['filterIndustry'] === '*'){
                $query = $this->db->where('isEdited', NULL)
                                            ->where('isQualified', NULL)
                                            ->where('username', $_SESSION['uname'])
                                            ->get('tbl_main');
            }else{
                $query = $this->db->like('industry', $_SESSION['filterIndustry'])
                                                ->like('address_state', $_SESSION['filterState'])
                                                ->where('isEdited', NULL)
                                                ->where('isQualified', NULL)
                                                ->where('username', $_SESSION['uname'])
                                                ->get('tbl_main');
            }
        }
        return $query->result_array();
    }

    function countProfiled(){
        $numRows = $this->db->where('isEdited IS NOT NULL')
                                            ->where('isQualified', NULL)
                                            ->from('tbl_main')
                                            ->count_all_results();
        return $numRows;                                            
    }

    function loadProfiled(){
        if($_SESSION['filterIndustry'] === '*'){
            $query = $this->db->where('isEdited IS NOT NULL')
                                            ->where('isQualified', NULL)
                                            ->get('tbl_main');
        }else{
            $query = $this->db->like('industry', $_SESSION['filterIndustry'])
                                        ->like('address_state', $_SESSION['filterState'])
                                        ->where('isEdited IS NOT NULL')
                                        ->where('isQualified', NULL)
                                        ->get('tbl_main');
        }
        return $query->result_array();
    }

    function countQualified(){
        $numRows = $this->db->where('isQualified', 1)
                                            ->from('tbl_main')
                                            ->count_all_results();
        return $numRows;
    }

    function loadQualified(){
        if($_SESSION['filterIndustry'] === '*'){
            $query = $this->db->where('isQualified', 1)
                                            ->get('tbl_main');
        }else{
            $query = $this->db->like('industry', $_SESSION['filterIndustry'])
                                            ->like('address_state', $_SESSION['filterState'])
                                            ->where('isQualified', 1)
                                            ->get('tbl_main');
        }
        return $query->result_array();
    }

    function countArchived(){
        $numRows = $this->db->where('isQualified', 2)
                                            ->from('tbl_main')
                                            ->count_all_results();
        return $numRows;
    }

    function loadArchived(){
        $query = $this->db->like('industry', $_SESSION['filterIndustry'])
                                        ->like('address_state', $_SESSION['filterState'])
                                        ->where('isQualified', 2)
                                        ->get('tbl_main');
        return $query->result_array();
    }
  
    function saveData($id, $fields){
        $this->db->where('id',$id)
                        ->update('tbl_main', $fields);
        if($_SESSION['type']=='User'){
            $this->db->query("UPDATE tbl_main SET isEdited = now() WHERE id =".$id);
        }
    }

    function postsNewData($fields){
        $this->db->insert('tbl_main', $fields);
    }

    function deleteRow($id){
        $this->db->delete('tbl_main', array('id' => $id));
    }

    function isQualified($id, $value){
        if($value=="1"){ // Qualified
            // $this->db->set('isQualified', 1)
            //                 ->where('id', $id)
            //                 ->update('tbl_main');
            $this->db->query("UPDATE tbl_main SET isQualified = 1, isEdited = now() WHERE id =".$id);

            // $this->db->set('isQualified', 1)
            //                 ->set('isEdited', now())
            //                 // ->where('isEdited', NULL)
            //                 ->where('id', $id)
            //                 ->update('tbl_main');


            echo 'QUALIFIED '. $id;
        } else { // Not qualified
            $this->db->set('isEdited', NULL)
                            ->set('isQualified', NULL)
                            ->where('id', $id)
                            ->update('tbl_main');
            echo 'DISQUALIFIED '. $id;
        }
    }

    function archive($arr, $title){
        //ROWS
        $length = count($arr);

        //TIME_DATE
        date_default_timezone_set('Asia/Manila');
        $date = date("Y-m-d (l)");
        $time = date("h:i:sa");
        
        
        $exportLogArray = array(
            'file_name' => $title,
            'rows' => $length,
            'user' => $_SESSION['uname'],
            'date' => $date,
            'time' => $time
        );
        $this->db->insert('tbl_export_log', $exportLogArray);
        
        foreach($arr as $value){
            $this->db->set('isQualified', 2);
            $this->db->where('id', $value);
            $this->db->update('tbl_main');}
    }
}