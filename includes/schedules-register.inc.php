<?php

function applyHtmlSpecialCharactersToList($list) {
    foreach ($list as &$item) {
        $item = htmlspecialchars($item, ENT_QUOTES, 'UTF-8');
    }
    unset($item);
    return $list;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $curso = htmlspecialchars($_POST["curso"]);
	$semestre = htmlspecialchars($_POST["semestre"]);
    $lab = htmlspecialchars($_POST["lab"]);
	$subscribes = applyHtmlSpecialCharactersToList(json_decode($_POST["subscribes"]));
	$tolerancia = htmlspecialchars($_POST["tolerancia"]);

    include "../classes/dbh.classes.php";
    include "../classes/schedules.classes.php";
	include "../classes/schedules-register-controller.classes.php";


    $register = new SchedulesRegisterController($curso, $semestre, $lab, $subscribes, $tolerancia);

    $register->registerSchedules();

    header("location: ../horarios.php");

}