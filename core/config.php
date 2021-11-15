<?php
// database connect config
$database = [
    "host"     => "localhost",
    "user"     => "root",
    "password" => "root",
    "dbname"   => "testovi",
];

// rout path
define("ROOT",__DIR__ . "./..");//root for include
define ("ROOT_URL",(!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']);
define ("ROOT_DIR",ROOT_URL . "/" . explode("/",$_SERVER["REQUEST_URI"])[1]) ;


?>