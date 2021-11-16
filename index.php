<?php
require "core/init.php";
$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);
$result=ROOT;

require ROOT . "/view/index.view.php";
?>