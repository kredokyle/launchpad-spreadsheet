<?php
ini_set('max_execution_time', 0); 
defined('BASEPATH') OR exit('No Direct script access allowed');

class ExcelDataInsert extends CI_Controller{

	public function __construct(){
		parent::__construct();
        $data['title'] = 'Home';
        $this->load->library('form_validation');    
        $this->load->model('import_model');
	}

	public function import_data()
	{   
        $filename = "";
        $this->benchmark->mark('code_start');
        $this->load->model('import_model');
        $config = array(
            'upload_path'   => FCPATH.'/uploads/',
            'allowed_types' => 'xlsx|xls' 
        );
        $this->load->library('upload', $config);
        if($this->upload->do_upload('file')){
            $updata = $this->upload->data();
            $file = $updata['full_path'];
            $filename = $updata['file_name'];
        }

        include_once(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        include_once(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        include_once(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Reader/Excel2007.php');


        //Create excel reader after determining the file type
        $header = true;
        $inputFileName = $file;
        /**  Identify the type of $inputFileName  **/
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        /**  Create a new Reader of the type that has been identified  **/
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        /** Set read type to read cell data onl **/
        $objReader->setReadDataOnly(true);
        /**  Load $inputFileName to a PHPExcel Object  **/
        $objPHPExcel = $objReader->load($inputFileName);
        //Get worksheet and built array with first row as header
        $objWorksheet = $objPHPExcel->getActiveSheet();

        if($header){
            $highestRow = $objWorksheet->getHighestRow();
            $highestColumn = $objWorksheet->getHighestColumn();
            $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
            $headingsArray = $headingsArray[1];
            $r = -1;
            $namedDataArray = array();
            for ($row = 2; $row <= $highestRow; ++$row) {
                $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
                if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
                    ++$r;
                    foreach($headingsArray as $columnKey => $columnHeading) {
                        $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
                    }
                }
            }
        }
        else{
            //excel sheet with no header
            $namedDataArray = $objWorksheet->toArray(null,true,true,true);
        }
        $res = $this->import_model->import_excel($namedDataArray, $filename);
        $this->benchmark->mark('code_end');
        $time = json_encode($this->benchmark->elapsed_time('code_start', 'code_end'));
        $rownum = json_encode($res);
        if($res >= 1){
            echo "<script>console.log('Time: ".$time."')</script>";
            echo "<script> alert('Successfully Uploaded ".$res." Rows, Time Elapsed: ".$time."') </script>";
            unlink($file);
            $data['title'] = 'Home';
            header("Refresh: .5;".base_url()."home/index");
        }else{
            echo "<script>console.log('Time: ".$time."')</script>";
            echo "<script> alert('Error') </script>";
            unlink($file);
            $data['title'] = 'Home';
            header("Refresh: .5;".base_url()."home/index");
        }
        
    }
}
?>