<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class ProcessController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //inisialisasi helper form dan url
        $this->load->helper(array('form', 'url'));
        //ambil library excel
        $this->load->library('excel');
        //ambil library peramalan
        $this->load->library('peramalan');
//        ambil model datamodel
        $this->load->model("DataModel");
    }

    public function index() {
        $this->load->view('upload_form', array('error' => ' '));
    }

    public function getData() {
        //ambil data dari input pasal
        $pasal = $this->input->post("pasal");
        //ambil data dari input tahun
        $tahun = $this->input->post("tahun");
        //ambil data dari input excel pertama
        $pertama = $_FILES['pertama']['name'];
        $extPertama = pathinfo($pertama, PATHINFO_EXTENSION);
        //ambil data dari input excel kedua
        $kedua = $_FILES['kedua']['name'];
        $extKedua = pathinfo($kedua, PATHINFO_EXTENSION);

        //tampilkan error jika pasal kosong
        if ($pasal == "") {
            echo json_encode(array("error" => "1", "message" => "pasal harus diisi"));
            //tampilkan error jika tahun kosong
        } else if ($tahun == "") {
            echo json_encode(array("error" => "1", "message" => "tahun harus diisi"));
            //tampilkan error jika  excel 1 kosong
        } else if ($pertama == null) {
            echo json_encode(array("error" => "1", "message" => "file pertama harus diisi atau file pertama harus excel"));
            //tampilkan error jika excel 2 kosong
        } else if ($kedua == null) {
            echo json_encode(array("error" => "1", "message" => "file pertama harus diisi atau file pertama harus excel"));
        } else {
            //menampung data excel 1 dan excel 2 ke array
            $array1 = array();
            $array2 = array();
            //ambil data excel 1 dan excel 2 
            $file1 = $_FILES['pertama']['tmp_name'];
            $file2 = $_FILES['kedua']['tmp_name'];
            if (file_exists($file1) && file_exists($file2)) {
                //jika file exist makan di lakukan pembacaaan data dari excel
                $excelReader = PHPExcel_IOFactory::createReaderForFile($file1);
                $excelObj = $excelReader->load($file1);
                $worksheet = $excelObj->getSheet(0);
                $lastRow = $worksheet->getHighestRow();
                for ($row = 2; $row <= $lastRow; $row++) {
                    //membaca pada kolom b
                    array_push($array1, $worksheet->getCell('B' . $row)->getValue());
                }

                $excelReader = PHPExcel_IOFactory::createReaderForFile($file2);
                $excelObj = $excelReader->load($file2);
                $worksheet = $excelObj->getSheet(0);
                $lastRow = $worksheet->getHighestRow();
                for ($row = 2; $row <= $lastRow; $row++) {
                    //membaca pada kolom b
                    array_push($array2, $worksheet->getCell('B' . $row)->getValue());
                }
//                tampung data ke dalam array input
                $input = array(
                    "error" => 0,
                    "file1" => $array1,
                    "file2" => $array2
                );
                //print ke output
                echo json_encode($input);
            } else {
                echo 'tidak ada file';
            }
        }
    }

    //proses perhitungan des
    public function prosesData() {
        //inisialisasi ke 12 bulan
        $bulan = [
            "Januari 2014",
            "Februari 2014",
            "Maret 2014",
            "April 2014",
            "Mei 2014",
            "Juni 2014",
            "Juli 2014",
            "Agustus 2014",
            "September 2014",
            "Oktober 2014",
            "November 2014",
            "Desember 2014",
            "Januari 2015",
            "Februari 2015",
            "Maret 2015",
            "April 2015",
            "Mei 2015",
            "Juni 2015",
            "Juli 2015",
            "Agustus 2015",
            "September 2015",
            "Oktober 2015",
            "November 2015",
            "Desember 2015"
        ];
        //ambil data 1 berupa excel 1
        $data1 = $this->input->get("data1");
        //ambil data 2 berupa excel 2
        $data2 = $this->input->get("data2");
        //tampung data perhitungan s1
        $s1 = array();
        //tampung data perhitungan s2
        $s2 = array();
        //tampung data perhitungan alpa
        $at = array();
        //tampung data perhitungan beta
        $bt = array();
        //tampung data perhitungan peramalan
        $peramalan = array();
        //tampung data perhitungan error
        $error = array();
        //tampung data perhitungan absolute
        $absolute = array();
        //memulai perhitungan dengan alha 0.1 sampai alpha 0.9
        for ($alpha = 0.1, $index = 0; $alpha <= 0.9; $alpha += 0.1, $index++) {
            //tampung nilai s1
            $s1[$index] = $this->peramalan->sAksen($alpha, $data1);
            //tampung nilai s2
            $s2[$index] = $this->peramalan->sDoubleAksen($alpha, $s1[$index]);
            //tampung nilai alpha
            $at[$index] = $this->peramalan->konstantaA($s1[$index], $s2[$index]);
            //tampung nilai beta
            $bt[$index] = $this->peramalan->konstantaB($alpha, $s1[$index], $s2[$index]);
            //tampung nilai peramalan
            $peramalan[$index] = $this->peramalan->peramalan($at[$index], $bt[$index]);
            //tampung nilai error
            $error[$index] = $this->peramalan->error($data1, $peramalan[$index]);
            //tampung nilai absolute
            $absolute[$index] = $this->peramalan->absoluteError($error[$index]);
        }
        
        
        
        //semua perhitungan 
        $s1All = array();
        //tampung data perhitungan s2
        $s2All = array();
        //tampung data perhitungan alpa
        $atAll = array();
        //tampung data perhitungan beta
        $btAll = array();
        //tampung data perhitungan peramalan
        $peramalanAll = array();
        //tampung data perhitungan error
        $errorAll = array();
        //tampung data perhitungan absolute
        $absoluteAll = array();
        //memulai perhitungan dengan alha 0.1 sampai alpha 0.9
        for ($alpha = 0.1, $index = 0; $alpha <= 0.9; $alpha += 0.1, $index++) {
            //tampung nilai s1
            $s1All[$index] = $this->peramalan->sAksen($alpha, array_merge($data1, $data2));
            //tampung nilai s2
            $s2All[$index] = $this->peramalan->sDoubleAksen($alpha, $s1All[$index]);
            //tampung nilai alpha
            $atAll[$index] = $this->peramalan->konstantaA($s1All[$index], $s2All[$index]);
            //tampung nilai beta
            $btAll[$index] = $this->peramalan->konstantaB($alpha, $s1All[$index], $s2All[$index]);
            //tampung nilai peramalan
            $peramalanAll[$index] = $this->peramalan->peramalan($atAll[$index], $btAll[$index]);
            //tampung nilai error
            $errorAll[$index] = $this->peramalan->error(array_merge($data1, $data2), $peramalanAll[$index]);
            //tampung nilai absolute
            $absoluteAll[$index] = $this->peramalan->absoluteError($errorAll[$index]);
        }

        $all = array(
            "s1All" => $s1All,
            "s2All" => $s2All,
            "atAll" => $atAll,
            "btAll" => $btAll,
            "peramalanAll" => $peramalanAll,
            "errorAll" => $errorAll,
            "absoluteAll" => $absoluteAll,
        );

        //mencari mape terkecil
        $mapeTerkecil = 99999999999;
        //inisialisasi mape index terkecil
        $mapeIndex = 0;
        //inisialisasi mape pada index terkecil
        $alpha = 0;
        //perhitungan alpha index terkecil
        for ($i = 0, $x = 0.1; $i < count($absolute); $i++, $x += 0.1) {
            if ($mapeTerkecil > (array_sum($absolute[$i]) / count($data1))) {
                $mapeTerkecil = (array_sum($absolute[$i]) / count($data1));
                $mapeIndex = $i;
                $alpha = $x;
            }
        }
        //tampung data s1peramalan
        $s1Peramalan = $this->peramalan->sAksen($alpha, array_merge($data1, $data2));
        //tampung data s2peramalan
        $s2Peramalan = $this->peramalan->sDoubleAksen($alpha, $s1Peramalan);
        //tampung data alpha peramalan
        $atPeramalan = $this->peramalan->konstantaA($s1Peramalan, $s2Peramalan);
        //tampung data beta peramalan
        $btPeramalan = $this->peramalan->konstantaB($alpha, $s1Peramalan, $s2Peramalan);
        //tampung data peramalan
        $peramalanPeramalan = $this->peramalan->peramalan($atPeramalan, $btPeramalan);
        //tampung data error peramalan
        $errorPeramalan = $this->peramalan->error(array_merge($data1, $data2), $peramalanPeramalan);
        //tampung data absolute peramalan
        $absolutePeramalan = $this->peramalan->absoluteError($errorPeramalan);
        //menampung semua data peramalan bulan dan tahun setelahnya
        $nextPeramalan = array(
            "s1Peramalan" => $s1Peramalan,
            "s2Peramalan" => $s2Peramalan,
            "atPeramalan" => $atPeramalan,
            "btPeramalan" => $btPeramalan,
            "peramalanPeramalan" => $peramalanPeramalan,
            "errorPeramalan" => $errorPeramalan,
            "absolutePeramalan" => $absolutePeramalan,
        );

        //semua data di tampung pada array ini
        $return = array(
            "s1" => $s1,
            "s2" => $s2,
            "at" => $at,
            "bt" => $bt,
            "peramalan" => $peramalan,
            "error" => $error,
            "absolute" => $absolute,
            "mape_index" => $mapeIndex,
            "bulan" => $bulan,
            "data1" => $data1,
            "data2" => $data2,
            "nextPeramalan" => $nextPeramalan,
            "alphax" => $alpha,
            "all"=>$all
        );
        
        echo $this->load->view('hasil', $return, FALSE);
    }

    public function simpanData() {
        //proses penyimpanan data
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
                    "pasal" => $pasal,
                    "tahun" => $tahun,
                    "file1" => $array1,
                    "file2" => $array2,
                    "id" => $_SESSION['logged_in']['id']
                );
                $response_simpan = $this->DataModel->simpanData($input);
                $gagal = in_array(false, $response_simpan);
                if ($gagal == FALSE) {
                    echo json_encode(1);
                } else {
                    echo json_encode(0);
                }
            } else {
                echo json_encode(0);
            }
        }
    }

    public function lihatData($id) {
        $data = $this->DataModel->ambilDetailData($id);
        $sidebar = $this->load->view('template/sidebar', '', TRUE);
        $header = $this->load->view('template/header', '', TRUE);
        $footer = $this->load->view('template/footer', '', TRUE);
        $this->load->view('lihat_detail_data', compact('sidebar', 'header', 'footer', 'data'));
    }

}
