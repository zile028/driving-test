<?php
require_once "config.php";
require_once "function.php";
require_once "classes/Conection.php";

// $connetion = new Connection($database);
$db=Connection::connect($database);

require_once "classes/Conection.php";
require_once "classes/QueryBuilder.php";
require_once "classes/User.php";

$QueryBuilder = new QueryBuilder($db);
$User         = new User($db);