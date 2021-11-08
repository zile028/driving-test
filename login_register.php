<?php
require "core/init.php";

$error = [];
if (isset($_POST["reg_btn"])) {

    $arg = [];

    if ($data = testInput($_POST["first_name"])) {
        $first_name = $data;
    } else {
        $first_name_err = "Ime je obavezno!";
        array_push($error, $first_name_err);
    }

    if ($data = testInput($_POST["last_name"])) {
        $last_name = $data;
    } else {
        $last_name_err = "Prezime je obavezno!";
        array_push($error, $last_name_err);
    }

    if ($data = testInput($_POST["date_birth"])) {
        $date_birth = $data;
    } else {
        $date_birth_err = "Datum rodjenja je obavezan!";
        array_push($error, $date_birth_err);
    }

    if ($data = testInput($_POST["email"])) {
        $email = $data;
    } else {
        $email_err = "Email je obavezan!";
        array_push($error, $email_err);
    }

    if ($data = testInput($_POST["password"])) {
        $password = $data;
    } else {
        $password_err = "Lozinka je obavezna!";
        array_push($error, $password_err);
    }

    if (testInput($_POST["repeat_password"]) != testInput($_POST["password"])) {
        $repeat_password_err = "Lozinke se ne poklapaju!";
        array_push($error, $repeat_password_err);
    } elseif (testInput($_POST["repeat_password"])) {
        $repeat_password_err = "Potrebno je ponovo uneti lozinku!";
        array_push($error, $repeat_password_err);
    }

    if (count($error)) {
// register
        $User->register([
             $first_name,
             $last_name,
             $date_birth,
             $email,
             password_hash($password,PASSWORD_DEFAULT),
        ]
        );
    }

}

require ROOT . "/view/login_register.view.php";