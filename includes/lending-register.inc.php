<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $ativo = htmlspecialchars($_POST["ativo-input"]);
    $ra = htmlspecialchars($_POST["qrcode-input"]);

    include "../classes/dbh.classes.php";
    include "../classes/search-for-ongoing-lendings.class.php";
    include "../classes/lending-register.classes.php";
    include "../classes/lending-register-controller.classes.php";


    $register = new LendingRegisterController($ativo, $ra);

    $register->registerLending();

    header("location: ../emprestimos.php");

}
