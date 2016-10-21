<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 01/10/2016
 * Time: 23:33
 */

namespace Dashboard;
require_once 'class.DB.php';
require_once '/Carbon/class.carbon.php';
use Carbon\Carbon;
use Database\DB as DBase;

class Points{

    public $DB;
    private $POINTS = array();

    public function __construct(){
        $this->DB = new DBase();
    }

    public function calculatePoints(){

        $query = "SELECT sum(type_points) FROM points_table WHERE admission_number =" . $_SESSION['admission_number'] . " AND type='Positive'";
        $result = $this->DB->DB__Query($query);
        $positive_points = $this->DB->DB__one_data($result);


        $query = "SELECT sum(type_points) FROM points_table WHERE admission_number =" . $_SESSION['admission_number'] . " AND type='Negative'";
        $result = $this->DB->DB__Query($query);
        $negative_points = $this->DB->DB__one_data($result);

        $this->POINTS['Positive']['Total'] = (int)$positive_points;
        $this->POINTS['Negative']['Total'] = (int)$negative_points;
        $this->POINTS['Points']['Total'] = $positive_points - $negative_points;
    }

    public function getPoints_lastWeek(){       ;

        $week_start = strtotime(Carbon::now()->startOfWeek()->subWeek()->format('Y-m-d'));
        $week_end = strtotime(Carbon::now()->endOfWeek()->subWeek()->format('Y-m-d'));


        $query = "SELECT sum(type_points) FROM points_table WHERE admission_number =" . $_SESSION['admission_number'] . " AND type='Positive' AND type_date >='" . $week_start . "' AND type_date <= '" . $week_end . "'";
        $result = $this->DB->DB__Query($query);
        $positive_points = $this->DB->DB__one_data($result);

        $query = "SELECT sum(type_points) FROM points_table WHERE admission_number =" . $_SESSION['admission_number'] . " AND type='Negative' AND type_date BETWEEN '" . $week_start . "' AND '" . $week_end . "'";
        $result = $this->DB->DB__Query($query);
        $negative_points = $this->DB->DB__one_data($result);

        $this->POINTS['Positive']['Week']['Last'] = (int)$positive_points;
        $this->POINTS['Negative']['Week']['Last'] = (int)$negative_points;
        $this->POINTS['Points']['Week']['Last'] = $positive_points - $negative_points;
    }

    public function getPoints_thisWeek(){

        $week_start = strtotime(Carbon::now()->startOfWeek()->format('Y-m-d'));
        $week_end = strtotime(Carbon::now()->endOfWeek()->format('Y-m-d'));


        $query = "SELECT sum(type_points) FROM points_table WHERE admission_number =" . $_SESSION['admission_number'] . " AND type='Positive' AND (type_date >= " . $week_start . " AND type_date <= " . $week_end . ")";
        $result = $this->DB->DB__Query($query);
        $positive_points = $this->DB->DB__one_data($result);


        $query = "SELECT sum(type_points) FROM points_table WHERE admission_number =" . $_SESSION['admission_number'] . " AND type='Negative' AND (type_date >= " . $week_start . " AND type_date <= " . $week_end . ")";
        $result = $this->DB->DB__Query($query);
        $negative_points = $this->DB->DB__one_data($result);

        $this->POINTS['Positive']['Week']['This'] = (int)$positive_points;
        $this->POINTS['Negative']['Week']['This'] = (int)$negative_points;
        $this->POINTS['Points']['Week']['This'] = $positive_points - $negative_points;
    }

    public function getPointsChange($thisWeek, $lastWeek){
       return number_format((($thisWeek - $lastWeek) / $lastWeek) * 100, 0);
    }

