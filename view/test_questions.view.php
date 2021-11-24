<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1><?php echo $tests->test_name?></h1>
    <h5><?php echo $tests->category_name; ?></h5>
</header>
<section class="container">
    <form class="d-flex" action="" method="post">
        <select class="form-control" name="question_id">
            <?php foreach($questions as $value): $question=$value["question"]; ?>
            <option value="<?php echo "{$question["id"]} | {$question["points"]}"; ?>">
                <?php echo $question["question"]; ?>
            </option>
            <?php endforeach; ?>

        </select>
        <button name="add_question" class="btn btn-primary" type="submit">Dodaj</button>
    </form>


    <article class="row no-gutters mt-4">
        <form class="col-12" method="POST" action="test_questions.php?id=<?php echo $_GET["id"]; ?>">

            <?php $i=1; foreach($questions as $val): ?>
            <?php $q=$val["question"]; ?>
            <?php $s=$val["solution"]; ?>

            <input type="hidden" name="<?php echo "question_id[{$q["id"]}]" ?>" value="<?php echo $q["id"]; ?>">
            <input type="hidden" name="<?php echo "correct_answer[{$q["id"]}]" ?>" value="<?php echo $q["answers"]; ?>">


            <div class="card mb-3">
                <div class="card-header">
                    <div>
                        <h4 class="font-weight-bold"><?php echo "{$i}: {$q["question"]}"; ?></h4>

                    </div>

                </div>
                <div class="card-body row no-gutters">

                    <div class="option col-md-8">
                        <?php if(isset($s) && count($s)>0): ?>
                        <ul class="list-group mr-md-4">
                            <?php foreach($s as $sol): ?>

                            <li class="list-group-item d-flex align-items-center">

                                <input class="form-control col-1"
                                    type="<?php echo ($q["answers"]==1) ? "radio" : "checkbox"; ?>"
                                    id="<?php echo "radio{$sol["id"]}"; ?>"
                                    name="<?php echo ($q["answers"]==1) ? "answer[{$q["id"]}]" : "answer[{$q["id"]}][{$sol["id"]}]" ; ?>"
                                    value="<?php echo ($q["answers"]==1) ? $sol["id"] : $sol["id"]; ; ?>">

                                <label class="flex-grow-1 mb-0"
                                    for="<?php echo "radio{$sol["id"]}"; ?>"><?php echo $sol["solution"]; ?></label>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>

                    <?php if($q["atach"]): ?>
                    <div class="atach-img col-md-4">
                        <img class="p-1 border rounded" src="<?php echo ROOT_DIR . "/upload/" . $q["atach"] ; ?>"
                            alt="">
                    </div>
                    <?php endif; ?>

                </div>
                <div class="card-footer d-flex justify-content-between align-items-start">
                    <p class="blockquote-footer">Broj tačnih odgovora: <?php echo $q["answers"]; ?></p>
                    <div><span class="badge badge-info">Poena: <?php echo $q["points"]; ?></span></div>
                </div>
            </div>
            <?php $i++; endforeach; ?>
            <button class="btn btn-success" type="submit" name="finish_test">Predaj test</button>
        </form>
    </article>
</section>
<?php

?>

<?php
require ROOT . "/include/bottom.php";
?>