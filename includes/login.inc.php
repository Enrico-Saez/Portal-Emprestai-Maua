<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    $login = new LoginController($email, $password);

    $login->loginUser();

    header("location: ../emprestimos.php?error=none");

}
