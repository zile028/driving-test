<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1><?php echo "{$user_info->first_name} {$user_info->last_name}"; ?></h1>
</header>

<section class="container">
    <article class="row">
        <div class="col-md-3 offset-md-1">

            <?php if($user_info->profil_img): ?>
            <img id="profil" src="upload/<?php echo $user_info->profil_img; ?>" class="img-thumbnail rounded-circle"
                alt="">
            <?php else: ?>
            <img id="profil" src="asset/logo.png" class="img-thumbnail" alt="">
            <?php endif; ?>

            <form class="border text-center rounded-lg" action="user.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $user_info->id;?>">
                <label class="btn btn-info my-2" for="file-img">Одабери слику</label>
                <input id="file-img" type="file" name="profil_image[]" multiple>
                <button class="btn btn-success my-2" name="save_img">Сачувај</button>
            </form>
        </div>
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span>Ime:</span>
                    <p><?php echo $user_info->first_name; ?></p>
                </li>
                <li class="list-group-item"><span>Prezime:</span>
                    <p><?php echo $user_info->last_name; ?></p>
                </li>
                <li class="list-group-item"><span>E-mail:</span>
                    <p><?php echo $user_info->email; ?></p>
                </li>
                <li class="list-group-item"><span>Uloga:</span>
                    <p><?php echo $user_info->role; ?></p>
                </li>
                <li class="list-group-item"><span>Datum
                        rođenja:</span>
                    <p><?php echo displayDate($user_info->date_birth); ?></p>
                </li>
                <li class="list-group-item"><span>Registrovan
                        od:</span>
                    <p><?php echo displayDateTime($user_info->created_at); ?></p>
                </li>
                <li class="list-group-item"><span>Poslednji
                        pristup:</span>
                    <p><?php echo displayDateTime($user_info->last_login); ?></p>
                </li>
            </ul>
        </div>
    </article>
</section>




<?php
require ROOT . "/include/bottom.php";
?>