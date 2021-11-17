<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}
if ("admin" != $user_info->role) {redirect("testovi.php");}

if (isset($_GET["id"])) {
    $Tests->deleteSingle("solution", ["id" => $_GET["id"]]);
    $num_answers = $Tests->getNumberCorrect(["id" => $_GET["qid"]]);
    $criteria = ["id" => $_GET["qid"]];
    $field    = ["answers" => $num_answers];
    $Tests->updateTable("question", $field, $criteria);
    redirect("question.php", "id={$_GET["qid"]}");
}