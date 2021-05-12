<?php
class Import_model extends CI_Model{
    public function __construct(){ //CONSTRUCTOR
        parent::__construct();
        $this->load->database(); //LOAD DATABASE
    }
    
    public function import_excel($excelarray, $filename){
    	$x=0;
    	foreach($excelarray as $a){
	        $data = array(
	               'status' => $a['status'],
	               'phone_number' => $a['phone_number'],
	               'job_title'=>$a['job_title'],
	               'first_name' =>$a['f_name'],
	               'last_name' =>$a['l_name'],
	               'address' =>$a['adrs1'],
	               'address_county' => $a['county_'],
	               'address_area' => $a['area_'],
	               'address_city'=>$a['adrs_city'],
	               'address_state' =>$a['adrs_state'],
	               'address_zip' =>$a['adrs_zip'],
	               'company_name' =>$a['comp_name'],
	               'industry' => $a['industry'],
	               'sic_code' => $a['sic_code'],
	               'naics_code'=>$a['naics_code'],
	               'employee_size' =>$a['emp_size'],
	               'annual_revenue' =>$a['ann_rev'],
	               'website' =>$a['website_'],
	               'phone_number2' => $a['phone_num'],
	               'extension_number' => $a['ext_num'],
	               'direct_line'=>$a['direct_line'],
	               'email' =>$a['email_'],
	               'mobile_number' =>$a['mobile_number'],
	               'comment' =>$a['comments_'],
	               'dm_verified' => $a['dm_verified'],
	               'prof_completed' => $a['prof_completed'],
		       'mobile_number2'=>$a['mobile_num'],
		       'file_name' => $filename
	        );
	        $this->db->insert('tbl_main', $data);
	        $x++;
    	}
    		return $x;	
    }
}	
?>