<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 15/10/2016
 * Time: 10:36
 */

namespace Assets;


class JS{

    public static $jsLOAD = '';
    public static $jsADD = '<script>';

    public static function load($file){
        self::$jsLOAD .= '<script src='.$file.'></script>';
    }

    public static function add($code){
        self::$jsADD .= $code;
    }

}
