<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);
if (isset($_GET["id"])){
    $tests = $Tests->selectSingleJoin(["tests", "test_category"],"category_id",["id" => $_GET["id"]]);

}

if(isset($_POST["add_test"])){
    $data = [
        "test_name" => $_POST["test_name"],
        "category_id" => $_POST["category"]
    ];

    $Tests->insertInto("tests",$data);
    redirect("testovi.php");
}

require_once ROOT . "/view/test_questions.view.php";