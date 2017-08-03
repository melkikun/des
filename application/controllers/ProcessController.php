<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class ProcessController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('excel');
    }

    public function index() {
        $this->load->view('upload_form', array('error' => ' '));
    }

    public function getData() {
        
        $tmpfname = './uploads/data__skripsi_2014.xlsx';
            if(file_exists($tmpfname)){
                echo "file ada";
                $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		
		echo "<table>";
		for ($row = 1; $row <= $lastRow; $row++) {
			 echo "<tr><td>";
			 echo $worksheet->getCell('B'.$row)->getValue();
			 echo "</td><tr>";
		}
		echo "</table>";	
            }else{
                echo "file tidak ada";
            }
        
//        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = 'xls|xlsx';
//        
//
//        $this->load->library('upload', $config);
//
//// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
//        $this->upload->initialize($config);
//
//        if (!$this->upload->do_upload('tahun1')) {
////            $error = array('error' => $this->upload->display_errors());
////
////            $this->load->view('upload_form', $error);
//            echo $this->upload->display_errors();
//            echo '0';
//        } else {
////            $data = array('upload_data' => $this->upload->data());
////
////            $this->load->view('upload_success', $data);
//            echo '1';
//            
//            
//        }
    }

}
