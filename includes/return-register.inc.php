<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $ativo = htmlspecialchars($_POST["ativo-input-devol"]);

    include "../classes/dbh.classes.php";
    include "../classes/return-register.classes.php";
    include "../classes/return-register-controller.classes.php";


    $register = new ReturnRegisterController($ativo);

    $register->registerReturn();

    header("location: ../emprestimos.php");

}
