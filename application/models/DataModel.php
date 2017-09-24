<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class DataModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function simpanData($param) {
        // menampung data ke dalam array pada saat insert
        $response = array();
        //ambil data pasal
        $pasal = $param['pasal'];
        //ambil data tahun
        $tahun = $param['tahun'];
        //ambil data file 1
        $tahun1 = $param['file1'];
        //ambil data file 2
        $tahun2 = $param['file2'];
        //ambil data id
        $id = $param['id'];
        //memanggil fungsi cek duplikat pasal dan tahun
        $cek = $this->cekDuplikat($pasal, $tahun);
        //jika ada maka delete
        if ($cek > 0) {
            //delete untuk pasal dan tahun sesuai parameter
            $this->db->where('pasal_pelanggaran', $pasal);
            $this->db->delete('pasal');
        }
        $tabel_pasal = array(
            //jika tidak ada langsung insert ke database
            "tahun_pelanggaran" => $tahun,
            "pasal_pelanggaran" => $pasal,
            "id_user" => $id
        );
        //operasi insert
        $insert_pasal = $this->db->insert('pasal', $tabel_pasal);
        //insert ke tabel pasal dan jika berhasil response insert push ke 1
        if ($insert_pasal == 1) {
            array_push($response, $insert_pasal);
            //ambil last insert
            $insert_id = $this->db->insert_id();
            for ($i = 0; $i < count($tahun1); $i++) {
                //insert perulangan mulai januari sampe desember
                $table_data_pasal = array(
                    "tahun_pertama" => $tahun1[$i],
                    "tahun_kedua" => $tahun2[$i],
                    "id_pasal" => $insert_id
                );
                $insert_data_pasal = $this->db->insert("data_pasal", $table_data_pasal);
                array_push($response, $insert_data_pasal);
            }
        } else {
            array_push($response, $insert_pasal);
        }
        return($response);
    }

    //fungsi untuk cek apakah pasal dan tahun sudah ada pada database
    function cekDuplikat($pasal, $tahun) {
        //cek di database apakah ada pasal & tahun sesuai dengan parameter
        $this->db->select("id")->from("pasal")->where("tahun_pelanggaran", $tahun)->where("pasal_pelanggaran", $pasal);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function ambilData() {
        //ambil data dari tabel pasal diurutkan berdasarkan tahun pelanggaran
        $this->db->select("*")->from("pasal")->order_by("tahun_pelanggaran", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function ambilDetailData($id) {
        //ambil semua data pada pasal dan detaiil pasal menggunakan fungsi join 
        $this->db->select('p.id, p.pasal_pelanggaran, p.tahun_pelanggaran, p.id_user, dp.tahun_pertama, dp.tahun_kedua');
        $this->db->from('pasal p');
        $this->db->join('data_pasal dp', 'dp.id_pasal=p.id');
        $this->db->where('p.id', $id);
        $query = $this->db->get(); 
        return $query->result_array();
    }

}
