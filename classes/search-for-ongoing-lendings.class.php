<?php

class SearchForOngoingLendings extends Dbh {

    public function checkByRA($ra) {

        $query = "SELECT emprestimo.id FROM emprestimo
	                    INNER JOIN aluno ON aluno.id = emprestimo.id_aluno
                        INNER JOIN equipamento ON equipamento.id = emprestimo.id_equipamento
                        WHERE aluno.ra = ? AND equipamento.id_tipo_equipamento = 1 AND emprestimo.id_estado = 9 OR 10;";

        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute(array($ra))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        //Verifica se teve resultado
        if($stmt->rowCount() == 0) {
            $stmt = null;
            return false;
        }

        $stmt = null;

        return true;

    }

}