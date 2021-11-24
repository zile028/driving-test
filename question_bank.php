<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);
// only access admin users
if ("admin" != $user_info->role) {redirect("index.php");}
;

$questions = $Tests->getQuestions();


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
                    "test_id"  => null,
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
            unlink(UPLOAD_PATH . $_POST["old_atach"]);
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
    redirect("question_bank.php", "id=" . $_POST["test_id"]);
}


if (isset($_GET["action"])) {
    require_once ROOT . "/view/test_questions_edit_view.php";
} else {
    require_once ROOT . "/view/question_bank.view.php";
}