<?php
require ROOT . "/include/top.php";
require ROOT . "/include/main_nav.php";
?>

<div class="jumbotron text-center">
    <h1>Testovi za polaganje vozackog ispita</h1>
</div>

<div class="container text-center">
    <h2>Dobro došli na moju stranicu gde možete vežbati testove za 2017 godinu.</h2>
    <h3>

        Preuzeta su zvanična ispitna pitanja MUP Srbije. Možete vežbati testove preko mobilnog telefona,
        tableta, računara ili bilo kog drugog uređaja koji ima pritup internetu i neki od pretrazivaca (Chrome, FireFox,
        Opera...).<br>
        Da bi ste imali pristup testovima morate imati nalog i biti ulogovani.<br>
        Najnovoji testovi za polaganje vozačkog ispita B kategorije. Za uspešan ishod potrebno je 85% tačnih odgovora na
        testu.
    </h3>
</div>
<div class="container text-center mt-5">
    <?php if($User->isLoged()): ?>
    <a class="btn btn-info" href="login_register.php">Uloguj se</a>
    <?php else: ?>
    <a class="btn btn-info" href="testovi.php">Odaberi test</a>
    <?php endif; ?>
</div>

<?php
require ROOT . "/include/bottom.php";
?>