<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 21/09/2016
 * Time: 20:49
 */

namespace Database;


class DB
{

    const DB_IP = '';
    const DB_NAME = 'project_database';
    const DB_USER = 'root';
    const DB_PASS = '';
    public $DB_CON;
    public $DB_CON_Error;


    public $affected_rows;


    public function DB__Connect(){
        date_default_timezone_set('Europe/London');
        $DB_LINK = new \mysqli(self::DB_IP, self::DB_USER, self::DB_PASS, self::DB_NAME);

        if ($DB_LINK->connect_errno) {
            $this->DB_CON_Error['UserFacing'] = "Unable to connection to server!";
            $this->DB_CON_Error['ErrorNum'] = "Error Number: " . $DB_LINK->connect_errno;
            $this->DB_CON_Error['ErrorDebug'] = "Error Debug: " . $DB_LINK->connect_error;
            header('Location: /connection_fail.php');
            exit();
        }

        $this->DB_CON = $DB_LINK;

        return true;
    }

    public function DB__Query($paramQuery){

        if (empty($this->DB_CON)) {
            $this->DB__Connect();
        }

        if ($SQL = $this->DB_CON->query($paramQuery)) {
            $this->affected_rows = $this->DB_CON->affected_rows;
            return $SQL;
        }

        echo $this->DB_CON->error;
        return false;

    }

    public function DB__one_data($SQL){
        if (!empty($SQL)) {
            $result = $SQL->fetch_row();
        }
        return $result[0];
    }


    public function DB__fetch_array($SQL){
        $arrResult = array();

        if( !empty($SQL) ) {
            while ($result = $SQL->fetch_array(MYSQLI_ASSOC)) {
                $arrResult = array_merge($arrResult, $result);
            }
        }
         
        return $arrResult;
    }

    public function DB__fetch_object($SQL){
        $objResult = false;

        if (!empty($SQL)) {
            while ($result = $SQL->fetch_object()) {
                $objResult[] = $result;
            }
        }

        return $objResult;
    }

}