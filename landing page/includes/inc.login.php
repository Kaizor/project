<script src="assets/js/jquery.min.js"></script>
<div class="align-center">
    <article>
        <header>
            <div class="big-icon login-icon">
                <i class="fa fa-lock big-icon" aria-hidden="true">  <i id="lockIcon"  class="fa fa-sign-in big-icon" aria-hidden="true"></i></i>
                <h3 id="loginText"></h3>
            </div>
        </header>
        <footer>
            <div class="container" id="loginContainer">

            </div>
        </footer>
    </article>
</div>

<script>
    $().ready( function() {
        $('#loginContainer').load('form/form.login.php');
    });
</script>