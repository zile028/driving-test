<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <!-- <h1><?php echo "{$user_info->first_name} {$user_info->last_name}"; ?></h1> -->
    <h1><?php echo $tests->test_name?></h1>
    <h5><?php echo $tests->category_name; ?></h5>
</header>
<section class="container">

    <?php if($user_info->role=="admin"): ?>
    <!-- form for add test  -->
    <article class="row no-gutters">
        <form class="col-12 no-gutters row justify-content-between border rounded-lg p-2" action="test_questions.php"
            method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            <textarea class="form-control col-12 mb-2 p-2" type="text" name="question"
                placeholder="Pitanje?"></textarea>
            <div class="col-12 d-flex mb-2">
                <label class="input-group-text" for="">Broj tačnih odgovora:</label>
                <input class="form-control col-1" type="number" name="number_answer" value="1" min="1">
            </div>
            <label class="btn btn-info mb-0" for="atach">Dodja sliku</label>
            <input type="file" name="atach" id="atach">
            <button class="btn btn-primary" name="add_question" type="submit">Dodaj pitanje</button>
        </form>
    </article>
    <?php endif; ?>

    <article class="row no-gutters mt-4">
        <?php foreach($questions as $val): ?>
        <?php $q=$val["question"]; ?>
        <?php $s=$val["solution"]; ?>

        <div class="card col-12 mb-3">
            <div class="card-header">
                <h4 class="font-weight-bold"><?php echo $q["question"]; ?></h4>
            </div>
            <div class="card-body row no-gutters">

                <div class="option col-md-8">
                    <?php if(count($s)>0): ?>
                    <ul class="list-group mr-md-4">
                        <?php foreach($s as $sol): ?>
                        <li class="list-group-item d-flex align-items-center">
                            <input class="form-control col-1" type="checkbox" name="<?php echo "answer{$q["id"]}"; ?>"
                                id="<?php echo "radio{$sol["id"]}"; ?>">

                            <label class="flex-grow-1"
                                for="<?php echo "radio{$sol["id"]}"; ?>"><?php echo $sol["solution"]; ?></label>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>

                <?php if($q["atach"]): ?>
                <div class="atach-img col-md-4">
                    <img class="p-1 border rounded" src="<?php echo ROOT_DIR . "/upload/" . $q["atach"] ; ?>" alt="">
                </div>
                <?php endif; ?>

            </div>
            <div class="card-footer">
                <?php if($user_info->role=="admin"): ?>
                <a class="btn btn-primary" href="question.php?id=<?php echo $q["id"]; ?>">Dodja solucije</a>
                <a class="btn btn-danger" href="question_delete.php?id=<?php echo $q["id"]; ?>">Obrisi pitanje</a>
                <?php endif; ?>
                <a class="btn btn-success float-right" href="question.php?id=<?php echo $q["id"]; ?>">Odgovori</a>
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