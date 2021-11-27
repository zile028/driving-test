<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}
$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);
// only admin user access
if ("admin" != $_SESSION["role"]) {redirect("index.php");}


if(haveQryUrl()){
    if($_GET["action"]=="user"){
        $img_path = $User->selectSingle("users",["id"=>$_GET["id"]]);
        $User->deleteSingle("users",["id"=> $_GET["id"]]);
        if($img_path["profil_img"]){
            unlink(UPLOAD_PATH . $img_path["profil_img"]);
        };
        redirect("all_users.php");
    }
    if($_GET["action"]=="tests"){
        $User->deleteSingle($_GET["action"],["id"=> $_GET["id"]]);
        redirect("testovi.php");
    }
    if ($_GET["action"]=="question_img") {
        $question_info = $Tests->selectSingle("question",["id"=>$_GET["id"]]);
        if($question_info["atach"]){
            unlink(UPLOAD_PATH . $question_info["atach"]);
        };
        $Tests->updateTable("question",["atach"=>null],["id" => $question_info["id"]]);
        redirect($_SERVER["HTTP_REFERER"], "id={$question_info["id"]}");
    }

    if ($_GET["action"]=="question_delete") {
        $question_info = $Tests->selectSingle("question",["id"=>$_GET["id"]]);
        if($question_info["atach"]){
            unlink(UPLOAD_PATH . $question_info["atach"]);
        };
        $Tests->deleteSingle("question",["id" => $_GET["id"]]);
        redirect($_SERVER["HTTP_REFERER"]);
    }

    if($_GET["action"]=="remove_question"){

        $User->deleteRecord(
            "test_question",
            ["question_id"=> $_GET["qid"],"test_id"=> $_GET["tid"]],
            ["AND"]);
        redirect("test_questions.php","id=" . $_GET["tid"] );
    }

    if($_GET["action"]=="user_test"){
        $User->deleteSingle($_GET["action"],["id"=> $_GET["id"]]);
        redirect("user.php");
    }


}