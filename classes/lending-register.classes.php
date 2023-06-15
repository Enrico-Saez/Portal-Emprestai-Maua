<?php

class LendingRegister extends SearchForOngoingLendings {

    protected function register($ra, $ativo) {


        //Verifica se já há empréstimo com esse RA ou esse ativo


        if($this->searchByRA($ra)) {
            header("location: ../emprestimos.php?error=raAlreadyHasLending");
            exit();
        }

        if($this->searchByAtivo($ativo)) {
            header("location: ../emprestimos.php?error=ativoAlreadyHasLending");
            exit();
        }


        //Recebe os IDs de aluno e equipamento com base no RA e ativo


        $query = "SELECT equipamento.id AS id_equipamento, aluno.id AS id_aluno FROM aluno INNER JOIN equipamento WHERE RA= ? AND ativo= ?;";
        $stmt = $this->connect()->prepare($query);

        if(!$stmt->execute(array($ra, $ativo))) {
            $stmt = null;
            header("location: ../emprestimos.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../emprestimos.php?error=lendingparametersnotfound");
            exit();
        }

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id_aluno = $rows[0]["id_aluno"];
        $id_equipamento = $rows[0]["id_equipamento"];

        $stmt = null;


        //Realiza o empréstimo


        $query = "INSERT INTO emprestimo (id_aluno, id_equipamento, data_hora_emprestimo, id_func_emprestimo, id_estado) VALUES (?, ?, ?, ?, 8);";
        $stmt = $this->connect()->prepare($query);

        session_start();
        if(!$stmt->execute(array($id_aluno, $id_equipamento, date('Y-m-d H:i:s', strtotime('now America/Sao_Paulo' )), $_SESSION["userId"]))) {
            $stmt = null;
            header("location: ../emprestimos.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }

}