<?php

/*
 * awebarts:: LoginController
 */

include '../includes/init.php';
include '../includes/autoloader.php';

if ($_POST) {
    // Login
    if (isset($_POST['submit']) AND $_POST['submit'] == "Login") {


        try {
            // validator => $_POST # $rules ;
            $valid = new Validator();            
            $rules = array("username" => "checkStings");
            
            if($valid->validate($_POST, $rules))
                $username = $_POST['username'];
            
            $password = $_POST['password'];
            
        } catch (Exception $exc) {
            echo $exc->getMessage();
            die();
        }


        try {
            $login = new Login($username, $password);

            if ($login == TRUE) {
                session_start();
                $_SESSION['username'] = $username;
                header('Location:index.php');
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    // Register
    //`id`, `name`, `username`, `password`, `email`
    if (isset($_POST['submit']) AND $_POST['submit'] == "Register") {



        try {
            // validator => $_POST # $rules ;
            $valid = new Validator();

            $data['name'] = $_POST['name'];
            $data['email'] = $valid->sanitizeItem($_POST['email'], 'email');
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];

            $rules = array(
                "name" => "checkRequired|checkStings",
                "email" => "checkRequired|checkEmail",
                "username" => "checkRequired|checkStings",
                "password" => "checkRequired"
            );
            if (!$valid->validate($data, $rules))
                die();
        } catch (Exception $exc) {
            echo $exc->getMessage();
            die();
        }



        try {
            new Register($data);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
} else {
    include './veiws/Login.php';
}
?>
