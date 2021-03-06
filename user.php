<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);


if (haveQryUrl()) {
    // only admin user access
    if ("admin" != $_SESSION["role"]) {redirect("index.php");}
    $user_preview = $User->selectSingleJoin(
        ["users", "roles"],
        "role_id",
        ["id" => $_GET["id"]]
    );
    $test_info = $User->getTestsStatistic($_GET["id"]);
} else {
    
    $user_preview = $User->selectSingleJoin(
        ["users", "roles"],
        "role_id",
        ["id" => $_SESSION["id"]]
    );
    $test_info = $User->getTestsStatistic($_SESSION["id"]);
}
// dd($user_preview);

if (isset($_POST["save_img"])) {
    $Upload                  = new Upload();
    $files                   = $Upload->fileInfo($_FILES["profil_image"]);
    $Upload->valid_extension = ["png", "gif", "jpg"];
    $Upload->valid_size      = 1;
    $Upload->unit            = $Upload::MB;

    foreach ($files as $file) {
        $check_status = $Upload->checkFile($file);
        if (count($check_status["errors"]) == 0) {
            unlink(UPLOAD_PATH . $user_info->profil_img);
            if ($store_name = $Upload->uploads($file, ROOT . "/upload")) {
                $User->addProfilImage($store_name, $user_info->users_id);
                redirect("user.php");
            }
            ;
        }
    }

}

require_once ROOT . "/view/user.view.php";