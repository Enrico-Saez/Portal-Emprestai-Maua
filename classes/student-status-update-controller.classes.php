<?php

class StudentStatusUpdateController extends StudentStatusUpdate {

    private $status;
    private $ra;

    public function __construct($status, $ra) {
        $this->status = $status;
        $this->ra = $ra;
    }

    public function updateStudentStatus() {
        if($this->emptyInput()) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        $this->update($this->ra, $this->status);
    }

    private function emptyInput() {
        if(empty($this->status) || empty($this->ra)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

}
