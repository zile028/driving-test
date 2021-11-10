<?php
require_once "core/init.php";

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);

require_once ROOT . "/view/user.view.php";