<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}
$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);
if ("admin" != $user_info->role) {redirect("index.php");}

if (isset($_GET["action"]) && $_GET["action"]=="qimg") {
    $question_info = $Tests->selectSingle("question",["id"=>$_GET["id"]]);
    if($question_info["atach"]){
        unlink(ROOT . "/upload/" . $question_info["atach"]);
    };

    $Tests->updateTable("question",["atach"=>null],["id" => $question_info["id"]]);
    redirect("test_questions.php", "action={$question_info["test_id"]}&id={$question_info["id"]}");
}

if (isset($_GET["action"]) && $_GET["action"]=="qdel") {
    $question_info = $Tests->selectSingle("question",["id"=>$_GET["id"]]);
    if($question_info["atach"]){
        unlink(ROOT . "/upload/" . $question_info["atach"]);
    };
    $Tests->deleteSingle("question",["id" => $_GET["id"]]);
    redirect("test_questions.php","id={$_GET["testid"]}");
}

if($_SERVER["REQUEST_METHOD"]=="GET"){
    if($_GET["action"]=="user"){
        $User->deleteSingle("users",["id"=> $_GET["id"]]);
        redirect("all_users.php");
    }
    if($_GET["action"]=="tests"){
        $User->deleteSingle($_GET["action"],["id"=> $_GET["id"]]);
        redirect("testovi.php");
    }

}