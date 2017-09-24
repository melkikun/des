<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class UserModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    //insert ke tabel user
    function registerUser($param) {
        $insert = $this->db->insert("users", $param);
        return $insert;
    }

    //cek duplikat apakah username sudah ada apa tidak di table user
    function cekDuplikatUserRegister($username) {
        $this->db->select("username")->from("users")->where("username", $username);
        $duplikat = $this->db->get();
        return $duplikat;
    }

    //fungsi login pada user
    function loginUser($param) {
        $query = $this->db->get_where('users', $param);
        return $query;
    }

}
