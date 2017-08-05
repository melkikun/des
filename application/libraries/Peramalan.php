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
    private $s1 = array();
    private $s2 = array();
    private $a = array();
    private $b = array();
    private $s1aksen = "";
    private $s2aksen = "";
    private $s3aksen = "";
    private $s4aksen = "";
    private $s5aksen = "";
    private $s6aksen = "";
    private $s7aksen = "";
    private $s8aksen = "";
    private $s9aksen = "";
    private $s10aksen = "";
    private $s11aksen = "";
    private $s12aksen = "";
    private $s1double = "";
    private $s2double = "";
    private $s3double = "";
    private $s4double = "";
    private $s5double = "";
    private $s6double = "";
    private $s7double = "";
    private $s8double = "";
    private $s9double = "";
    private $s10double = "";
    private $s11double = "";
    private $s12double = "";
    private $a1 = "";
    private $a2 = "";
    private $a3 = "";
    private $a4 = "";
    private $a5 = "";
    private $a6 = "";
    private $a7 = "";
    private $a8 = "";
    private $a9 = "";
    private $a10 = "";
    private $a11 = "";
    private $a12 = "";
    private $b1 = "";
    private $b2 = "";
    private $b3 = "";
    private $b4 = "";
    private $b5 = "";
    private $b6 = "";
    private $b7 = "";
    private $b8 = "";
    private $b9 = "";
    private $b10 = "";
    private $b11 = "";
    private $b12 = "";

    public function __construct() {
        $this->ci = &get_instance();
    }

    public function hitung($alpha, $data) {
        $this->s1aksen = $alpha * $data[0] + (1 - $alpha) * $data[0];
        $this->s2aksen = $alpha * $data[1] + (1 - $alpha) * $this->s1aksen;
        $this->s3aksen = $alpha * $data[2] + (1 - $alpha) * $this->s2aksen;
        $this->s4aksen = $alpha * $data[3] + (1 - $alpha) * $this->s3aksen;
        $this->s5aksen = $alpha * $data[4] + (1 - $alpha) * $this->s4aksen;
        $this->s6aksen = $alpha * $data[5] + (1 - $alpha) * $this->s5aksen;
        $this->s7aksen = $alpha * $data[6] + (1 - $alpha) * $this->s6aksen;
        $this->s8aksen = $alpha * $data[7] + (1 - $alpha) * $this->s7aksen;
        $this->s9aksen = $alpha * $data[8] + (1 - $alpha) * $this->s8aksen;
        $this->s10aksen = $alpha * $data[9] + (1 - $alpha) * $this->s9aksen;
        $this->s11aksen = $alpha * $data[10] + (1 - $alpha) * $this->s10aksen;
        $this->s12aksen = $alpha * $data[11] + (1 - $alpha) * $this->s11aksen;
        array_push($this->s1, number_format($this->s1aksen, 2));
        array_push($this->s1, number_format($this->s2aksen, 2));
        array_push($this->s1, number_format($this->s3aksen, 2));
        array_push($this->s1, number_format($this->s4aksen, 2));
        array_push($this->s1, number_format($this->s5aksen, 2));
        array_push($this->s1, number_format($this->s6aksen, 2));
        array_push($this->s1, number_format($this->s7aksen, 2));
        array_push($this->s1, number_format($this->s8aksen, 2));
        array_push($this->s1, number_format($this->s9aksen, 2));
        array_push($this->s1, number_format($this->s10aksen, 2));
        array_push($this->s1, number_format($this->s11aksen, 2));
        array_push($this->s1, number_format($this->s12aksen, 2));

        $this->s1double = $alpha * $this->s1aksen + (1 - $alpha) * $data[0];
        $this->s2double = $alpha * $this->s2aksen + (1 - $alpha) * $this->s1double;
        $this->s3double = $alpha * $this->s3aksen + (1 - $alpha) * $this->s2double;
        $this->s4double = $alpha * $this->s4aksen + (1 - $alpha) * $this->s3double;
        $this->s5double = $alpha * $this->s5aksen + (1 - $alpha) * $this->s4double;
        $this->s6double = $alpha * $this->s6aksen + (1 - $alpha) * $this->s5double;
        $this->s7double = $alpha * $this->s7aksen + (1 - $alpha) * $this->s6double;
        $this->s8double = $alpha * $this->s8aksen + (1 - $alpha) * $this->s7double;
        $this->s9double = $alpha * $this->s9aksen + (1 - $alpha) * $this->s8double;
        $this->s10double = $alpha * $this->s10aksen + (1 - $alpha) * $this->s9double;
        $this->s11double = $alpha * $this->s11aksen + (1 - $alpha) * $this->s10double;
        $this->s12double = $alpha * $this->s12aksen + (1 - $alpha) * $this->s11double;

        array_push($this->s2, number_format($this->s1double, 2));
        array_push($this->s2, number_format($this->s2double, 2));
        array_push($this->s2, number_format($this->s3double, 2));
        array_push($this->s2, number_format($this->s4double, 2));
        array_push($this->s2, number_format($this->s5double, 2));
        array_push($this->s2, number_format($this->s6double, 2));
        array_push($this->s2, number_format($this->s7double, 2));
        array_push($this->s2, number_format($this->s8double, 2));
        array_push($this->s2, number_format($this->s9double, 2));
        array_push($this->s2, number_format($this->s10double, 2));
        array_push($this->s2, number_format($this->s11double, 2));
        array_push($this->s2, number_format($this->s12double, 2));


        $this->a1 = 2 * $this->s1aksen - $this->s1double;
        $this->a2 = 2 * $this->s2aksen - $this->s2double;
        $this->a3 = 2 * $this->s3aksen - $this->s3double;
        $this->a4 = 2 * $this->s4aksen - $this->s4double;
        $this->a5 = 2 * $this->s5aksen - $this->s5double;
        $this->a6 = 2 * $this->s6aksen - $this->s6double;
        $this->a7 = 2 * $this->s7aksen - $this->s7double;
        $this->a8 = 2 * $this->s8aksen - $this->s8double;
        $this->a9 = 2 * $this->s9aksen - $this->s9double;
        $this->a10 = 2 * $this->s10aksen - $this->s10double;
        $this->a11 = 2 * $this->s11aksen - $this->s11double;
        $this->a12 = 2 * $this->s12aksen - $this->s12double;


        array_push($this->a, number_format($this->a1, 2));
        array_push($this->a, number_format($this->a2, 2));
        array_push($this->a, number_format($this->a3, 2));
        array_push($this->a, number_format($this->a4, 2));
        array_push($this->a, number_format($this->a5, 2));
        array_push($this->a, number_format($this->a6, 2));
        array_push($this->a, number_format($this->a7, 2));
        array_push($this->a, number_format($this->a8, 2));
        array_push($this->a, number_format($this->a9, 2));
        array_push($this->a, number_format($this->a10, 2));
        array_push($this->a, number_format($this->a11, 2));
        array_push($this->a, number_format($this->a12, 2));
        
        
        $this->b1 = $alpha/(1-$alpha)*($this->s1aksen-$this->s1double);
        $this->b2 = $alpha/(1-$alpha)*($this->s2aksen-$this->s2double);
        $this->b3 = $alpha/(1-$alpha)*($this->s3aksen-$this->s3double);
        $this->b4 = $alpha/(1-$alpha)*($this->s4aksen-$this->s4double);
        $this->b5 = $alpha/(1-$alpha)*($this->s5aksen-$this->s5double);
        $this->b6 = $alpha/(1-$alpha)*($this->s6aksen-$this->s6double);
        $this->b7 = $alpha/(1-$alpha)*($this->s7aksen-$this->s7double);
        $this->b8 = $alpha/(1-$alpha)*($this->s8aksen-$this->s8double);
        $this->b9 = $alpha/(1-$alpha)*($this->s9aksen-$this->s9double);
        $this->b10 = $alpha/(1-$alpha)*($this->s10aksen-$this->s10double);
        $this->b11 = $alpha/(1-$alpha)*($this->s11aksen-$this->s11double);
        $this->b12 = $alpha/(1-$alpha)*($this->s12aksen-$this->s12double);
        
        array_push($this->b, number_format($this->b1, 2));
        array_push($this->b, number_format($this->b2, 2));
        array_push($this->b, number_format($this->b3, 2));
        array_push($this->b, number_format($this->b4, 2));
        array_push($this->b, number_format($this->b5, 2));
        array_push($this->b, number_format($this->b6, 2));
        array_push($this->b, number_format($this->b7, 2));
        array_push($this->b, number_format($this->b8, 2));
        array_push($this->b, number_format($this->b9, 2));
        array_push($this->b, number_format($this->b10, 2));
        array_push($this->b, number_format($this->b11, 2));
        array_push($this->b, number_format($this->b12, 2));

        $array = array(
            "s1" => $this->s1,
            "s2" => $this->s2,
            "a" => $this->a,
            "b" => $this->b
        );
        return $array;
    }

}
