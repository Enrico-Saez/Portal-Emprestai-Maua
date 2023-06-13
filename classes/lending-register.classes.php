<?php

class LendingRegister extends SearchForOngoingLendings {

    protected function register($ra, $ativo) {


        //Verifica se já há empréstimo com esse RA ou esse ativo


        if($this->searchByRA($ra)) {
            header("location: ../emprestimos.php?error=DEFINIR");
            exit();
        }

        if($this->searchByAtivo($ativo)) {
            header("location: ../emprestimos.php?error=DEFINIR ERROOOOO");
            exit();
        }


        //Recebe os IDs de aluno e equipamento com base no RA e ativo


        $query = "SELECT id AS id_aluno, NULL AS id_equipamento FROM aluno WHERE ra = ?
                    UNION
                    SELECT NULL AS id_aluno, id AS id_equipamento FROM equipamento WHERE ativo = ?;";
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


        $query = "INSERT INTO emprestimo (id_aluno, id_equipamento, data_hora_emprestimo, id_func_emprestimo, id_estado) VALUES (?, ?, ?, ?, 9);";
        $stmt = $this->connect()->prepare($query);

        session_start();
        if(!$stmt->execute(array($id_aluno, $id_equipamento, date('Y-m-d H:i:s'), $_SESSION["userId"]))) {
            $stmt = null;
            header("location: ../emprestimos.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }

}