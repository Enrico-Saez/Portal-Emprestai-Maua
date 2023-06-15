<?php

class History extends Dbh {

    public function getHistory() {

        // Empréstimos de notebook, finalizados ou finalizados com atraso
        $query = "SELECT aluno.nome AS aluno_nome, equipamento.ativo, emprestimo.data_hora_emprestimo, emprestimo.data_hora_devolucao, funcionario.nome AS func_nome_emp, funcionario.nome AS func_nome_devol, estado.nome AS estado_nome FROM emprestimo
	                    INNER JOIN aluno ON aluno.id = emprestimo.id_aluno
                        INNER JOIN equipamento ON equipamento.id = emprestimo.id_equipamento
                        INNER JOIN funcionario ON funcionario.id = emprestimo.id_func_emprestimo
                        INNER JOIN estado ON estado.id = emprestimo.id_estado
	                    WHERE emprestimo.id_estado = 10 OR emprestimo.id_estado = 11 AND equipamento.id_tipo_equipamento = 1;";

        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../emprestimos.php?error=stmtfailed");
            exit();
        }

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;

        return $rows;
    }

    public function getHistoryByRA($ra) {

        // Empréstimos de notebook, finalizados ou finalizados com atraso
        $query = "SELECT aluno.nome AS aluno_nome, equipamento.ativo, emprestimo.data_hora_emprestimo, emprestimo.data_hora_devolucao, funcionario.nome AS func_nome_emp, funcionario.nome AS func_nome_devol, estado.nome AS estado_nome FROM emprestimo
	                    INNER JOIN aluno ON aluno.id = emprestimo.id_aluno
                        INNER JOIN equipamento ON equipamento.id = emprestimo.id_equipamento
                        INNER JOIN funcionario ON funcionario.id = emprestimo.id_func_emprestimo
                        INNER JOIN estado ON estado.id = emprestimo.id_estado
	                    WHERE emprestimo.id_estado = 10 OR emprestimo.id_estado = 11 AND equipamento.id_tipo_equipamento = 1 AND aluno.ra = ?;";

        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute(array($ra))) {
            $stmt = null;
            header("location: ../emprestimos.php?error=stmtfailed");
            exit();
        }

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;

        return $rows;
    }

    public function getHistoryByAtivo($ativo) {

        // Empréstimos de notebook, finalizados ou finalizados com atraso
        $query = "SELECT aluno.nome AS aluno_nome, equipamento.ativo, emprestimo.data_hora_emprestimo, emprestimo.data_hora_devolucao, funcionario.nome AS func_nome_emp, funcionario.nome AS func_nome_devol, estado.nome AS estado_nome FROM emprestimo
	                    INNER JOIN aluno ON aluno.id = emprestimo.id_aluno
                        INNER JOIN equipamento ON equipamento.id = emprestimo.id_equipamento
                        INNER JOIN funcionario ON funcionario.id = emprestimo.id_func_emprestimo
                        INNER JOIN estado ON estado.id = emprestimo.id_estado
	                    WHERE emprestimo.id_estado = 10 OR emprestimo.id_estado = 11 AND equipamento.id_tipo_equipamento = 1 AND equipamento.ativo = ?;";

        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute(array($ativo))) {
            $stmt = null;
            header("location: ../emprestimos.php?error=stmtfailed");
            exit();
        }

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;

        return $rows;
    }

    public function getHistoryByDate($date) {

        // Empréstimos de notebook, finalizados ou finalizados com atraso
        $query = "SELECT aluno.nome AS aluno_nome, equipamento.ativo, emprestimo.data_hora_emprestimo, emprestimo.data_hora_devolucao, funcionario.nome AS func_nome_emp, funcionario.nome AS func_nome_devol, estado.nome AS estado_nome FROM emprestimo
	                    INNER JOIN aluno ON aluno.id = emprestimo.id_aluno
                        INNER JOIN equipamento ON equipamento.id = emprestimo.id_equipamento
                        INNER JOIN funcionario ON funcionario.id = emprestimo.id_func_emprestimo
                        INNER JOIN estado ON estado.id = emprestimo.id_estado
	                    WHERE emprestimo.id_estado = 10 OR emprestimo.id_estado = 11 AND equipamento.id_tipo_equipamento = 1 AND DATE(emprestimo.data_hora_emprestimo) = ?;";

        $stmt = $this->connect()->prepare($query);

        //Verifica se a query funciona
        if(!$stmt->execute(array($date))) {
            $stmt = null;
            header("location: ../emprestimos.php?error=stmtfailed");
            exit();
        }

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;

        return $rows;
    }

}
