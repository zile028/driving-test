<?php
require_once "config.php";
require_once "function.php";

// $connetion = new Connection($database);
// $db=Connection::connect($database);
// $db=connect($database);

require_once "classes/Conection.php";
require_once "classes/QueryBuilder.php";
require_once "classes/User.php";
require_once "classes/Upload.php";

$Conn         = new Connection($database);
$QueryBuilder = new QueryBuilder($database);
$User         = new User($database);
// $Upload       = new Upload();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}