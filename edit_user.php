<?php
require_once "core/init.php";
if ($User->isLoged()) {header("location: index.php");}

$user_info = $User->selectSingleJoin(
    ["users", "roles"],
    "role_id",
    ["id" => $_SESSION["id"]]
);


if (isset($_POST["change_info"])) {
    $data = [];
    $error = [
        "info"  => [],
        "atach" => [],
    ];
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
                // redirect("user.php");
            }
        } else {
            array_push($error["atach"], $check_status["errors"]);
        }
    }
    if(count($error["info"])==0){
        $User->updateTable("users",$data,["id"=>$_SESSION["id"]]);
        redirect("edit_user.php");
    }


}elseif(isset($_POST["change_password"])){
    $error_password=[];
    $data=[];
    if ($new_password=testInput($_POST["new_password"])) {
        $data["password"] = password_hash($new_password, PASSWORD_DEFAULT);
    } else {
        array_push($error_password, "Lozinka je obavezna!");
    }

    switch (false) {
        case testInput($_POST["repeat_password"]):
            array_push($error_password, "Ponovljena lozinka je obavezna!");
            break;
        case testInput($_POST["repeat_password"]) == testInput($_POST["new_password"]):
            array_push($error_password, "Lozinke se ne poklapaju!");
            break;
    }
    if(count($error_password)==0){
        $User->updateTable("users",$data,["id"=>$_SESSION["id"]]);
        redirect("edit_user.php");
    }
}

require_once ROOT . "/view/edit_user.view.php";