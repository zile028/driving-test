<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1><?php echo "{$user_info->first_name} {$user_info->last_name}"; ?></h1>
    <h2>Testovi - <?php echo $tests->test_name?></h2>
    <p><?php echo $tests->category_name; ?></p>
</header>
<section class="container">
    <?php if($user_info->role="admin"): ?>
    <!-- form for add test  -->
    <article class="row">
        <form class="col-md-6 offset-md-3 row justify-content-between border rounded-lg p-2" action="test_questions.php"
            method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            <textarea class="form-control col-12 mb-2" type="text" name="question" placeholder="Pitanje?"></textarea>
            <label class="btn btn-info mb-0" for="atach">Dodja sliku</label>
            <input type="file" name="atach" id="atach">
            <button class="btn btn-primary" name="add_question" type="submit">Dodaj pitanje</button>
        </form>
    </article>
    <?php endif; ?>

    <article class="row no-gutters mt-4">
        <?php foreach($questions as $q): ?>
        <div class="card col-12  mb-3">
            <div class="card-header">
                <h4><?php echo $q["question"]; ?></h4>
            </div>
            <div class="card-body row no-gutters">
                <div class="option col-md-8"></div>
                <div class="atach-img col-md-4">
                    <img src="<?php echo ROOT_DIR . "/upload/" . $q["atach"] ; ?>" alt="">
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="question.php?id=<?php echo $q["id"]; ?>">Dodja solucije</a>
            </div>
        </div>
        <?php endforeach; ?>
    </article>
</section>
<?php

?>

<?php
require ROOT . "/include/bottom.php";
?>