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
    // $tests = $Tests->selectSingleJoin(["tests", "test_category"], "category_id", ["id" => $_GET["id"]]);
}

if (isset($_POST["add_option"])) {
    $data = [
        "question_id" => intval($_POST["id"]),
        "solution"      => $_POST["option"],
        "corect"      => (isset($_POST["corect"]) ? 1 : 0),
    ];

    $Tests->insertInto("solution", $data);
    // $Tests->addOption("option", $data);
    redirect("question.php", "id=" . $_POST["id"]);

}
// dd($question);

require_once ROOT . "/view/question.view.php";