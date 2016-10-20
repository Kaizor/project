<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 24/09/2016
 * Time: 13:27
 */

require_once '../config.php';
require_once '../classes/class.Login.php';

$login = new \Auth\Login();

if ($login->createUser()) {
    $_SESSION['LOGGED_USER'] = true;
    echo "<script>
        $(function() {
            $('#ajaxPanel').load('includes/main_icons.html');                
        });
      </script>";
} else {
    echo "<script>
        $(function() {
            $('#loginContainer').load('form/form.create_account.php');
          });
      </script>";
}
