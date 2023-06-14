<?php

class SearchForOngoingLendings extends Dbh {

    public function searchByRA($ra) {

        $query = "SELECT emprestimo.id FROM emprestimo
	                    INNER JOIN aluno ON aluno.id = emprestimo.id_aluno
                        INNER JOIN equipamento ON equipamento.id = emprestimo.id_equipamento
                        WHERE aluno.ra = ? AND equipamento.id_tipo_equipamento = 1 AND emprestimo.id_estado = 8 OR 9;";

        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute(array($ra))) {
            $stmt = null;
            header("location: ../emprestimos.php?error=stmtfailed");
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

    public function searchByAtivo($ativo) {

        $query = "SELECT emprestimo.id FROM emprestimo
                        INNER JOIN equipamento ON equipamento.id = emprestimo.id_equipamento
                        WHERE equipamento.ativo = ? AND equipamento.id_tipo_equipamento = 1 AND emprestimo.id_estado = 8 OR 9;";

        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute(array($ativo))) {
            $stmt = null;
            header("location: ../emprestimos.php?error=stmtfailed");
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