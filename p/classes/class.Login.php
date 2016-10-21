<?php
/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 24/09/2016
 * Time: 00:48
 */

namespace Auth;

use Database\DB;

class Login
{

    public $password_hash;
    private $DB;

    public function __construct()
    {
        $this->DB = new DB();

    }

    public function checkUsername($username)
    {
        $SQL = "SELECT username FROM login_details WHERE username = '" . $username . "'";

        $this->DB->DB__Query($SQL);

        if ($this->DB->affected_rows > 0) {
            return true;
        }

        return false;
    }

    public function checkPassword($password)
    {
        if (password_verify($password, $this->password_hash)) {
            return true;
        }
        return false;
    }

    public function getPasswordSalt($username)
    {
        $SQL = "SELECT password_salt FROM login_details WHERE username ='" . $username . "'";
        $SQLReturn = $this->DB->DB__Query($SQL);
        if ($this->DB->affected_rows > 0) {
            $result = $this->DB->DB__fetch_array($SQLReturn);
            $this->password_hash = $result['password_salt'];
            return true;
        }
        return false;
    }

    public function createUser()
    {
        if ($this->checkUsername($_REQUEST['username'])) {
            $_SESSION['Error']['Msg'] = "Username already taken.";
            return false;
        }
        if (strlen($_REQUEST['password']) < 8) {
            $_SESSION['Error']['Msg'] = "Password must be at least 8 characters long!";
            return false;
        }

        $this->setPasswordSalt($_REQUEST['password']);
        $this->setDetails();
        $this->success();
        return true;
    }

    public function logUser($user, $pass)
    {
        if (!$this->checkUsername($user)) {
            $_SESSION['Error']['Msg'] = "User does not exist!";
            return false;
        }
        if (!$this->getPasswordSalt($user)) {
            return false;
        }
        if (!$this->checkPassword($pass)) {
            $_SESSION['Error']['Msg'] = "Incorrect username and password combination!";
            return false;
        }
        return true;
    }


    private function setPasswordSalt($password)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $this->password_hash = $password_hash;
    }

    private function setDetails()
    {

        $SQL = "INSERT INTO login_details (username,password_salt,email) VALUES ('" . $_REQUEST['username'] . "','" . $this->password_hash . "','" . $_REQUEST['email'] . "')";

        if ($this->DB->DB__Query($SQL)) {
            return true;
        }

        return false;
    }

    private function success()
    {
        return true;
    }

}