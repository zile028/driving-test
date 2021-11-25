<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);
// only access admin users
if ("admin" != $_SESSION["role"]) {redirect("index.php");}

$questions = $Tests->avalibleQuestion(["test_id" => $_GET["id"]]);

$test_questions = $Tests->getTestQuestions(["test_id"  => $_GET["id"]]);

$test_info = $Tests->testInfo(["id" => $_GET["id"]]);


if (isset($_POST["add_question"])) {
    $val = explode("|",$_POST["question_id"]);
    $data = [
        "question_id" => trim($val[0]),
        "points" => trim($val[1]),
        "test_id"  => $_GET["id"],
    ];
    $Tests->insertInto("test_question", $data);
    redirect("test_questions.php","id={$_GET["id"]}","pitanje{$data["question_id"]}");

}

if (isset($_POST["finish_test"])) {
    $data            = [];
    $user_answer     = [];
    $format_answer   = [];
    $all_question    = $_POST["question_id"];
    $correct_answers = $_POST["correct_answer"];

    $result_test = [
        "exact"  => [],
        "wrong"  => [],
        "points" => [],
    ];

    $user_answer = $_POST["answer"];

    foreach ($user_answer as $key => $value) {
        if (is_array($value)) {
            $format_answer[$key] = $value;
        } else {
            $format_answer[$key] = [$value => $value];
        }
        ;
    }

    $question_answers = json_encode($format_answer, JSON_PRETTY_PRINT);

    foreach ($format_answer as $q_key => $q_value) {
        $answered = count($q_value);

        foreach ($q_value as $s_key => $s_value) {
            $result                        = $Tests->isCorrect(["id" => $s_value]);
            $format_answer[$q_key][$s_key] = $result["result"];
        }

        if ($correct_answers[$q_key] != $answered) {
            array_push($result_test["wrong"], $q_key);
        } elseif (array_sum($format_answer[$q_key]) == $correct_answers[$q_key]) {
            array_push($result_test["exact"], $q_key);
            array_push($result_test["points"], $result["points"]);
        } else {
            array_push($result_test["wrong"], $q_key);
        }

    }

    $data = [
        "test_id"        => $_GET["id"],
        "user_id"        => $_SESSION["id"],
        "points"         => array_sum($result_test["points"]),
        "number_correct" => count($result_test["exact"]),
        "answer_json"    => $question_answers,
    ];
    $Tests->insertInto("user_test", $data);

}

if (isset($_GET["action"])) {
    require_once ROOT . "/view/test_questions_edit_view.php";
} else {
    require_once ROOT . "/view/test_questions.view.php";
}