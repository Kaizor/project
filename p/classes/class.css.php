<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 15/10/2016
 * Time: 10:35
 */

namespace Assets;


class CSS{

    public static $cssLOAD = '';
    public static $cssADD = '<style>';

    public static function load($file){
        self::$cssLOAD .= '<style rel="stylesheet" src='.$file.' />';
    }

    public static function add($code){
        self::$cssADD .= $code;
    }

}