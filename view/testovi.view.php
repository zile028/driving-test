<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1>Testovi</h1>
</header>
<section class="container">
    <?php if($_SESSION["role"]=="admin"): ?>
    <!-- form for add test  -->
    <article class="row">

        <form class="col-md-6 offset-md-3 row justify-content-between border rounded-lg p-2 mb-2" action="testovi.php"
            method="post">
            <input class="form-control col-md-4" type="text" name="category_name" placeholder="Kategorija">
            <input class="form-control col-md-4" type="text" name="category_icon" placeholder="Simbol">
            <button class="btn btn-primary" name="add_category" type="submit">Dodaj kategoriju</button>
        </form>

        <form class="col-md-6 offset-md-3 row justify-content-between border rounded-lg p-2" action="testovi.php"
            method="post">
            <input class="form-control col-md-6" type="text" name="test_name" placeholder="Naziv testa">
            <select class="form-control col-md-3" name="category">
                <?php foreach($category as $cat): ?>
                <option value="<?php echo $cat["id"]; ?>"><?php echo $cat["category_name"]; ?></option>
                <?php endforeach; ?>
            </select>
            <button class="btn btn-primary" name="add_test" type="submit">Dodaj test</button>
        </form>
    </article>
    <?php endif; ?>

    <article class="row mt-4 justify-content-center">
        <?php foreach($tests as $category_name => $category_test): ?>
        <h4 class="col-12 text-center text-light"><?php echo $category_name; ?></h4>
        <?php foreach($category_test as $test):?>
        <div class="card col-md-2 testovi bg-transparent border-0 mb-3">
            <div class="card body bg-transparent">
                <a class="btn btn-success w-100 mb-1" href="test.php?id=<?php echo $test["id"]; ?>"><i
                        class="fas fa-angle-double-right"></i></a>
                <a class="btn btn-warning mb-1" href="test.php?id=<?php echo $test["id"]; ?>">
                    <div class="card-body d-flex flex-column align-item-center justify-content-center text-center">
                        <?php echo $test["icon"]; ?>
                        <h6><?php echo $test["test_name"]; ?></h6>
                        <p class="m-0"><?php echo $test["number_question"]; ?> pitanja</p>
                    </div>
                </a>
            </div>
            <?php if($_SESSION["role"]=="admin"): ?>
            <div class="card-footer d-flex p-0 bg-transparent text-center">
                <a class="btn btn-info w-50 mr-1" href="test_questions.php?id=<?php echo $test["id"]; ?>"><i
                        class="fas fa-cog"></i></a>

                <a class="btn btn-danger w-50" href="delete.php?action=tests&id=<?php echo $test["id"]; ?>"><i
                        class="fas fa-trash"></i></a>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        <?php endforeach; ?>
    </article>
</section>
<?php

?>

<?php
require ROOT . "/include/bottom.php";
?>