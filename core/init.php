<?php
require_once "config.php";

$database = $conn_config["host"];
$route=$config["host"]["route"];
define("TARGET_DIR", "/upload/"); //directory name where upload files
define("ROOT", __DIR__ . "./.."); //root for include

define("ROOT_URL", $route["root_url"]);
// define("ROOT_DIR", ROOT_URL . "/" . explode("/", $_SERVER["REQUEST_URI"])[1]);
define("UPLOAD_PATH", $route["upload_path"] . TARGET_DIR);
define("SRC_URI", ROOT_URL . TARGET_DIR);

require_once "function.php";

require_once "classes/Conection.php";
require_once "classes/QueryBuilder.php";
require_once "classes/User.php";
require_once "classes/Upload.php";
require_once "classes/Tests.php";

// vd([ROOT,ROOT_URL,ROOT_DIR,TARGET_DIR,UPLOAD_PATH,SRC_URI]);


$Conn         = new Connection($database);
$QueryBuilder = new QueryBuilder($database);
$User         = new User($database);
$Tests        = new Tests($database);
$Upload       = new Upload();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}