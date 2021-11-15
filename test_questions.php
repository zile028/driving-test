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

if(isset($_POST["add_question"])){



    
    $data = [
        "question" => $_POST["question"],
        "atach" => "",//dodati naziv priloga
        "test_id" => $_POST["id"]
    ];

    $Tests->insertInto("tests",$data);
    redirect("testovi.php");
}

require_once ROOT . "/view/test_questions.view.php";