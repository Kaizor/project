<!DOCTYPE HTML>
<?php
require_once '/config.php';

?>
<html>
<head>
    <title>Passport</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body>
<!-- Header -->
<!--<header id="header">
    <div class="inner">
        <nav id="nav">
            <a href="logout.php">Logout</a>
        </nav>
    </div>
</header>

<!-- Banner -->
<section id="banner">
    <h1>Welcome to Passport</h1>
    <p>Quote of the day</p>
</section>

<!-- One -->
<section id="one" class="wrapper special">
    <div class="inner" id="ajaxPanel">
        <?

        if (!empty($_SESSION['LOGGED_USER']) && $_SESSION['LOGGED_USER'] == true) {
            require_once 'includes/main_icons.html';
        } else {
            require_once 'includes/inc.login.php';
        }
        ?>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style1 special">
    <div class="inner">
        <header>
            <h2>Top Students</h2>
            <p>In each year</p>
        </header>
        <div class="flex flex-5">
            <div class="box person">
                <div class="image round">
                    <img src="images/pic03.jpg" alt="Person 1"/>
                </div>
                <h3>Year 7</h3>
                <p>Student Name</p>
            </div>
            <div class="box person">
                <div class="image round">
                    <img src="images/pic04.jpg" alt="Person 2"/>
                </div>
                <h3>Year 8</h3>
                <p>Student Name</p>
            </div>
            <div class="box person">
                <div class="image round">
                    <img src="images/pic05.jpg" alt="Person 3"/>
                </div>
                <h3>Year 9</h3>
                <p>Student Name</p>
            </div>
            <div class="box person">
                <div class="image round">
                    <img src="images/pic06.jpg" alt="Person 4"/>
                </div>
                <h3>Year 10</h3>
                <p>Student Name</p>
            </div>
            <div class="box person">
                <div class="image round">
                    <img src="images/pic06.jpg" alt="Person 4"/>
                </div>
                <h3>Year 11</h3>
                <p>Student Name</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="footer">
    <div class="inner">
        <div class="flex">
            <div class="copyright">
                &copy; Passport - Jack Corpe - 2016.
            </div>
            <ul class="actions">
                <li>Home</li>
                <li>Dashboard</li>
                <li>Leaderboard</li>
                <li>Shop</li>
            </ul>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>