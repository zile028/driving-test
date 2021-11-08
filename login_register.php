<?php
require "core/init.php";

if ($User->isLoged()) {header("location: index.php");}

$error = [];
$arg   = [];

if (isset($_POST["reg_btn"])) {

    if ($data = testInput($_POST["first_name"])) {
        $arg["first_name"] = $data;
    } else {
        $first_name_err = "Ime je obavezno!";
        array_push($error, $first_name_err);
    }

    if ($data = testInput($_POST["last_name"])) {
        $arg["last_name"] = $data;
    } else {
        $last_name_err = "Prezime je obavezno!";
        array_push($error, $last_name_err);
    }

    if ($data = testInput($_POST["date_birth"])) {
        $arg["date_birth"] = $data;
    } else {
        $date_birth_err = "Datum rodjenja je obavezan!";
        array_push($error, $date_birth_err);
    }

    if ($data = testInput($_POST["email"])) {
        $arg["email"] = $data;
    } else {
        $email_err = "Email je obavezan!";
        array_push($error, $email_err);
    }

    if ($data = testInput($_POST["password"])) {
        $arg["password"] = password_hash($data, PASSWORD_DEFAULT);
    } else {
        $password_err = "Lozinka je obavezna!";
        array_push($error, $password_err);
    }

    switch (false) {
        case testInput($_POST["repeat_password"]):
            $repeat_password_err = "Ponovljena lozinka je obavezna!";
            array_push($error, $repeat_password_err);
            break;
        case testInput($_POST["repeat_password"]) == testInput($_POST["password"]):
            $repeat_password_err = "Lozinke se ne poklapaju!";
            array_push($error, $repeat_password_err);
            break;
        default:
            # code...
            break;
    }

    if (count($error) == 0) {
        $status = $User->register($arg);
        if ($User->register_status) {
            unset($arg);
            unset($error);
        }
    }

} elseif (isset($_POST["log_btn"])) {
    if ($User->login($_POST["email"], $_POST["password"])) {
        header("location: user.php");
    }
}

require ROOT . "/view/login_register.view.php";