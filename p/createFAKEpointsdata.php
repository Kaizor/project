<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 01/10/2016
 * Time: 23:27
 */
include 'classes/class.DB.php';
$DB = new \Database\DB();

$type = array('Positive', 'Negative');
$type_name = array(
    'Positive' => array(
        'Good Work',
        'Helpful',
        'Achieved Something',
        'Extra Curriculum',
    ),
    'Negative' => array(
        'Bad Work',
        'Bullying',
        'Missing Homework',
        'Other',
    ),
);

for ($i = 1; $i <= 1000; $i++) {
    $type_RAND = rand(0, 1);
    $type_STRING = $type[$type_RAND];
    $type_name_RAND = rand(0, 3);
    $type_name_STRING = $type_name[$type_STRING][$type_name_RAND];

    $SQL = "INSERT INTO points_table (admission_number, type, type_name, type_points, type_date) VALUES (000001,'" . $type_STRING . "','" . $type_name_STRING . "',1,'" . strtotime(randomDate('2016/09/01', '2017/09/01')) . "')";
    $DB->DB__Query($SQL);
}

function randomDate($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d H:i:s', $val);
}