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
            <img id="profil" src="asset/logo.png" class="img-thumbnail rounded-circle" alt="">
            <?php endif; ?>
        </div>

        <div class="col-md-6">
            <ul class="user-info list-group  ">
                <li class="list-group-item bg-transparent text-light"><span>Ime:</span>
                    <p><?php echo $user_info->first_name; ?></p>
                </li>
                <li class="list-group-item bg-transparent text-light"><span>Prezime:</span>
                    <p><?php echo $user_info->last_name; ?></p>
                </li>
                <li class="list-group-item bg-transparent text-light"><span>E-mail:</span>
                    <p><?php echo $user_info->email; ?></p>
                </li>
                <li class="list-group-item bg-transparent text-light"><span>Uloga:</span>
                    <p><?php echo $user_info->role; ?></p>
                </li>
                <li class="list-group-item bg-transparent text-light"><span>Datum
                        rođenja:</span>
                    <p><?php echo displayDate($user_info->date_birth); ?></p>
                </li>
                <li class="list-group-item bg-transparent text-light"><span>Registrovan
                        od:</span>
                    <p><?php echo displayDateTime($user_info->created_at); ?></p>
                </li>
                <li class="list-group-item bg-transparent text-light"><span>Poslednji
                        pristup:</span>
                    <p><?php echo displayDateTime($user_info->last_login); ?></p>
                </li>
                <li class="list-group-item bg-transparent text-light border-0 text-center"><a class="btn btn-primary"
                        href="edit_user.php?id=<?php echo $user_info->id; ?>">Promena
                        podataka</a>
                </li>

            </ul>
        </div>
    </article>

    <article class="container mt-3">
        <?php if(count($test_info)>0): ?>
        <table class="bg-light table">
            <thead>
                <tr>
                    <th class="text-left">Test</th>
                    <th class="text-center">Broj tačnih odgovora</th>
                    <th class="text-center">Osvojeno poena</th>
                    <th class="text-center">Procenat</th>
                    <th class="text-right">Pregledaj/Ponovi/Poništi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($test_info as $category => $value): ?>
                <tr>
                    <td class="text-center" colspan="5">
                        <h4><?php echo $category; ?></h4>
                    </td>
                </tr>

                <?php foreach($value as $t): ?>
                <tr>
                    <td class="text-left"><?php echo $t["test_name"]; ?></td>
                    <td class="text-center"><?php echo $t["number_correct"]; ?></td>
                    <td class="text-center"><?php echo $t["points"]; ?></td>
                    <td class="text-center"><?php echo $t["percent"]; ?></td>
                    <td class="text-right">
                        <a class="btn btn-warning" href="preview_test.php?id=<?php echo $t["user_test_id"]; ?>"><i
                                class="fas fa-search"></i></a>
                        <a class="btn btn-secondary" href="preview_test.php?id=<?php echo $t["test_id"]; ?>"><i
                                class="fas fa-redo"></i></a>
                        <a class="btn btn-danger" href="preview_test.php?id=<?php echo $t["test_id"]; ?>"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <h4 class="text-center text-light">Niste radili nijedan test!</h4>
        <?php endif; ?>
    </article>
</section>




<?php
require ROOT . "/include/bottom.php";
?>