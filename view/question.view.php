<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1><?php echo $question["question"]; ?></h1>
</header>
<section class="container pb-5">
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
        <ul class="col-md-8 offset-md-2 list-group">
            <?php foreach($solution as $sol): ?>
            <li class="list-group-item <?php echo ($sol["corect"]) ? "text-success" : "" ?> d-flex align-items-center">
                <p class="flex-grow-1 m-0"><?php echo $sol["solution"]; ?></p>
                <a class="btn-sm btn-danger bg-danger"
                    href="delete_solution.php?<?php echo "id={$sol["id"]}&qid={$_GET["id"]}"; ?>"><i
                        class="fas fa-trash"></i></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="col-md-8 offset-md-2 mt-3 text-center">
            <a class="btn btn-warning"
                href="<?php echo ROOT_DIR . "/test_questions.php?id={$question["test_id"]}"; ?>">Nazad</a>
        </div>
    </article>
</section>
<?php

?>

<?php
require ROOT . "/include/bottom.php";
?>