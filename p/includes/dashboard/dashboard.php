<!-- top tiles -->
<?php
// MOVE TO PRE-LOGIN TO DASHBOARD <<<<
include 'classes/class.points.php';


if( empty($_SESSION['DASHBOARD']) ) {
    $points = new \Dashboard\Points();
    $points->setDashboard();
}

echo '<div class="row tile_count">';

foreach($_SESSION['DASHBOARD'] as $header){
    foreach($header as $type){
        echo '<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> '.$type['title'].'</span>
                <div class="count '.$type['number']['color'].'"> '.$type['number']['value'].'</div>
                <span class="count_bottom"><i class="'.$type['percentage']['color'].'"> '.$type['percentage']['value'].'%</i> From last Week</span>
              </div>';
    }
}


echo '</div>';
?>
<!-- /top tiles -->