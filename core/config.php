<?php
// database connect config
$conn_config = [
    "home_desktop" => [
        "host"     => "localhost:8888",
        "user"     => "root",
        "password" => "root",
        "dbname"   => "testovi",
    ],
    "work_desktop" => [
        "host"     => "localhost",
        "user"     => "root",
        "password" => "root",
        "dbname"   => "testovi",
    ],
    "host" => [
        "host"     => "localhost",
        "user"     => "hdza0418_dtadmin",
        "password" => "123Davidavid123",
        "dbname"   => "hdza0418_driving_test",
    ],
];

// rout path
define("ROOT", __DIR__ . "./.."); //root for include
define("ROOT_URL", (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']);
define("ROOT_DIR", ROOT_URL . "/" . explode("/", $_SERVER["REQUEST_URI"])[1]);
define("TARGET_DIR", "/upload/");
define("UPLOAD_PATH" , ROOT . TARGET_DIR);
define ("SRC_URI", ROOT_DIR . TARGET_DIR);