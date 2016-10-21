<?php
require_once '../config.php';
?>
<div id="fadeInBox" class="container-box">
    <?= empty($_SESSION['Error']['Msg']) ? '' : '<div class="fa fa-info" id="info"> | '.$_SESSION['Error']['Msg'].'</div>'; unset($_SESSION['Error']['Msg']);  ?>
    <form method="post" id="ajaxLogin">
        <div class="row uniform">
            <div>
                <input type="text" name="username" id="username" value="" placeholder="Username">
            </div>
            <div>
                <input type="password" name="password" id="password" value="" placeholder="Password">
            </div>
            <div>

            </div>
        </div>
    </form>
    <div class="input-button-pos">
        <input type="submit" id="submitLogin" value="Login" class="button special icon fa-key">
        <input type="submit" id="create" value="Create a new account">
    </div>
</div>


<script>
    $(function() {
        $("#fadeInBox").hide().fadeIn();
        $("#lockIcon").addClass('fa-sign-in');
        $("#lockIcon").removeClass ('fa-user');
        $("#loginText").html('Login');

        $('#create').click( function () {
            $('#loginContainer').load('form/form.create_account.php');
        });

        $('#submitLogin').click( function(){
            $('#ajaxLogin').submit();
        });

        $('#ajaxLogin').on('submit', function(e) {
            e.preventDefault();

            $('.input-button-pos').addClass('hidden');
            $('#info').addClass('hidden');

            $.ajax({
                url: 'logic/logic.login.php',
                data: $('#ajaxLogin').serialize(),
                error: function() {
                    $('#info').html('An error has occurred');
                },
                success: function(data) {
                    $('#ajaxLogin').html(data);
                },
                type: 'POST'
            });
        });

    });
</script>