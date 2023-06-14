<?php

class LaptopStatusUpdateController extends LaptopStatusUpdate {

    private $status;
    private $ativo;

    public function __construct($status, $ra) {
        $this->status = $status;
        $this->ativo = $ra;
    }

    public function updateLaptopStatus() {
        if($this->emptyInput()) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        $this->update($this->ativo, $this->status);
    }

    private function emptyInput() {
        if(empty($this->status) || empty($this->ativo)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

}
