<?php

class SchedulesRegisterController extends SchedulesRegister {

    private $curso;
	private $semestre;
    private $lab;
    private $subscribes;
    private $tolerancia;

    public function __construct($curso, $semestre, $lab, $subscribes, $tolerancia) {
        $this->curso = $curso;
		$this->semestre = $semestre;
        $this->lab = $lab;
		$this->subscribes = $subscribes;
        $this->tolerancia = $tolerancia;
    }

    public function registerSchedules() {
        if($this->emptyInput()) {
            header("location: ../horarios.php?error=emptyinput");
            exit();
        }
        $this->register($this->curso, $this->semestre, $this->lab, $this->subscribes, $this->tolerancia);
    }

    private function emptyInput() {
        if(empty($this->curso) || empty($this->semestre) || empty($this->lab) || empty($this->subscribes) || empty($this->tolerancia)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
}
