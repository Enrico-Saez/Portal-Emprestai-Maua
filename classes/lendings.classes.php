<?php

class Lendings extends Dbh {

    public function getLendings() {

        // Equipamentos do tipo notebook, com empréstimo em andamento ou atrasado
        $query = "SELECT aluno.nome AS aluno_nome, equipamento.ativo, emprestimo.data_hora_emprestimo, emprestimo.data_hora_devolucao, funcionario.nome AS func_nome, estado.nome AS estado_nome FROM emprestimo
	                    INNER JOIN aluno ON aluno.id = emprestimo.id_aluno
                        INNER JOIN equipamento ON equipamento.id = emprestimo.id_equipamento
                        INNER JOIN funcionario ON funcionario.id = emprestimo.id_func_emprestimo
                        INNER JOIN estado ON estado.id = emprestimo.id_estado
	                    WHERE emprestimo.id_estado = 9 OR 10 AND equipamento.id_tipo_equipamento = 1;";

        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;

        return $rows;
    }

}
