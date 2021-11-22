<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);
// only access admin users
if ("admin" != $user_info->role) {redirect("index.php");}
;

$all_users=$User->usersInfo();
// dd($test);



require_once ROOT . "/view/all_users.view.php";