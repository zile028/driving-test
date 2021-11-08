<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1>Login / Register</h1>
</header>

<section class="container text-center">
    <article class="row align-items-center">
        <div class="col-md-6 my-5">
            <form action="login_register.php" method="POST">
                <input class="form-control mb-2" type="email" name="email" placeholder="E-mail">
                <input class="form-control mb-2" type="password" name="password" placeholder="Lozinka">
                <button class="form-control btn btn-primary" name="log_btn" type="submit">Uloguj se</button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="login_register.php" method="POST">

                <div class="profil col-12 row align-items-center justify-content-strat text-center mb-2">
                    <label class="profil-img mr-3" for="file-img"><img id="profil" src="" alt=""></label>
                    <label class="btn btn-primary" for="file-img">Choose image</label>
                    <input id="file-img" type="file" name="profil_img">
                </div>

                <?php if(isset($first_name_error)): ?>
                <p class="text-danger"><?php echo $first_name_error ?></p>
                <?php endif; ?>


                <input class="form-control mb-2" type="text" name="first_name" placeholder="Ime"
                    value="<?php echo isset($first_name) ? $first_name:""  ?>">
                <?php echo isset($first_name_err) ? "<p>$first_name_err</p>":""  ?>

                <input class="form-control mb-2" type="text" name="last_name" placeholder="Prezime"
                    value="<?php echo isset($last_name) ? $last_name:""  ?>">
                <?php echo isset($last_name_err) ? "<p>$last_name_err</p>":""  ?>

                <input class="form-control mb-2" type="date" name="date_birth" placeholder="Datum rođenja"
                    value="<?php echo isset($date_birth) ? $date_birth :""  ?>">

                <?php echo isset($date_birth_err) ? "<p>$date_birth_err</p>":""  ?>

                <input class="form-control mb-2" type="email" name="email" placeholder="E-mail"
                    value="<?php echo isset($email) ? $email:""  ?>">
                <?php echo isset($email_err) ? "<p>$email_err</p>":""  ?>

                <input class="form-control mb-2" type="password" name="password" placeholder="Lozinka">
                <?php echo isset($password_err) ? "<p>$password_err</p>":""  ?>

                <input class="form-control mb-2" type="password" name="repeat_password" placeholder="Ponovi lozinku">
                <?php echo isset($repeat_password_err) ? "<p>$repeat_password_err</p>":""  ?>

                <button class="form-control btn btn-primary" name="reg_btn" type="submit">Registruj se</button>
            </form>
        </div>
    </article>
</section>

<?php
require ROOT . "/include/bottom.php";
?>