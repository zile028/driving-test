<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1>banka pitanja</h1>
</header>
<section class="container">

    <?php if($user_info->role=="admin"): ?>
    <!-- form to add test only allow for admin  -->
    <article class="row no-gutters">
        <form class="col-12 no-gutters row justify-content-between border rounded-lg p-2" action="question_bank.php"
            method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            <textarea class="form-control col-12 mb-2 p-2" type="text" name="question"
                placeholder="Pitanje?"></textarea>
            <div class="col-12 d-flex mb-2">
                <label class="input-group-text ml-md-2" for="">Broj poena:</label>
                <input class="form-control col-1" type="number" name="points" value="1" min="1">
            </div>
            <label class="btn btn-info mb-0" for="atach">Dodja sliku</label>
            <input type="file" name="atach" id="atach">
            <button class="btn btn-primary" name="add_question" type="submit">Dodaj pitanje</button>
        </form>
    </article>
    <?php endif; ?>


    <article class="row no-gutters mt-4">
        <form class="col-12" method="POST" action="test_questions.php?id=<?php echo $_GET["id"]; ?>">

            <?php foreach($questions as $val): ?>
            <?php $q=$val["question"]; ?>
            <?php $s=$val["solution"]; ?>

            <input type="hidden" name="<?php echo "question_id[{$q["id"]}]" ?>" value="<?php echo $q["id"]; ?>">
            <input type="hidden" name="<?php echo "correct_answer[{$q["id"]}]" ?>" value="<?php echo $q["answers"]; ?>">


            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="font-weight-bold"><?php echo $q["question"]; ?></h4>
                        <p class="blockquote-footer">Broj tačnih odgovora: <?php echo $q["answers"]; ?></p>
                    </div>
                    <div> <span class="badge badge-info">Poena: <?php echo $q["points"]; ?></span></div>
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
                <div class="card-footer">
                    <?php if($user_info->role=="admin"): ?>
                    <a class="btn btn-primary" href="question.php?id=<?php echo $q["id"]; ?>">Solucije</a>
                    <a class="btn btn-warning" href="test_questions.php?id=<?php echo $q["id"]; ?>">Uredi
                        pitanje</a>
                    <a class="btn btn-danger" href="delete.php?action=qdel&id=<?php echo $q["id"]; ?>">Obriši
                        pitanje</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </form>
    </article>
</section>
<?php

?>

<?php
require ROOT . "/include/bottom.php";
?>