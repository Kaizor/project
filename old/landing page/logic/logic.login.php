<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 29/09/2016
 * Time: 20:43
 */

require_once '../config.php';
require_once '../classes/class.Login.php';
$login = new \Auth\Login();

echo '<div class="cssload-loader" style="margin-top:15px;">
            <div class="cssload-inner cssload-one"></div>
            <div class="cssload-inner cssload-two"></div>
            <div class="cssload-inner cssload-three"></div>
        </div>';

if ($login->logUser($_REQUEST['username'], $_REQUEST['password'])) {

    $_SESSION['LOGGED_USER'] = true;


    echo "<script>
        $(function() {
            setTimeout(function(){
                $('#ajaxPanel').load('includes/main_icons.html');                
            },2000);
        });
      </script>";
} else {
    echo "<script>
        $(function() {
            setTimeout(function(){
                    $('#loginContainer').load('form/form.login.php');           
            },1000);            
          });
      </script>";
}


