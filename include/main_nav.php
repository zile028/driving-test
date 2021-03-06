<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
    <a class="navbar-brand" href="<?php echo ROOT_URL; ?>"><img class="img-fluid" src="asset/logo-sm.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>/testovi.php">Testovi</a>
            </li>

            <?php if(!$User->isLoged() && $_SESSION["role"]=="admin"): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>/all_users.php">Korisnici</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>/question_bank.php">Banka pitanja</a>
            </li>

            <?php endif; ?>
            <?php if($User->isLoged()): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>/login_register.php">Login / Register</a>
            </li>
            <?php else: ?>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>/user.php">Moj nalog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL; ?>/logout.php">Logout</a>
            </li>
            <?php endif; ?>
        </ul>

        <?php if(!$User->isLoged()): ?>
        <div class="loged-profil">
            <a href="user.php"><img src="<?php echo SRC_URI . ($user_info->profil_img ?:"../asset/logo-sm.png"); ?>"
                    alt=""></a>
        </div>
        <?php endif; ?>
    </div>
</nav>