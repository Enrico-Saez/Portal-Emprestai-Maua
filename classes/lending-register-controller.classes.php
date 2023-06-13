<?php

class LendingRegisterController extends LendingRegister {

    private $ativo;
    private $ra;

    public function __construct($ativo, $ra) {
        $this->ativo = $ativo;
        $this->ra = $ra;
    }

    public function registerLending() {
        // Debugging code
        echo "Ativo: " . $this->ativo . "<br>";
        echo "RA: " . $this->ra . "<br>";
        exit();

        if($this->emptyInput()) {
            header("location: ../emprestimos.php?error=emptyinput");
            exit();
        }
        $this->register($this->ra, $this->ativo);
    }

    private function emptyInput() {
        if(empty($this->ativo) || empty($this->ra)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

}
