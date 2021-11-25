<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1>Korisnici</h1>
</header>

<section class="container">
    <article class="row justify-content-start">

        <?php foreach ($all_users as $user): ?>
        <article class="card col-md-4 mb-3 bg-transparent border-0">
            <div class="card-header bg-light text-center">
                <h4><?php echo "{$user["first_name"]}<br>{$user["last_name"]}" ?></h4>
            </div>
            <div class="card-body p-4 bg-white text-center d-flex flex-column">
                <div class="thumbnail all-user my-3 mx-auto">
                    <?php if($user["profil_img"]): ?>
                    <img class="rounded-circle" src="<?php echo SRC_URI . $user["profil_img"]; ?>" alt="">
                    <?php else: ?>
                    <img class="rounded-circle" src="<?php echo ROOT_DIR . "/asset/logo.png"; ?>" alt="">
                    <?php endif; ?>
                </div>
                <div>
                    <form class="d-flex mb-2" action="all_users.php?id=<?php echo $user["id"]; ?>" method="POST">
                        <select class="form-control" name="role">
                            <?php foreach($roles as $role): ?>
                            <option <?php echo $role["id"]==$user["role_id"]? "selected":"" ; ?>
                                value="<?php echo $role["id"]; ?>">
                                <?php echo $role["role"]; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <button class="btn btn-secondary" type="submit" name="change_role">Промени</button>
                    </form>
                    <p>E-mail: <?php echo $user["email"]; ?></p>
                    <p>Urđenih testova: <?php echo $user["number_tests"]; ?></p>
                    <p>Poslednji pristup: <?php echo displayDate($user["last_login"]); ?></p>
                </div>
            </div>
            <div class="card-footer bg-light text-center">
                <a class="btn btn-info" href="user.php?id=<?php echo $user["id"]; ?>">Pregled</a>
                <a class="btn btn-danger" href="delete.php?action=user&id=<?php echo $user["id"]; ?>">Ukloni
                    korisnika</a>
            </div>
        </article>
        <?php endforeach; ?>
    </article>

</section>




<?php
require ROOT . "/include/bottom.php";
?>