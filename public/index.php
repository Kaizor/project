<?php
    require_once 'config.php';
?>

<body class="nav-sm">
<div class="container body">
    <div class="main_container">

    <?php
    $_SESSION['admission_number'] = 1;
    include 'includes/menu/sidemenu.php';
    include 'includes/menu/topmenu.php';
    //include 'createFakepointsdata.php'
    ?>

        <div class="right_col" role="main">
        <!-- page content -->
            <?php
                include 'includes/dashboard/dashboard.php';
            ?>
        <!-- /page content -->


        <!-- footer content -->
        <?php
         require_once 'includes/footer.php';
        ?>
        <!-- /footer content -->
        </div>

    </div>
</div>

</body>
</html>
