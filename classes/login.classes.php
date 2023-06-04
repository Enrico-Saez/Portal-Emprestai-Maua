<?php

class Login extends Dbh {

    protected function getUser($email, $password) {

        $query = "SELECT id, senha FROM funcionario WHERE email = ?;";
        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        //Verifica se teve resultado
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        //Verifica se senha é igual
        $dbPassword = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["senha"];
        if(!$password == $dbPassword) {
            $stmt = null;
            header("location: ../index.php?error=incorrectpassword");
            exit();
        }

        session_start();
        $_SESSION["userId"] = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["id"];

        $stmt = null;

    }

}
