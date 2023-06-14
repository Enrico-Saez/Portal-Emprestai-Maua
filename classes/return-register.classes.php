<?php

class returnRegister extends Dbh{

    protected function register($ativo) {

        //Verifica se empréstimo está regular ou atrasado



        $query = "SELECT id_estado FROM emprestimo WHERE id_estado = 8 OR 9 AND id_equipamento IN (
                    SELECT id FROM equipamento WHERE ativo = ?)";
        $stmt = $this->connect()->prepare($query);

        if(!$stmt->execute(array($ativo))) {
            $stmt = null;
            header("location: ../emprestimos.php?error=stmtfailed");
            exit();
        }

        $estadoEmprestimo = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["id_estado"];

        $stmt = null;



        //Atualiza o empréstimo



        $query = "UPDATE emprestimo SET data_hora_devolucao = ?, id_func_devolucao = ?, id_estado = ? WHERE id_estado = 8 OR 9 AND id_equipamento IN (
	                SELECT id FROM equipamento WHERE ativo = ?);";
        $stmt = $this->connect()->prepare($query);

        session_start();
        if(!$stmt->execute(array(date('Y-m-d H:i:s', strtotime('now')), $_SESSION["userId"], $estadoEmprestimo, $ativo))) {
            $stmt = null;
            header("location: ../emprestimos.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }

}