    public function setDashboard() {
        $this->calculatePoints();
        $this->getPoints_lastWeek();
        $this->getPoints_thisWeek();


        //$this->POINTS['Points']['Total']['Change'] = ($this->POINTS['Points']['Week']['This'] - $this->POINTS['Points']['Week']['Last']);

        //echo $this->POINTS['Points']['Total']['Change'];

        $this->POINTS['Points']['Week']['Change'] = $this->getPointsChange($this->POINTS['Points']['Week']['This'], $this->POINTS['Points']['Week']['Last']);
        $this->POINTS['Positive']['Week']['Change'] = $this->getPointsChange($this->POINTS['Positive']['Week']['This'], $this->POINTS['Positive']['Week']['Last']);
        $this->POINTS['Negative']['Week']['Change'] = $this->getPointsChange($this->POINTS['Negative']['Week']['This'], $this->POINTS['Negative']['Week']['Last']);

            $Total = array(
                'Points' => array(
                    'title' => 'Total: Points',
                    'number' => array(
                        'value' => $this->POINTS['Points']['Total'],
                        'color' => 'blue',
                    ),
                    'percentage' => array(
                        'value' => str_replace("-","",$this->POINTS['Points']['Total']['Change']),
                        'color' => (strstr($this->POINTS['Points']['Total']['Change'], '-') ? 'desc' : 'asc'),
                    )
                ),
                'Positive' => array(
                    'title' => 'Total: Positive',
                    'number' => array(
                        'value' => $this->POINTS['Positive']['Total'],
                        'color' => (strstr($this->POINTS['Positive']['Total']['Change'], '-') ? 'red' : 'green'),
                    ),
                    'percentage' => array(
                        'value' => str_replace("-","",$this->POINTS['Positive']['Total']['Change']),
                        'color' => (strstr($this->POINTS['Positive']['Total']['Change'], '-') ? 'desc' : 'asc'),
                    )
                ),
                'Negative' => array(
                    'title' => 'Total: Negative',
                    'number' => array(
                        'value' => $this->POINTS['Negative']['Total'],
                        'color' => (strstr($this->POINTS['Negative']['Total']['Change'], '-') ? 'red' : 'green'),
                    ),
                    'percentage' => array(
                        'value' => str_replace($this->POINTS['Negative']['Total']['Change'],"-",""),
                        'color' => (strstr($this->POINTS['Negative']['Total']['Change'], '-') ? 'desc' : 'asc'),
                    )
                )
            );
            $This_Week = array(
                'Points' => array(
                    'title' => 'Week: Points',
                    'number' => array(
                        'value' => $this->POINTS['Points']['Week']['This'],
                        'color' => (strstr($this->POINTS['Points']['Week']['Change'], '-') ? 'red' : 'green'),
                    ),
                    'percentage' => array(
                        'value' => str_replace($this->POINTS['Points']['Week']['Change'],"-",""),
                        'color' => (strstr($this->POINTS['Points']['Week']['Change'], '-') ? 'desc' : 'asc'),
                    )
                ),
                'Positive' => array(
                    'title' => 'Week: Positive',
                    'number' => array(
                        'value' => $this->POINTS['Positive']['Week']['This'],
                        'color' => (strstr($this->POINTS['Positive']['Week']['Change'], '-') ? 'red' : 'green'),
                    ),
                    'percentage' => array(
                        'value' => str_replace($this->POINTS['Positive']['Week']['Change'],"-",""),
                        'color' => (strstr($this->POINTS['Positive']['Week']['Change'], '-') ? 'desc' : 'asc'),
                    )
                ),
                'Negative' => array(
                    'title' => 'Week: Negative',
                    'number' => array(
                        'value' => $this->POINTS['Negative']['Week']['This'],
                        'color' => (strstr($this->POINTS['Negative']['Week']['Change'], '-') ? 'red' : 'green'),
                    ),
                    'percentage' => array(
                        'value' => str_replace($this->POINTS['Negative']['Week']['Change'],"-",""),
                        'color' => (strstr($this->POINTS['Negative']['Week']['Change'], '-') ? 'desc' : 'asc'),
                    )
                )
            );
            $Last_Week = array(
                'Points' => array(
                    'title' => 'Week: Points',
                    'number' => array(
                        'value' => $this->POINTS['Points']['Week']['Last'],
                        'color' => (strstr($this->POINTS['Points']['Week']['Last']['Change'], '-') ? 'red' : 'green'),
                    ),
                    'percentage' => array(
                        'value' => $this->POINTS['Points']['Week']['Last']['Change'],
                        'color' => (strstr($this->POINTS['Points']['Week']['Last']['Change'], '-') ? 'desc' : 'asc'),
                    )
                ),
                'Positive' => array(
                    'title' => 'Week: Positive',
                    'number' => array(
                        'value' => $this->POINTS['Positive']['Week']['Last'],
                        'color' => (strstr($this->POINTS['Positive']['Week']['Last']['Change'], '-') ? 'red' : 'green'),
                    ),
                    'percentage' => array(
                        'value' => $this->POINTS['Positive']['Week']['Last']['Change'],
                        'color' => (strstr($this->POINTS['Positive']['Week']['Last']['Change'], '-') ? 'desc' : 'asc'),
                    )
                ),
                'Negative' => array(
                    'title' => 'Week: Negative',
                    'number' => array(
                        'value' => $this->POINTS['Negative']['Week']['Last'],
                        'color' => (strstr($this->POINTS['Negative']['Week']['Last']['Change'], '-') ? 'red' : 'green'),
                    ),
                    'percentage' => array(
                        'value' => $this->POINTS['Negative']['Week']['Last']['Change'],
                        'color' => (strstr($this->POINTS['Negative']['Week']['Last']['Change'], '-') ? 'desc' : 'asc'),
                    )
                )
            );

        $_SESSION['DASHBOARD'] = array(
            'Total' => $Total,
            'This_Week' => $This_Week
        );
    }


    public function getGraphData(){
        $result['Positive_Data'] = '';
        $result['Negative_Data'] = '';

        $SQL = 'SELECT sum(`type_points`) points,from_unixtime(`type_date`,\'%Y-%m-%d\') type_date FROM `points_table` WHERE `type` = \'Positive\'  GROUP BY from_unixtime(`type_date`,\'%Y-%m-%d\') ORDER BY from_unixtime(`type_date`,\'%Y-%m-%d\')';
        $result['Positive_Query'] = $this->DB->DB__Query($SQL);

        foreach( $result['Positive_Query'] as $row ){
            $result['Positive_Data'] .= "[gd(".date('Y',strtotime($row['type_date'])).", ".date('m',strtotime($row['type_date'])).", ".date('d',strtotime($row['type_date']))."), ".$row['points']."],";
        }

        $SQL = 'SELECT sum(`type_points`) points,from_unixtime(`type_date`,\'%Y-%m-%d\') type_date FROM `points_table` WHERE `type` = \'Negative\'  GROUP BY from_unixtime(`type_date`,\'%Y-%m-%d\') ORDER BY from_unixtime(`type_date`,\'%Y-%m-%d\')';
        $result['Negative_Query'] = $this->DB->DB__Query($SQL);

        foreach( $result['Negative_Query'] as $row ){
            $result['Negative_Data'] .= "[gd(".date('Y',strtotime($row['type_date'])).", ".date('m',strtotime($row['type_date'])).", ".date('d',strtotime($row['type_date']))."), ".$row['points']."],";
        }


        return $result;
    }

}