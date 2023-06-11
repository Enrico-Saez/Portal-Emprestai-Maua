<?php

class Ativo extends Dbh {

    public function getAtivo($ativo) {

        $query = "SELECT id FROM equipamento WHERE ativo = ?;";
        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute(array($ativo))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        //Verifica se teve resultado
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=ativoincorreto");
            exit();
        }

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION["userId"] = $rows[0]["id"];

        $stmt = null;

    }

}