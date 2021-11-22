<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1>Korisnici</h1>
</header>

<section class="container">
    <?php foreach ($all_users as $user): ?>
    <article class="card mb-3">
        <div class="card-header">
            <h4>Ime prezime: <?php echo "{$user["first_name"]} {$user["last_name"]}" ?></h4>
        </div>
        <div class="card-body row p-4">
            <div class="profil-img mr-md-3">
                <?php if($user["profil_img"]): ?>
                <img class="image-fluid" src="<?php echo SRC_URI . $user["profil_img"]; ?>" alt="">
                <?php else: ?>
                <img class="image-fluid" src="<?php echo ROOT_DIR . "/asset/logo.png"; ?>" alt="">
                <?php endif; ?>
            </div>
            <div class="col-md-5">
                <p>Uloga: <?php echo $user["role"]; ?></p>
                <p>E-mail: <?php echo $user["email"]; ?></p>
            </div>

            <div class="col-md-5">
                <p>Urđenih testova: <?php echo $user["number_tests"]; ?></p>
                <p>Poslednji pristup: <?php echo displayDate($user["last_login"]); ?></p>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </article>
    <?php endforeach; ?>
</section>




<?php
require ROOT . "/include/bottom.php";
?>