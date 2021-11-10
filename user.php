<?php
require_once "core/init.php";

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);


if(isset($_POST["save_img"])){
$Upload->files=$_FILES["profil_image"];

$test = $Upload->fileInfo();

dd($test);
}


require_once ROOT . "/view/user.view.php";