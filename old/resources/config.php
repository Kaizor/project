<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 18/10/2016
 * Time: 17:57
 */

/*
    # DEFINE PATHS #####################################################
    Creating constants for heavily used paths makes things a lot easier.
    ex. require_once(LIBRARY_PATH . "Paginator.php")
*/

// Get images from PIXABAY

$docRoot = dirname(dirname( __FILE__)) ;

defined("ASSET_PATH")
or define("ASSET_PATH", 'assets');

defined("CSS_PATH")
or define("CSS_PATH", 'assets/css');

defined("JS_PATH")
or define("JS_PATH", 'assets/js');

defined("IMG_PATH")
or define("IMG_PATH", 'assets/images');

defined("INC_PATH")
or define("INC_PATH", 'includes');

defined("CLASS_PATH")
or define("CLASS_PATH", 'classes');

$config = array(
    "db" => array(
        "db1" => array(
            "dbname" => "database1",
            "username" => "dbUser",
            "password" => "pa$$",
            "host" => "localhost"
        ),
    ),
    "urls" => array(

    ),
    "paths" => array(
        "resources" => "../resources",
    )
);

require_once   INC_PATH . '/header.php';
require_once   CLASS_PATH . '/class.DB.php';

$DB = new \Database\DB();

/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);
