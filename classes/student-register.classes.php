<?php

class StudentRegister extends Dbh {

    protected function register($nome, $ra) {

        $query = "INSERT INTO aluno(nome, ra, id_estado) VALUES (?, ?, 4);";
        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute(array($nome, $ra))) {
            $stmt = null;
            header("location: ../manutencao.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }

}
