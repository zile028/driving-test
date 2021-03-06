<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);
// only access admin users
if ("admin" != $_SESSION["role"]) {redirect("index.php");}
;
$roles = $User->selectAll("roles");
$all_users=$User->usersInfo();

if(isset($_POST["change_role"])){
    $data=["role_id" => $_POST["role"]];
    $User->updateTable("users",$data,["id"=>$_GET["id"]]);
    redirect("all_users.php");
}


require_once ROOT . "/view/all_users.view.php";