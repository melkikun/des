<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Peramalan
 *
 * @author IT01
 */
class Peramalan {

    var $ci;

    public function __construct() {
        $ci = &get_instance();
    }
    
    public function sAksen($alpha, $data) {
        $saksen = array();
        $saksen[0] = $data[0];
        for ($i = 1; $i < count($data); $i++) {
            $saksen[$i] = number_format($alpha * $data[$i] + (1 - $alpha) * $saksen[$i - 1], 2);
        }
        return $saksen;
    }

    public function sDoubleAksen($alpha, $data) {
        $sDoubleAksen = array();
        $sDoubleAksen[0] = $data[0];
        for ($i = 1; $i < count($data); $i++) {
            $sDoubleAksen[$i] = number_format($alpha * $data[$i] + (1 - $alpha) * $sDoubleAksen[$i - 1], 2);
        }
        return $sDoubleAksen;
    }

    public function konstantaA($sAksen, $sDoubleAksen) {
        $a = array();
        for ($i = 0; $i < count($sAksen); $i++) {
            $a[$i] = number_format(2 * $sAksen[$i] - $sDoubleAksen[$i],2);
        }
        return $a;
    }

    public function konstantaB($alpha, $sAksen, $sDoubleAksen) {
        $b = array();
        for ($i = 0; $i < count($sAksen); $i++) {
            $b[$i] = number_format($alpha/(1-$alpha)*( $sAksen[$i] - $sDoubleAksen[$i]),2);
        }
        return $b;
    }
    
    public function peramalan($a, $b){
        $peramalan = array();
        $peramalan[0] = 0;
        for($i = 1; $i < count($a); $i++){
            $peramalan[$i] =  number_format($a[$i-1]+$b[$i-1],2);
        }
        return $peramalan;
    }
    
    public function error($data, $peramalan){
        $error = array();
        $error[0] = 0;
        for($i = 1; $i < count($data); $i++){
            $error[$i] =  number_format(($data[$i]-$peramalan[$i])/$data[$i]*100,2);
        }
        return $error;
    }
    
    public function absoluteError($error){
        $absolute = array();
        for($i = 0; $i < count($error); $i++){
            $absolute[$i] =  abs($error[$i]);
        }
        return $absolute;
    }

}
