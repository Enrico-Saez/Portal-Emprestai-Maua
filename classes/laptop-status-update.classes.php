<?php

class LaptopStatusUpdate extends Dbh {

    protected function update($ativo, $status) {

        $query = "UPDATE equipamento SET id_estado = ? WHERE ativo = ?;";
        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute(array($status, $ativo))) {
            $stmt = null;
            header("location: ../manutencao.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }

}