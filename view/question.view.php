<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1><?php echo $question["question"]; ?></h1>
</header>
<section class="container">
    <?php if($question["atach"]): ?>
    <article class="row mb-3">
        <div class="col-6 offset-3 text-center">
            <img class="img-fluid p-2 border rounded-lg"
                src="<?php echo ROOT_DIR . "/upload/" . $question["atach"] ; ?>" alt="">
        </div>
    </article>
    <?php endif; ?>


    <article class="row">
        <form class="col-md-8 offset-md-2 row justify-content-between border rounded-lg p-2" action="question.php"
            method="post">
            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            <input class="form-control col-md-9 mb-0" type="text" name="option" placeholder="Ponuđen odgovor"></input>
            <input class="form-control col-md-1 mb-0" type="checkbox" name="corect" value="1"
                placeholder="Ponuđen odgovor"></input>
            <button class="btn btn-primary" name="add_option" type="submit">Dodaj</button>
        </form>
    </article>

    <article class="row no-gutters mt-4">
        <ul class="col-md-8 offset-md-2">
            <?php foreach($solution as $sol): ?>
            <li><?php echo $sol["solution"]; ?></li>
            <?php endforeach; ?>
        </ul>
    </article>
</section>
<?php

?>

<?php
require ROOT . "/include/bottom.php";
?>