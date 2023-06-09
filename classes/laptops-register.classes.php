<?php

class LaptopsRegister extends Dbh {

    protected function register($ativos, $marca, $modelo) {

        $query = "INSERT INTO equipamento (ativo, marca, modelo, id_tipo_equipamento, id_estado) VALUES (?, ?, ?, 1, 1);";
        $stmt = $this->connect()->prepare($query);

        foreach ($ativos as $ativo) {

            if(!$stmt->execute(array($ativo, $marca, $modelo))) {
                $stmt = null;
                header("location: ../manutencao.php?error=stmtfailed");
                exit();
            }
        }

        $stmt = null;

    }

}