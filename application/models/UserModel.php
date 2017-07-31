<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class UserModel extends CI_Model
{
	
	function __construct(){ 
		parent::__construct();
	}

	function registerUser($param){
		$insert = $this->db->insert("users", $param);
		return $insert;
	}

	function cekDuplikatUserRegister($username){
		$duplikat = $this->db->get("users");
		return $duplikat;
	}

	function loginUser($param){
		$query = $this->db->get_where('users', $param);
		return $query;
	}
}