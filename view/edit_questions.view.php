<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<header class="jumbotron text-center">
    <h1>Uređivanje pitanja</h1>

</header>
<section class="container">

    <?php if($_SESSION["role"]=="admin"): ?>
    <!-- form for add test  -->
    <article class="d-flex align-items-start ">

        <form class="flex-grow-1 no-gutters row justify-content-end border rounded-lg p-2" action="edit_question.php"
            method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            <input type="hidden" name="test_id" value="<?php echo $_GET["action"]; ?>">
            <input type="hidden" name="old_atach" value="<?php echo $question["atach"]; ?>">

            <textarea class="form-control col-12 mb-2 p-2" type="text" name="question"
                placeholder="Pitanje?"><?php echo $question["question"]; ?></textarea>

            <div class="col-12 d-flex mb-2">
                <label class="input-group-text" for="">Broj poena:</label>
                <input class="form-control col-1" type="number" name="points" value="<?php echo $question["points"]; ?>"
                    min="1">
            </div>

            <label class="btn btn-info mb-0" for="file-img">Promeni/Dodaj sliku</label>
            <input id="file-img" type="file" name="new_atach">

            <a class="btn btn-danger mb-0 ml-1"
                href="delete.php?action=question_img&id=<?php echo $_GET["id"]; ?>">Ukloni
                sliku</a>

            <a class="btn btn-warning mb-0 ml-1" href="question_bank.php">Nazad</a>

            <button class=" btn btn-primary ml-1" name="save_change" type="submit">Sačuvaj izmene</button>
        </form>

        <div class="col-md-4 ml-md-2 text-center thumbnail">
            <img id="profil" class="img-fluid" src="<?php echo SRC_URI . $question["atach"] ; ?>" alt="">
        </div>


    </article>
    <?php endif; ?>

</section>
<?php

?>

<?php
require ROOT . "/include/bottom.php";
?>