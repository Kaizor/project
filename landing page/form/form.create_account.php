<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 24/09/2016
 * Time: 00:53
 */
require_once '../config.php';
?>
<div id="fadeInBox" class="container-box">
    <?= empty($_SESSION['Error']['Msg']) ? '' : '<div class="fa fa-info" id="info"> | '.$_SESSION['Error']['Msg'].'</div>'; unset($_SESSION['Error']['Msg']); ?>
    <form id="createSubmit">
        <div class="row container uniform">
            <div>
                <input type="text" name="username" id="username" value="" placeholder="Username" required>
            </div>
            <div>
                <input type="password" name="password" id="password" value="" placeholder="Password" required>
            </div>
        </div>
        <div class="row container uniform">
            <div>
                <input type="email" name="email" id="email" value="" placeholder="Email" required>
            </div>
        </div>


        <div class="input-button-pos">
            <input type="submit" id="create" value="Create Account" class="button special icon fa-key">
            <input type="button" id="Back" value="Back">
        </div>
    </form>
</div>



<script>
    $(function() {
        $("#fadeInBox").hide().fadeIn();
        $("#lockIcon").removeClass('fa-sign-in');
        $("#lockIcon").addClass('fa-user');
        $("#loginText").html("Create Account");

        $('#Back').click( function () {
            $('#loginContainer').load('form/form.login.php');
        });

        $('#createSubmit').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: 'logic/logic.create_account.php',
                data: $('#createSubmit').serialize(),
                error: function() {
                    $('#info').html('An error has occurred');
                },
                success: function(data) {
                    $('#loginContainer').html(data);
                },
                type: 'POST'
            });
        });




    });
</script>
