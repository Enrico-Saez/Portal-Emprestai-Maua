<?php

class LaptopsRegisterController extends LaptopsRegister {

    private $ativos;
    private $marca;
    private $modelo;

    public function __construct($ativos, $marca, $modelo) {
        $this->ativos = $ativos;
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function registerLaptops() {
        if($this->emptyInput()) {
            header("location: ../emprestimos.php?error=emptyinput");
            exit();
        }
        $this->register($this->ativos, $this->marca, $this->modelo);
    }

    private function emptyInput() {
        if(empty($this->ativos) || empty($this->marca) || empty($this->modelo)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

}