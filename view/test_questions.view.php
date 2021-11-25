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
    <form class="d-flex" action="" method="post">
        <select class="form-control" name="question_id">
            <?php if (count($questions) == 0): ?>
            <option value="" selected disabled>Nema dostupnih pitanja</option>
            <?php endif; ?>
            <?php foreach ($questions as $question): ?>
            <option value="<?php echo "{$question["id"]} | {$question["points"]}"; ?>">
                <?php echo $question["question"]; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <button name="add_question" class="btn btn-primary" type="submit">Dodaj</button>
    </form>

    <article class=" mt-4">

        <?php $i = 1;foreach ($test_questions as $val): ?>
        <?php $q = $val["question"]; ?>
        <?php $s = $val["solution"]; ?>

        <input type="hidden" name="<?php echo "question_id[{$q["id"]}]"; ?>" value="<?php echo $q["id"]; ?>">
        <input type="hidden" name="<?php echo "correct_answer[{$q["id"]}]"; ?>" value="<?php echo $q["answers"]; ?>">


        <div class="card mb-3">
            <div class="card-header">
                <div class="d-flex align-items-start justify-content-between">
                    <h4 class="font-weight-bold"><?php echo "{$i}: {$q["question"]}"; ?></h4>
                    <a class="btn btn-danger"
                        href="delete.php?action=remove_question&qid=<?php echo $q["id"]; ?>&tid=<?php echo $_GET["id"]; ?>"><i
                            class="far fa-times-circle"></i></a>
                </div>

            </div>
            <div class="card-body row no-gutters">

                <div class="option col-md-8">
                    <?php if (isset($s) && count($s) > 0): ?>
                    <ul class="list-group mr-md-4">
                        <?php foreach ($s as $sol): ?>
                        <li class="list-group-item d-flex align-items-center"><?php echo $sol["solution"]; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>

                <?php if ($q["atach"]): ?>
                <div class="atach-img col-md-4">
                    <img class="p-1 border rounded" src="<?php echo SRC_URI . $q["atach"]; ?>" alt="">
                </div>
                <?php endif; ?>

            </div>
            <div class="card-footer d-flex justify-content-between align-items-start">
                <p class="blockquote-footer">Broj tačnih odgovora: <?php echo $q["answers"]; ?></p>
                <div><span class="badge badge-info">Poena: <?php echo $q["points"]; ?></span></div>
            </div>
        </div>
        <?php $i++;endforeach; ?>

    </article>
</section>
<?php

; ?>

<?php
require ROOT . "/include/bottom.php";
?>