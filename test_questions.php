<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);

if (isset($_GET["id"]) && !isset($_GET["action"])) {
    $questions = $Tests->getQuestions(["id" => $_GET["id"]]);
    $tests     = $Tests->selectSingleJoin(["tests", "test_category"], "category_id", ["id" => $_GET["id"]]);
} elseif (isset($_GET["action"])) {
    $tests    = $Tests->selectSingleJoin(["tests", "test_category"], "category_id", ["id" => $_GET["action"]]);
    $question = $Tests->selectSingle("question", ["id" => $_GET["id"]]);
}

if (isset($_POST["add_question"])) {
    if (null != $_FILES["atach"]["name"]) {
        $Upload                  = new Upload();
        $files                   = $Upload->fileInfo($_FILES["atach"]);
        $Upload->valid_extension = ["png", "gif", "jpg", "jpeg"];
        $Upload->valid_size      = 2;
        $Upload->unit            = $Upload::MB;

        $check_status = $Upload->checkFile($files);

        if (count($check_status[0]["errors"]) == 0) {
            if ($store_name = $Upload->uploads($files, ROOT . "/upload")) {
                $data = [
                    "question" => $_POST["question"],
                    "atach"    => $store_name,
                    "test_id"  => $_POST["id"],
                    "points"   => $_POST["points"],
                ];
            }
        }
    } else {
        $data = [
            "question" => $_POST["question"],
            "test_id"  => $_POST["id"],
            "points"   => $_POST["points"],
        ];

    }
    $last_id = $Tests->insertInto("question", $data);

    redirect("question.php", "id=" . $last_id);

}

if (isset($_POST["save_change"])) {
    if (null != $_FILES["new_atach"]["name"]) {
        $Upload                  = new Upload();
        $files                   = $Upload->fileInfo($_FILES["new_atach"]);
        $Upload->valid_extension = ["png", "gif", "jpg", "jpeg"];
        $Upload->valid_size      = 2;
        $Upload->unit            = $Upload::MB;

        $check_status = $Upload->checkFile($files);

        if (count($check_status[0]["errors"]) == 0) {
            unlink(ROOT . "/upload/" . $_POST["old_atach"]);
            if ($store_name = $Upload->uploads($files, ROOT . "/upload")) {
                $data = [
                    "question" => $_POST["question"],
                    "atach"    => $store_name,
                    "points"   => $_POST["points"],
                ];
            }
        }
    } else {
        $data = [
            "question" => $_POST["question"],
            "points"   => $_POST["points"],
        ];
    }

    $Tests->updateTable("question", $data, ["id" => $_POST["id"]]);
    redirect("test_questions.php", "id=" . $_POST["test_id"]);
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

    // $final_result=[
    //     "tacni odgovori"   => count($result_test["exact"]),
    //     "netacni odgovori" => count($result_test["wrong"]),
    //     "osvojeni poeni"   => array_sum($result_test["points"]),
    // ]);

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