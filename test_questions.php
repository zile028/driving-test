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

    $Tests->updateTable("question",$data,["id" => $_POST["id"]]);
    redirect("test_questions.php", "id=" . $_POST["test_id"]);
}

if (isset($_POST["finish_test"])){
$data=[];
    foreach($_POST["answer"] as $sol_id){
        array_push($data,[

            "solution_id"  =>$sol_id,

        ]);
    }

$json_data=json_encode($data,JSON_PRETTY_PRINT);

    dd(json_decode($json_data));
    $Tests->insertInto("user_answer", [
        "user_id" => $_SESSION["id"],
        "solution_id"  =>$sol_id,
        "test_id"   => $_POST["test_id"],
    ]);
    $Tests->insertInto("question", $data);

}

if (isset($_GET["action"])) {
    require_once ROOT . "/view/test_questions_edit_view.php";
} else {
    require_once ROOT . "/view/test_questions.view.php";
}