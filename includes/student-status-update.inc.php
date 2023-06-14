<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $status = htmlspecialchars($_POST["status-status"]);
    $ra = htmlspecialchars($_POST["ra-status"]);

    echo $status;
    echo $ra;

    include "../classes/dbh.classes.php";
    include "../classes/student-status-update.classes.php";
    include "../classes/student-status-update-controller.classes.php";


    $update = new StudentStatusUpdateController($status, $ra);

    $update->updateStudentStatus();

    header("location: ../manutencao.php");

}
