<?php

class SchedulesRegister extends Dbh {

    protected function register($curso, $semestre, $lab, $subscribes, $tolerancia) {
		
		$query = "SELECT laboratorio.id AS LAB_ID, periodo_emprestimo.id AS PERIODO_ID FROM laboratorio INNER JOIN periodo_emprestimo WHERE laboratorio.id_curso = ? and laboratorio.numero = ? and periodo_emprestimo.dia_semana= ? AND periodo_emprestimo.horario_inicio = ?;";
		$stmt = $this->connect()->prepare($query);
		
		switch($curso){
			case "cic": $curso = 1;
			break;
			case "si": $curso = 2;
			break;
			case "design": $curso = 3;
			break;
			case "adm": $curso = 4;
			break;
			case "engcivil": $curso = 5;
			break;
			case "engalimentos": $curso = 6;
			break;
			case "engmecanica": $curso = 7;
			break;
			case "engcomputacao": $curso = 8;
			break;
			case "engca": $curso = 9;
			break;
			case "engproducao": $curso = 10;
			break;
			case "engeletrica": $curso = 11;
			break;
			case "engeletronica": $curso = 12;
			break;
			case "engquimica": $curso = 13;
			break;
			case "ciclobasico": $curso = 14;
			break;
		}
		foreach ($subscribes as $subscribe) {
			switch($subscribe){	
				case "segunda_7h40": 
				$dia_semana = "Segunda";
				$horario_inicio = "7:40";
				break;
				case "segunda_9h30": 
				$dia_semana = "Segunda";
				$horario_inicio = "9:30";
				break;
				case "segunda_11h20": 
				$dia_semana = "Segunda";
				$horario_inicio = "11:20";
				break;
				case "terca_7h40": 
				$dia_semana = "Terça";
				$horario_inicio = "7:40";
				break;
				case "terca_9h30": 
				$dia_semana = "Terça";
				$horario_inicio = "9:30";
				break;
				case "terca_11h20": 
				$dia_semana = "Terça";
				$horario_inicio = "11:20";
				break;
				case "quarta_7h40": 
				$dia_semana = "Quarta";
				$horario_inicio = "7:40";
				break;
				case "quarta_9h30":
				$dia_semana = "Quarta";
				$horario_inicio = "9:30";
				break;
				case "quarta_11h20": 
				$dia_semana = "Quarta";
				$horario_inicio = "11:20";
				break;
				case "quinta_7h40": 
				$dia_semana = "Quinta";
				$horario_inicio = "7:40";
				break;
				case "quinta_9h30": 
				$dia_semana = "Quinta";
				$horario_inicio = "9:30";
				break;
				case "quinta_11h20": 
				$dia_semana = "Quinta";
				$horario_inicio = "11:20";
				break;
				case "sexta_7h40": 
				$dia_semana = "Sexta";
				$horario_inicio = "7:40";
				break;
				case "sexta_9h30": 
				$dia_semana = "Sexta";
				$horario_inicio = "9:30";
				break;
				case "sexta_11h20": 
				$dia_semana = "Sexta";
				$horario_inicio = "11:20";
				break;
			}
			
			if(!$stmt->execute(array($curso, $lab, $dia_semana, $horario_inicio))) {
				$stmt = null;
				header("location: ../horarios.php?error=stmtfailed");
				exit();
			}
			
			if($stmt->rowCount() == 0) {
				$stmt = null;
				header("location: ../horarios.php?error=lendingparametersnotfound");
				exit();
			}
			
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$id_lab = $rows[0]["id_lab"];
			$id_periodo = $rows[0]["id_periodo"];
			
			$stmt = null;
			
			
			$query = "INSERT INTO lab_periodo (id_lab, id_periodo) VALUES (?, ?);";
			$stmt = $this->connect()->prepare($query);
			
			session_start();
			if(!$stmt->execute(array($id_lab, $id_periodo))) {
            $stmt = null;
            header("location: ../horarios.php?error=stmtfailed");
            exit();
        }

        $stmt = null;		
		}
	}
}