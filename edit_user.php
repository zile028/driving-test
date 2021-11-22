<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);

$error = [
    "info"  => [],
    "atach" => [],
];
$data = [];

if (isset($_POST["change_info"])) {
    if ($value = testInput($_POST["first_name"])) {
        $data["first_name"] = $value;
    } else {
        array_push($error["info"], "Ime je obavezno!");
    }

    if ($value = testInput($_POST["last_name"])) {
        $data["last_name"] = $value;
    } else {
        array_push($error["info"], "Prezime je obavezno!");
    }

    if ($value = testInput($_POST["email"])) {
        $data["email"] = $value;
    } else {
        array_push($error["info"], "Email je obavezan!");
    }

    if ($value = testInput($_POST["date_birth"])) {
        $data["date_birth"] = $value;
    } else {
        array_push($error["info"], "Datum rodjenja je obavezan!");
    }

    if (!empty($_FILES["profil_image"]["name"])) {
        $Upload                  = new Upload();
        $file                    = $Upload->fileInfo($_FILES["profil_image"]);
        $Upload->valid_extension = ["png", "jpg", "jpeg", "bmp"];
        $Upload->valid_size      = 1;
        $Upload->unit            = $Upload::MB;

        $check_status = $Upload->checkFile($file);
        if (count($check_status["errors"]) == 0) {
            unlink(UPLOAD_PATH . $user_info->profil_img);
            if ($store_name = $Upload->uploads($file, UPLOAD_PATH)) {
                $User->addProfilImage($store_name, $user_info->users_id);
                redirect("user.php");
            }
        } else {
            array_push($error["atach"], $check_status["errors"]);
        }
    }
    $User->updateTable("users",$data,["id"=>$_SESSION["id"]]);


}elseif(isset($_POST["change_info"])){


}

require_once ROOT . "/view/edit_user.view.php";