<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1><?php echo "{$user_info->first_name} {$user_info->last_name}"; ?></h1>

</header>

<section class="container">
    <form class="row border p-3 text-light mt-3 rounded-lg" action="edit_user.php" method="POST"
        enctype="multipart/form-data">

        <div class="col-md-3 offset-md-1 text-center">
            <?php if($user_info->profil_img): ?>
            <img id="profil" src="<?php echo SRC_URI . $user_info->profil_img; ?>" class="img-thumbnail rounded-circle"
                alt="">
            <?php else: ?>
            <img id="profil" src="asset/logo.png" class="img-thumbnail rounded-circle" alt="">
            <?php endif; ?>

            <input type="hidden" name="id" value="<?php echo $user_info->id;?>">
            <label class="btn btn-info my-2" for="file-img">Одабери слику</label>
            <input id="file-img" type="file" name="profil_image">
        </div>

        <div class="col-md-6 text-light d-flex flex-column justify-content-between">
            <div class="d-flex align-items-center">
                <label class="m-0 col-md-6">Ime</label>
                <input name="first_name" class="form-control" type="text" placeholder="Ime"
                    value="<?php echo testInput($user_info->first_name); ?>">
            </div>

            <div class="d-flex align-items-center">
                <label class="m-0 col-md-6">Prezime</label>
                <input name="last_name" class="form-control" type="text" placeholder="Prezime"
                    value="<?php echo testInput($user_info->last_name); ?>">
            </div>

            <div class="d-flex align-items-center">
                <label class="m-0 col-md-6">E-mail</label>
                <input name="email" class="form-control" type="email" placeholder="E-mail"
                    value="<?php echo testInput($user_info->email); ?>">
            </div>

            <div class="d-flex align-items-center">
                <label class="m-0 col-md-6">Datum rođenja</label>
                <input name="date_birth" class="form-control" type="date" placeholder="Datum rođenja"
                    value="<?php echo testInput($user_info->date_birth); ?>">
            </div>
        </div>
        <!-- error message -->
        <?php if(isset($error) && count($error["info"])>0): ?>
        <div class="col-12 text-danger">
            <ul class="list-group">

                <?php foreach($error["info"] as $err): ?>
                <li><?php echo($err); ?></li>
                <?php endforeach; ?>

            </ul>
        </div>
        <?php endif; ?>

        <?php if(isset($error) && count($error["atach"])>0): ?>
        <div class="col-12 text-danger">
            <ul class="list-group">
                <?php foreach($error["atach"][0] as $err): ?>
                <li><?php echo($err); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <div class="col-12 mt-5 text-center">
            <button class="btn btn-primary" type="submit" name="change_info">Sačuvaj izmene</button>
        </div>
    </form>

    <form class="row border p-3 text-light mt-3 rounded-lg" action="edit_user.php" method="POST">
        <div class="col-12 text-center">
            <h4>Promeni lozinku</h4>
        </div>

        <div class="col-md-6">
            <label for="">Nova lozinka</label>
            <input class="form-control" type="password" name="new_password">
        </div>
        <div class="col-md-6">
            <label for="">Unesi ponovo novu lozinku</label>
            <input class="form-control" type="password" name="repeat_password">
        </div>
        <div class="col-12 mt-3 text-center">
            <button class="btn btn-primary" type="submit" name="change_password">Promeni lozinku</button>
        </div>

        <?php if(isset($error_password) && count($error_password)>0): ?>
        <div class="col-12 text-danger">
            <ul class="list-group">
                <?php foreach($error_password as $err): ?>
                <li><?php echo($err); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
    </form>

</section>




<?php
require ROOT . "/include/bottom.php";
?>