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

    public function hitung($alpha, $data) {
        $s1 = array();
        $s2 = array();
        $a = array();
        $b = array();
        $peramalan = array();
        $error = array();
        $errorAbsolute = array();
        $totalErrorAbsolute = 0;

        $s1aksen = $alpha * $data[0] + (1 - $alpha) * $data[0];
        $s2aksen = $alpha * $data[1] + (1 - $alpha) * $s1aksen;
        $s3aksen = $alpha * $data[2] + (1 - $alpha) * $s2aksen;
        $s4aksen = $alpha * $data[3] + (1 - $alpha) * $s3aksen;
        $s5aksen = $alpha * $data[4] + (1 - $alpha) * $s4aksen;
        $s6aksen = $alpha * $data[5] + (1 - $alpha) * $s5aksen;
        $s7aksen = $alpha * $data[6] + (1 - $alpha) * $s6aksen;
        $s8aksen = $alpha * $data[7] + (1 - $alpha) * $s7aksen;
        $s9aksen = $alpha * $data[8] + (1 - $alpha) * $s8aksen;
        $s10aksen = $alpha * $data[9] + (1 - $alpha) * $s9aksen;
        $s11aksen = $alpha * $data[10] + (1 - $alpha) * $s10aksen;
        $s12aksen = $alpha * $data[11] + (1 - $alpha) * $s11aksen;

        array_push($s1, $s1aksen);
        array_push($s1, $s2aksen);
        array_push($s1, $s3aksen);
        array_push($s1, $s4aksen);
        array_push($s1, $s5aksen);
        array_push($s1, $s6aksen);
        array_push($s1, $s7aksen);
        array_push($s1, $s8aksen);
        array_push($s1, $s9aksen);
        array_push($s1, $s10aksen);
        array_push($s1, $s11aksen);
        array_push($s1, $s12aksen);

        $s1double = $alpha * $s1aksen + (1 - $alpha) * $data[0];
        $s2double = $alpha * $s2aksen + (1 - $alpha) * $s1double;
        $s3double = $alpha * $s3aksen + (1 - $alpha) * $s2double;
        $s4double = $alpha * $s4aksen + (1 - $alpha) * $s3double;
        $s5double = $alpha * $s5aksen + (1 - $alpha) * $s4double;
        $s6double = $alpha * $s6aksen + (1 - $alpha) * $s5double;
        $s7double = $alpha * $s7aksen + (1 - $alpha) * $s6double;
        $s8double = $alpha * $s8aksen + (1 - $alpha) * $s7double;
        $s9double = $alpha * $s9aksen + (1 - $alpha) * $s8double;
        $s10double = $alpha * $s10aksen + (1 - $alpha) * $s9double;
        $s11double = $alpha * $s11aksen + (1 - $alpha) * $s10double;
        $s12double = $alpha * $s12aksen + (1 - $alpha) * $s11double;

        array_push($s2, $s1double);
        array_push($s2, $s2double);
        array_push($s2, $s3double);
        array_push($s2, $s4double);
        array_push($s2, $s5double);
        array_push($s2, $s6double);
        array_push($s2, $s7double);
        array_push($s2, $s8double);
        array_push($s2, $s9double);
        array_push($s2, $s10double);
        array_push($s2, $s11double);
        array_push($s2, $s12double);


        $a1 = 2 * $s1aksen - $s1double;
        $a2 = 2 * $s2aksen - $s2double;
        $a3 = 2 * $s3aksen - $s3double;
        $a4 = 2 * $s4aksen - $s4double;
        $a5 = 2 * $s5aksen - $s5double;
        $a6 = 2 * $s6aksen - $s6double;
        $a7 = 2 * $s7aksen - $s7double;
        $a8 = 2 * $s8aksen - $s8double;
        $a9 = 2 * $s9aksen - $s9double;
        $a10 = 2 * $s10aksen - $s10double;
        $a11 = 2 * $s11aksen - $s11double;
        $a12 = 2 * $s12aksen - $s12double;


        array_push($a, $a1);
        array_push($a, $a2);
        array_push($a, $a3);
        array_push($a, $a4);
        array_push($a, $a5);
        array_push($a, $a6);
        array_push($a, $a7);
        array_push($a, $a8);
        array_push($a, $a9);
        array_push($a, $a10);
        array_push($a, $a11);
        array_push($a, $a12);


        $b1 = $alpha / (1 - $alpha) * ($s1aksen - $s1double);
        $b2 = $alpha / (1 - $alpha) * ($s2aksen - $s2double);
        $b3 = $alpha / (1 - $alpha) * ($s3aksen - $s3double);
        $b4 = $alpha / (1 - $alpha) * ($s4aksen - $s4double);
        $b5 = $alpha / (1 - $alpha) * ($s5aksen - $s5double);
        $b6 = $alpha / (1 - $alpha) * ($s6aksen - $s6double);
        $b7 = $alpha / (1 - $alpha) * ($s7aksen - $s7double);
        $b8 = $alpha / (1 - $alpha) * ($s8aksen - $s8double);
        $b9 = $alpha / (1 - $alpha) * ($s9aksen - $s9double);
        $b10 = $alpha / (1 - $alpha) * ($s10aksen - $s10double);
        $b11 = $alpha / (1 - $alpha) * ($s11aksen - $s11double);
        $b12 = $alpha / (1 - $alpha) * ($s12aksen - $s12double);

        array_push($b, $b1);
        array_push($b, $b2);
        array_push($b, $b3);
        array_push($b, $b4);
        array_push($b, $b5);
        array_push($b, $b6);
        array_push($b, $b7);
        array_push($b, $b8);
        array_push($b, $b9);
        array_push($b, $b10);
        array_push($b, $b11);
        array_push($b, $b12);

        $peramalan1 = 0;
        $peramalan2 = $a1 + $b1;
        $peramalan3 = $a2 + $b2;
        $peramalan4 = $a3 + $b3;
        $peramalan5 = $a4 + $b4;
        $peramalan6 = $a5 + $b5;
        $peramalan7 = $a6 + $b6;
        $peramalan8 = $a7 + $b7;
        $peramalan9 = $a8 + $b8;
        $peramalan10 = $a9 + $b9;
        $peramalan11 = $a10 + $b10;
        $peramalan12 = $a11 + $b11;

        array_push($peramalan, $peramalan1);
        array_push($peramalan, $peramalan2);
        array_push($peramalan, $peramalan3);
        array_push($peramalan, $peramalan4);
        array_push($peramalan, $peramalan5);
        array_push($peramalan, $peramalan6);
        array_push($peramalan, $peramalan7);
        array_push($peramalan, $peramalan8);
        array_push($peramalan, $peramalan9);
        array_push($peramalan, $peramalan10);
        array_push($peramalan, $peramalan11);
        array_push($peramalan, $peramalan12);

        $error1 = 0;
        $error2 = ($data[1] - $peramalan2) / $data[1] * 100;
        $error3 = ($data[2] - $peramalan3) / $data[2] * 100;
        $error4 = ($data[3] - $peramalan4) / $data[3] * 100;
        $error5 = ($data[4] - $peramalan5) / $data[4] * 100;
        $error6 = ($data[5] - $peramalan6) / $data[5] * 100;
        $error7 = ($data[6] - $peramalan7) / $data[6] * 100;
        $error8 = ($data[7] - $peramalan8) / $data[7] * 100;
        $error9 = ($data[8] - $peramalan9) / $data[8] * 100;
        $error10 = ($data[9] - $peramalan10) / $data[9] * 100;
        $error11 = ($data[10] - $peramalan11) / $data[10] * 100;
        $error12 = ($data[11] - $peramalan12) / $data[11] * 100;


        array_push($error, $error1);
        array_push($error, $error2);
        array_push($error, $error3);
        array_push($error, $error4);
        array_push($error, $error5);
        array_push($error, $error6);
        array_push($error, $error7);
        array_push($error, $error8);
        array_push($error, $error9);
        array_push($error, $error10);
        array_push($error, $error11);
        array_push($error, $error12);


        array_push($errorAbsolute, abs($error1));
        array_push($errorAbsolute, abs($error2));
        array_push($errorAbsolute, abs($error3));
        array_push($errorAbsolute, abs($error4));
        array_push($errorAbsolute, abs($error5));
        array_push($errorAbsolute, abs($error6));
        array_push($errorAbsolute, abs($error7));
        array_push($errorAbsolute, abs($error8));
        array_push($errorAbsolute, abs($error9));
        array_push($errorAbsolute, abs($error10));
        array_push($errorAbsolute, abs($error11));
        array_push($errorAbsolute, abs($error12));


        for ($i = 0; $i < count($errorAbsolute); $i++) {
            $totalErrorAbsolute += $errorAbsolute[$i];
        }

        $array = array(
            "alpha" => $alpha,
            "s1" => $s1,
            "s2" => $s2,
            "a" => $a,
            "b" => $b,
            "peramalan" => $peramalan,
            "error" => $error,
            "absolute" => $errorAbsolute,
            "totalAbsolute" => $totalErrorAbsolute,
            "mape" => $totalErrorAbsolute / 12
        );
        return $array;
    }

}
