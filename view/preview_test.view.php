<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1><?php echo $test_info["test_name"]; ?></h1>
    <h5><?php echo $test_info["category_name"]; ?></h5>
    <p><?php echo "Pitanja: {$test_info["number_questions"]} - Maksimum poena: {$test_info["max_points"]}"; ?></p>
    <ul class="container list-group ">
        <li class="list-group-item bg-transparent border-0">Osovojeno poena: <?php echo $test_info["points"]; ?></li>
        <li class="list-group-item bg-transparent border-0">Tačnih odgovora: <?php echo $test_info["number_correct"]; ?>
        </li>
        <li class="list-group-item bg-transparent border-0">Uspeh: <?php echo $test_info["percent"]; ?>%</li>
    </ul>
<<<<<<< HEAD
    <a class="btn btn-primary" href="user.php">NAZAD</a>
</header>
<section class="container">
    <article>
        <p class="text-light">Kod pitanja gde je potrebno odabrati dva ili više ponuđenih odgovora, kao tačan odgovor na pitanje se uzima jedino ako se odaberu svi tačni odgovori.</p>
        <span class="btn btn-success mr-1 mb-1">TAČNO ODGOVORENO</span>
        <span class="btn btn-danger mr-1 mb-1">NETAČANO ODGOVORENO</span>
        <span class="btn btn-warning mr-1">TAČAN ODGOVOR</span>
    </article>
    <article class="mt-4">
=======
</header>
<section class="container">

    <article class=" mt-4">
>>>>>>> fc16804bd8f081fd0613a1f7793f97979cee9f25

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
                        <li class="list-group-item
                            <?php
                            // if($sol["corect"]){echo "bg-success";}
                            if(in_array($sol["id"],$answers[$q["id"]]) && $sol["corect"] )
                            {echo "bg-success";}
                            elseif(in_array($sol["id"],$answers[$q["id"]]) && !$sol["corect"]) {echo "bg-danger";}
                            elseif(!in_array($sol["id"],$answers[$q["id"]]) && $sol["corect"]){echo "bg-warning";}
                            ?>
                            ">
                            <?php echo $sol["solution"]; ?>

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
                <div><span class="badge badge-info">Poena: <?php echo $q["points"]; ?></span></div>
            </div>
        </div>
        <?php $i++; endforeach; ?>
        
    </article>
    <article class="text-center">
        <a class="btn btn-primary" href="user.php">NAZAD</a>
    </article>
</section>
<?php

?>

<?php
require ROOT . "/include/bottom.php";
?>