<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);

if ("admin" != $user_info->role) {redirect("testovi.php");}
if (isset($_GET["id"])) {
    $question = $Tests->selectSingle("question", ["id" => $_GET["id"]]);
    $solution = $Tests->selectAll("solution", ["question_id" => $_GET["id"]]);
}

if (isset($_POST["add_option"])) {
    $question = $Tests->selectAll("solution", ["question_id" => $_POST["id"]]);

    $data = [
        "question_id" => intval($_POST["id"]),
        "solution"    => $_POST["option"],
        "corect"      => (isset($_POST["corect"]) ? 1 : 0),
    ];

    $Tests->insertInto("solution", $data);

    $num_answers = $Tests->getNumberCorrect(["id" => $_POST["id"]]);

    $criteria = ["id" => $_POST["id"]];
    $field    = ["answers" => $num_answers];

    $Tests->updateTable("question", $field, $criteria);

    redirect("question.php", "id=" . $_POST["id"]);

}

require_once ROOT . "/view/question.view.php";