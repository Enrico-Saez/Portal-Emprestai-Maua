<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $ativo = htmlspecialchars($_POST["ativo"]);

    include "../classes/dbh.classes.php";

    $login = new LoginController($email, $password);

    $login->loginUser();

    header("location: ../emprestimos.php");

}
