<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);
// only admin user access
if ("admin" != $_SESSION["role"]) {redirect("index.php");}





$question = $Tests->selectSingle("question", ["id" => $_GET["id"]]);

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
            if ($store_name = $Upload->uploads($files, UPLOAD_PATH)) {
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
    redirect("question_bank.php");
}

require_once ROOT . "/view/edit_questions.view.php";