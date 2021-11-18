<?php
require "core/init.php";

if (!$User->isLoged()) {


    $user_info = $User->selectSingleJoin(
        ["users", "roles"],
        "role_id",
        ["id" => $_SESSION["id"]]
    );
}



require ROOT . "/view/index.view.php";
?>