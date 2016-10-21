<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 21/09/2016
 * Time: 21:13
 */

session_start();

$documentRoot = $_SERVER['DOCUMENT_ROOT'].'Project_Site';

include($documentRoot.'/classes/class.DB.php');

echo '<link rel="stylesheet" href="assets/css/loader.css" type="text/css">';

$DB = new \Database\DB();
$DB->DB__Connect();