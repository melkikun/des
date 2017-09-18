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
        $response = array();
        $pasal = $param['pasal'];
        $tahun = $param['tahun'];
        $tahun1 = $param['file1'];
        $tahun2 = $param['file2'];
        $id = $param['id'];
        $cek = $this->cekDuplikat($pasal, $tahun);
        if ($cek > 0) {
            $this->db->where('pasal_pelanggaran', $pasal);
            $this->db->delete('pasal');
        }
        $tabel_pasal = array(
            "tahun_pelanggaran" => $tahun,
            "pasal_pelanggaran" => $pasal,
            "id_user" => $id
        );

        $insert_pasal = $this->db->insert('pasal', $tabel_pasal);
        if ($insert_pasal == 1) {
            array_push($response, $insert_pasal);
            $insert_id = $this->db->insert_id();
            for ($i = 0; $i < count($tahun1); $i++) {
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

    function cekDuplikat($pasal, $tahun) {
        $this->db->select("id")->from("pasal")->where("tahun_pelanggaran", $tahun)->where("pasal_pelanggaran", $pasal);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function ambilData() {
        $this->db->select("*")->from("pasal")->order_by("tahun_pelanggaran", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function ambilDetailData($id) {
        $this->db->select('p.id, p.pasal_pelanggaran, p.tahun_pelanggaran, p.id_user, dp.tahun_pertama, dp.tahun_kedua');
        $this->db->from('pasal p');
        $this->db->join('data_pasal dp', 'dp.id_pasal=p.id');
        $this->db->where('p.id', $id);
        $query = $this->db->get(); 
        return $query->result_array();
    }

}
