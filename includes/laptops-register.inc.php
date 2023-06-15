<?php

function applyHtmlSpecialCharactersToList($list) {
    foreach ($list as &$item) {
        $item = htmlspecialchars($item, ENT_QUOTES, 'UTF-8');
    }
    unset($item);
    return $list;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST["ativos"]);
    var_dump($_POST["marca"]);
    var_dump($_POST["modelo"]);

    $ativos = applyHtmlSpecialCharactersToList(json_decode($_POST["ativos"]));
    $marca = htmlspecialchars($_POST["marca"]);
    $modelo = htmlspecialchars($_POST["modelo"]);

    include "../classes/dbh.classes.php";
    include "../classes/laptops-register.classes.php";
    include "../classes/laptops-register-controller.classes.php";

    $register = new LaptopsRegisterController($ativos, $marca, $modelo);

    $register->registerLaptops();

    header("location: ../manutencao.php");
}
