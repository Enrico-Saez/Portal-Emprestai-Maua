<?php

class LoginController extends Login {

    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser() {
        if($this->emptyInput()) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->email, $this->password);
    }

    private function emptyInput() {
        if(empty($this->email) || empty($this->password)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

}
