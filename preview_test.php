<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);

if(haveQryUrl()){
    $user_test=$Tests->previewTest(["id" => $_GET["id"]]);
    $test_info = $user_test["info"];
    $questions= $Tests->getTestQuestions(["test_id"=>$test_info["test_id"]]);



   
}



require_once ROOT . "/view/preview_test.view.php";