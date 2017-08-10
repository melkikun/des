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
        $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $data1 = $this->input->get("data1");
        $data2 = $this->input->get("data2");
        $s1 = array();
        $s2 = array();
        $at = array();
        $bt = array();
        $peramalan = array();
        $error = array();
        $absolute = array();
        for ($alpha = 0.1, $index = 0; $alpha <= 0.9; $alpha += 0.1, $index++) {
            $s1[$index] = $this->peramalan->sAksen($alpha, $data1);
            $s2[$index] = $this->peramalan->sDoubleAksen($alpha, $s1[$index]);
            $at[$index] = $this->peramalan->konstantaA($s1[$index], $s2[$index]);
            $bt[$index] = $this->peramalan->konstantaB($alpha, $s1[$index], $s2[$index]);
            $peramalan[$index] = $this->peramalan->peramalan($at[$index], $bt[$index]);
            $error[$index] = $this->peramalan->error($data1, $peramalan[$index]);
            $absolute[$index] = $this->peramalan->absoluteError($error[$index]);
        }

        $mapeTerkecil = 99999999999;
        $mapeIndex = 0;
        $alpha = 0;
        for ($i = 0, $x = 0.1; $i < count($absolute); $i++, $x += 0.1) {
            if ($mapeTerkecil > (array_sum($absolute[$i]) / 12)) {
                $mapeTerkecil = (array_sum($absolute[$i]) / 12);
                $mapeIndex = $i;
                $alpha = $x;
            }
        }
        $s1Peramalan = $this->peramalan->sAksen($alpha, array_merge($data1, $data2));
        $s2Peramalan = $this->peramalan->sDoubleAksen($alpha, $s1Peramalan);
        $atPeramalan = $this->peramalan->konstantaA($s1Peramalan, $s2Peramalan);
        $btPeramalan = $this->peramalan->konstantaB($alpha, $s1Peramalan, $s2Peramalan);
        $peramalanPeramalan = $this->peramalan->peramalan($atPeramalan, $btPeramalan);
        $errorPeramalan = $this->peramalan->error(array_merge($data1, $data2), $peramalanPeramalan);
        $absolutePeramalan = $this->peramalan->absoluteError($errorPeramalan);
        $nextPeramalan = array(
            "s1Peramalan" => $s1Peramalan,
            "s2Peramalan" => $s2Peramalan,
            "atPeramalan" => $atPeramalan,
            "btPeramalan" => $btPeramalan,
            "peramalanPeramalan" => $peramalanPeramalan,
            "errorPeramalan" => $errorPeramalan,
            "absolutePeramalan" => $absolutePeramalan,
        );


        $return = array(
            "s1" => $s1,
            "s2" => $s2,
            "at" => $at,
            "bt" => $bt,
            "peramalan" => $peramalan,
            "error" => $error,
            "absolute" => $absolute,
            "index" => $mapeIndex,
            "bulan" => $bulan,
            "data1" => $data1,
            "data2" => $data2,
            "nextPeramalan" => $nextPeramalan,
            "alphax" => $alpha
        );

        echo $this->load->view('halo', $return, FALSE);
    }

}
