<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<section class="container text-center">

    <article class="login-register row align-items-center <?php echo (isset($_POST["reg_btn"])?"flipOn":""); ?>">

        <div class="login">
            <h2>Uloguje se:</h2>
            <form action="login_register.php" method="POST">
                <input class="form-control" type="email" name="email" placeholder="E-mail">
                <input class="form-control" type="password" name="password" placeholder="Lozinka">
                <button class="form-control btn btn-primary" name="log_btn" type="submit">Uloguj se</button>
            </form>
            <?php if($User->login_msg): ?>
            <div class="alert alert-success mt-3"><?php echo $User->login_msg; ?></div>
            <?php endif; ?>
            <button id="to-register" class="btn btn-sm btn-warning mt-3">Registruje se</button>
        </div>

        <div class="register">
            <h2>Napravi nalog</h2>
            <form action="login_register.php" method="POST">

                <?php if(isset($first_name_error)): ?>
                <p class="text-danger"><?php echo $first_name_error ?></p>
                <?php endif; ?>

                <input class="form-control <?php echo isset($first_name_err) ? "err-input":""; ?>" type="text"
                    name="first_name" placeholder="<?php echo isset($first_name_err) ? $first_name_err:"Ime"; ?>"
                    value="<?php echo isset($arg["first_name"]) ? $arg["first_name"]:""  ?>">

                <input class="form-control <?php echo isset($last_name_err) ? "err-input":""; ?>" type="text"
                    name="last_name" placeholder="<?php echo isset($last_name_err) ? "$last_name_err":"Prezime"  ?>"
                    value="<?php echo isset($arg["last_name"]) ? $arg["last_name"]:""  ?>">


                <input class="form-control <?php echo isset($date_birth_err) ? "err-input":""; ?>" type="text"
                    name="date_birth"
                    placeholder="<?php echo isset($date_birth_err) ? $date_birth_err :"Datum rođenja"  ?>"
                    onfocus="(this.type='date')" onblur="(this.type='text')" onfocus="(this.type='date')"
                    value="<?php echo isset($arg["date_birth"]) ? $arg["date_birth"] :""  ?>">



                <input class="form-control <?php echo isset($email_err) ? "err-input":""; ?>" type="email" name="email"
                    placeholder="<?php echo isset($email_err) ? $email_err:"E-mail"  ?>"
                    value="<?php echo isset($arg["email"]) ? $arg["email"]:""  ?>">

                <input class="form-control <?php echo isset($password_err) ? "err-input":""; ?>" type="password"
                    name="password" placeholder="<?php echo isset($password_err) ? $password_err:"Lozinka"  ?>">


                <input class="form-control <?php echo isset($repeat_password_err) ? "err-input":""; ?>" type="password"
                    name="repeat_password"
                    placeholder="<?php echo isset($repeat_password_err) ? $repeat_password_err:"Ponovi lozinku"  ?>">


                <button class="form-control btn btn-primary" name="reg_btn" type="submit">Registruj se</button>
            </form>
            <?php if($User->register_msg): ?>
            <div class="alert alert-success mt-3"><?php echo $User->register_msg; ?></div>
            <?php endif; ?>
            <button id="to-login" class="btn btn-sm btn-warning mt-3">Uloguj se</button>

        </div>
    </article>
</section>

<?php
require ROOT . "/include/bottom.php";
?>