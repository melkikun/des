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
        $this->load->library('peramalan');
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
    }

    public function prosesData() {
        $data1 = $this->input->get("data1");
        $data2 = $this->input->get("data2");
        $alpha01 = $this->peramalan->hitung(0.1, $data1);
        $alpha02 = $this->peramalan->hitung(0.2, $data1);
        $alpha03 = $this->peramalan->hitung(0.3, $data1);
        $alpha04 = $this->peramalan->hitung(0.4, $data1);
        $alpha05 = $this->peramalan->hitung(0.5, $data1);
        $alpha06 = $this->peramalan->hitung(0.6, $data1);
        $alpha07 = $this->peramalan->hitung(0.7, $data1);
        $alpha08 = $this->peramalan->hitung(0.8, $data1);
        $alpha09 = $this->peramalan->hitung(0.9, $data1);
        $mape = [$alpha01['mape'], $alpha02['mape'], $alpha03['mape'], $alpha04['mape'], $alpha05['mape'], $alpha06['mape'], $alpha07['mape'], $alpha08['mape'], $alpha09['mape']];
        $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $next = [
            $alpha01['a'][11] + $alpha01['b'][11],
            $alpha02['a'][11] + $alpha01['b'][11],
            $alpha03['a'][11] + $alpha01['b'][11],
            $alpha04['a'][11] + $alpha01['b'][11],
            $alpha05['a'][11] + $alpha01['b'][11],
            $alpha06['a'][11] + $alpha01['b'][11],
            $alpha07['a'][11] + $alpha01['b'][11],
            $alpha08['a'][11] + $alpha01['b'][11],
            $alpha09['a'][11] + $alpha01['b'][11],
        ];
        $terkecil = 9999999999999;
        $index = "";
        for ($i = 0; $i < count($mape); $i++) {
            if ($mape[$i] < $terkecil) {
                $terkecil = $mape[$i];
                $index = $next[$i];
            }
        }
        $return = array(
            "error" => "0",
            "data1" => $data1,
            "data2" => $data2,
            "bulan" => $bulan,
            "mape" => $terkecil,
            "next" => $index,
            "data" => array(
                "alpha01" => $alpha01,
                "alpha02" => $alpha02,
                "alpha03" => $alpha03,
                "alpha04" => $alpha04,
                "alpha05" => $alpha05,
                "alpha06" => $alpha06,
                "alpha07" => $alpha07,
                "alpha08" => $alpha08,
                "alpha09" => $alpha09
            )
        );
//        echo json_encode($return, JSON_PRETTY_PRINT);
//        exit();
        echo $this->load->view("halo", $return, TRUE);
    }

}
