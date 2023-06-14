<?php

class ReturnRegisterController extends ReturnRegister {

    private $ativo;

    public function __construct($ativo) {
        $this->ativo = $ativo;
    }

    public function registerReturn() {
        if($this->emptyInput()) {
            header("location: ../emprestimos.php?error=emptyinput");
            exit();
        }
        $this->register($this->ativo);
    }

    private function emptyInput() {
        if(empty($this->ativo)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

}
