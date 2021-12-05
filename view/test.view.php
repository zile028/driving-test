<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1><?php echo $test_info["test_name"]; ?></h1>
    <h5><?php echo $test_info["category_name"]; ?></h5>
    <p><?php echo "Pitanja: {$test_info["number_questions"]} - Maksimum poena: {$test_info["max_points"]}"; ?></p>
</header>
<section class="container">

    <article class="row no-gutters mt-4">
        <form id="form-test" class="col-12" method="POST" action="test.php?id=<?php echo $_GET["id"]; ?>">

            <?php $i=1; foreach($questions as $val): ?>
            <?php $q=$val["question"]; ?>
            <?php $s=$val["solution"]; ?>



            <div class="question card mb-3">
                <input data-name="correct_answer" type="hidden" name="<?php echo "correct_answer[{$q["id"]}]" ?>"
                    value="<?php echo $q["answers"]; ?>">
                <input data-name="question_id" type="hidden" name="<?php echo "question_id[{$q["id"]}]" ?>"
                    value="<?php echo $q["id"]; ?>">
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

                            <li class="list-group-item d-flex align-items-center"
                                data-solutionId="<?php echo $sol["id"]; ?>">

                                <input data-name="answers" class="form-control col-1"
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
                        <img class="p-1 border rounded" src="<?php echo SRC_URI . $q["atach"] ; ?>" alt="">
                    </div>
                    <?php endif; ?>

                </div>
                <div class="card-footer d-flex justify-content-between align-items-start">
                    <p class="blockquote-footer">Broj tačnih odgovora: <?php echo $q["answers"]; ?></p>
                    <div> <button class="testBtn btn-sm btn-warning" type="button"
                            data-qid="<?php echo $q["id"]; ?>">Ogovori</button>

                        <span class="badge badge-info">Poena: <?php echo $q["points"]; ?></span>
                    </div>
                </div>
            </div>
            <?php $i++; endforeach; ?>
            <button class="btn btn-success" type="button" name="finish_test">Predaj test</button>
        </form>
    </article>
</section>
<?php

?>

<?php
require ROOT . "/include/bottom.php";
?>