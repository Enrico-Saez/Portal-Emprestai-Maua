<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $status = htmlspecialchars($_POST["status-status"]);
    $ativo = htmlspecialchars($_POST["ativo-status"]);

    include "../classes/dbh.classes.php";
    include "../classes/laptop-status-update.classes.php";
    include "../classes/laptop-status-update-controller.classes.php";


    $update = new LaptopStatusUpdateController($status, $ativo);

    $update->updateLaptopStatus();

    header("location: ../manutencao.php");

}
