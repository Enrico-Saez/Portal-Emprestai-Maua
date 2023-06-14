<?php

class StudentRegisterController extends StudentRegister {

    private $nome;
    private $ra;

    public function __construct($nome, $ra) {
        $this->nome = $nome;
        $this->ra = $ra;
    }

    public function registerStudent() {
        if($this->emptyInput()) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        $this->register($this->nome, $this->ra);
    }

    private function emptyInput() {
        if(empty($this->nome) || empty($this->ra)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

}
