<?php

$config = [
    "host"  => [
        "route" => [
            "root_url" => (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'],
            "upload_path"=>$_SERVER["DOCUMENT_ROOT"],
        ],
    ],
    "local" => [
        "route" => [
            "root_url" => (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . "/" . explode("/", $_SERVER["REQUEST_URI"])[1],
            "upload_path"=>__DIR__ . "./..",
        ],
    ],
];

// database connect config
$conn_config = [
    "home_desktop" => [
        "host"     => "localhost:8889",
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
    "host"         => [
        "host"     => "localhost",
        "user"     => "=",
        "password" => "=",
        "dbname"   => "=",

    ],
];