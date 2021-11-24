<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);


$tests = $Tests->getAllTests();
// dd($tests);
$category = $QueryBuilder->selectAll("test_category");

if(isset($_POST["add_test"])){
    $data = [
        "test_name" => $_POST["test_name"],
        "category_id" => $_POST["category"]
    ];

    $Tests->insertInto("tests",$data);
    redirect("testovi.php");
}

if(isset($_POST["add_category"])){
    $data = [
        "category_name" => $_POST["category_name"],
        "icon" => $_POST["category_icon"]
    ];

    $Tests->insertInto("test_category",$data);
    redirect("testovi.php");
}

require_once ROOT . "/view/testovi.view.php";