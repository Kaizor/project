<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 24/09/2016
 * Time: 18:42
 */

$documentRoot = $_SERVER['DOCUMENT_ROOT'] . 'Project_Site';

require_once $documentRoot . '/config.php';

$_SESSION = array();
session_destroy();

$location = '/Project_Site/index.php';

header('Location:' . $location);

