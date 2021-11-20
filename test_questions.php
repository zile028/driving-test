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

// dd($tests);

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
    $data             = [];
    $user_answer      = [];
    $all_question     = $_POST["question_id"];
    $correct_answers  = $_POST["correct_answer"];
    $question_answers = [];
vd($correct_answers);
    foreach ($_POST["question_id"] as $item) {
        $question_answers[$item] = [];
    }
vd($question_answers);

    foreach ($_POST["answer"] as $key => $value) {
        vd($key);
        if (1 == $correct_answers[$key]) {
            $question_answers[$key][$key] = $value;
        } else {
            $question_answers[$value][$key] = $key;
        }
    }
// vd($question_answers);
    $wrong = [];
    foreach ($questions as $question) {
        $q           = $question["question"];
        $s           = $question["solution"];
        $answers     = $q["answers"]; //koliko treba da ima tacnih solucija u pitanju
        $user_answer = count($question_answers[$q["id"]]); //koliko je solucija korisnik odabrao

        if ($answers == $user_answer) {
            foreach ($s as $option) {
                if ($option["corect"]) {
                    vd($question_answers[$q["id"]]);
                    vd(array_key_exists($option["id"], $question_answers[$q["id"]]));
                }
                ;
            }
        } else {
            array_push($wrong, $q["id"]);
        }

        // vd($question_answers[$q["id"]]);
        // vd(array_key_exists(9,$question_answers[$q["id"]]));
    }

// vd($question_answers);

// dd($Tests->getSolutions($_POST["question_id"]));

// dd(implode(",",$_POST["question_id"]));

    // check correct answer
    foreach ($question_answers as $key => $value) {
        // vd($key);
        // vd($questions[$key]);
    }
    // dd($question_answers);

    // ------------------------

    $data = [
        "test_id"        => $_GET["id"],
        "user_id"        => $_SESSION["id"],
        "points"         => "5 fiksno",
        "number_correct" => "3 fiksno",
        "answer_json"    => $question_answers,
        // "answer_json"    => json_encode($question_answers, JSON_PRETTY_PRINT),
    ];
    dd("end");
    // vd($all_question);
    // vd($user_answer);
    dd($data);

    $Tests->insertInto("user_answer", [
        "user_id"     => $_SESSION["id"],
        "solution_id" => $sol_id,
        "test_id"     => $_POST["test_id"],
    ]);

    $Tests->insertInto("question", $data);

}

if (isset($_GET["action"])) {
    require_once ROOT . "/view/test_questions_edit_view.php";
} else {
    require_once ROOT . "/view/test_questions.view.php";
}