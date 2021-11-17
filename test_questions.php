<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);

if (isset($_GET["id"])) {
    $questions = $Tests->getQuestions(["id" => $_GET["id"]]);
    $tests     = $Tests->selectSingleJoin(["tests", "test_category"], "category_id", ["id" => $_GET["id"]]);
}

// dd($questions);

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
                    "atach"    => $store_name, //dodati naziv priloga
                     "test_id"  => $_POST["id"],
                    "points"   => $_POST["points"],
                ];
            }
            ;
        }
    } else {
        $data = [
            "question" => $_POST["question"],
            "test_id"  => $_POST["id"],
            "test_id"  => $_POST["id"],
            "points"   => $_POST["points"],
        ];

    }

    $last_id = $Tests->insertInto("question", $data);

    redirect("question.php", "id=" . $last_id);

}

require_once ROOT . "/view/test_questions.view.php";