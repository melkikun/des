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
        $pasal = $this->input->post("pasal");
        $tahun = $this->input->post("tahun");
        $pertama = $_FILES['pertama']['name'];
        $extPertama = pathinfo($pertama, PATHINFO_EXTENSION);
        $kedua = $_FILES['kedua']['name'];
        $extKedua = pathinfo($kedua, PATHINFO_EXTENSION);

        if ($pasal == "") {
            echo json_encode(array("error" => "1", "message" => "pasal harus diisi"));
        } else if ($tahun == "") {
            echo json_encode(array("error" => "1", "message" => "tahun harus diisi"));
        } else if ($pertama == null) {
            echo json_encode(array("error" => "1", "message" => "file pertama harus diisi atau file pertama harus excel"));
        } else if ($kedua == null) {
            echo json_encode(array("error" => "1", "message" => "file pertama harus diisi atau file pertama harus excel"));
        } else {
            $array1 = array();
            $array2 = array();
            $file1 = $_FILES['pertama']['tmp_name'];
            $file2 = $_FILES['kedua']['tmp_name'];
            if (file_exists($file1) && file_exists($file2)) {
                $excelReader = PHPExcel_IOFactory::createReaderForFile($file1);
                $excelObj = $excelReader->load($file1);
                $worksheet = $excelObj->getSheet(0);
                $lastRow = $worksheet->getHighestRow();
                for ($row = 2; $row <= $lastRow; $row++) {
                    array_push($array1, $worksheet->getCell('B' . $row)->getValue());
                }
                
                $excelReader = PHPExcel_IOFactory::createReaderForFile($file2);
                $excelObj = $excelReader->load($file2);
                $worksheet = $excelObj->getSheet(0);
                $lastRow = $worksheet->getHighestRow();
                for ($row = 2; $row <= $lastRow; $row++) {
                    array_push($array2, $worksheet->getCell('B' . $row)->getValue());
                }
                $input = array(
                    "error" => 0,
                    "file1" => $array1,
                    "file2" => $array2
                );
                echo json_encode($input);
            } else {
                echo 'tidak ada file';
            }
        }
        
//        function

//        echo $pasal.$tahun;
////        untuk upload file
//        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = 'xls|xlsx';
//        $config['file_ext_tolower'] = 'xls';
//        $config['file_name'] = uniqid();
////        config upload file
//        $this->load->library('upload', $config);
////        Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
//        $this->upload->initialize($config);
//        if (!$this->upload->do_upload('excel')) {
//            echo 0;
//        } else {
//            $tmpfname = "./uploads/" . $config['file_name'] . ".xlsx";
//            if (file_exists($tmpfname)) {
//                $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
//                $excelObj = $excelReader->load($tmpfname);
//                $worksheet = $excelObj->getSheet(0);
//                $lastRow = $worksheet->getHighestRow();
//
//                echo "<table>";
//                for ($row = 1; $row <= $lastRow; $row++) {
//                    echo "<tr><td>";
//                    echo $worksheet->getCell('B' . $row)->getValue();
//                    echo "</td><tr>";
//                }
//                echo "</table>";
//            }else{
//                echo 'tidak ada file';
//            }
//        }
    }

}
