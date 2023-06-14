<?php

class StudentStatusUpdate extends Dbh {

    protected function update($ra, $status) {

        $query = "UPDATE aluno SET id_estado = ? WHERE ra = ?;";
        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute(array($status, $ra))) {
            $stmt = null;
            header("location: ../manutencao.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }

}