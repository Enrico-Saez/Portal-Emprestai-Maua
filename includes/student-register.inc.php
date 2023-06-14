<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = htmlspecialchars($_POST["nome-aluno"]);
    $ra = htmlspecialchars($_POST["ra-aluno"]);

    include "../classes/dbh.classes.php";
    include "../classes/student-register.classes.php";
    include "../classes/student-register-controller.classes.php";


    $register = new StudentRegisterController($nome, $ra);

    $register->registerStudent();

    header("location: ../manutencao.php");

}
