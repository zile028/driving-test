<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);
$test_info = $Tests->testInfo(["id" => $_GET["id"]]);
$questions =$Tests->getTestQuestions(["test_id"  => $_GET["id"]]);

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

    $take_point=array_sum($result_test["points"]);
    $max_point=$test_info["max_points"];
    $percent=($take_point/$max_point)*100;

    $data = [
        "test_id"        => $_GET["id"],
        "user_id"        => $_SESSION["id"],
        "points"         => $take_point,
        "number_correct" => count($result_test["exact"]),
        "percent" => $percent,
        "answer_json"    => $question_answers,
    ];



    $Tests->insertInto("user_test", $data);
    redirect("user.php");

}

require_once ROOT . "/view/test.view.php";