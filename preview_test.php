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
    $answers=json_decode($test_info["answer_json"],true);
    // vd($questions);
    // dd(json_decode($test_info["answer_json"],true));
}



require_once ROOT . "/view/preview_test.view.php";