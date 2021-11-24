<?php
require_once "config.php";
require_once "function.php";

require_once "classes/Conection.php";
require_once "classes/QueryBuilder.php";
require_once "classes/User.php";
require_once "classes/Upload.php";
require_once "classes/Tests.php";

$database = $conn_config["home_desktop"];

$Conn         = new Connection($database);
$QueryBuilder = new QueryBuilder($database);
$User         = new User($database);
$Tests        = new Tests($database);
$Upload       = new Upload();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}