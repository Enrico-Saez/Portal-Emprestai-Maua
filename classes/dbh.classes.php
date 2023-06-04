<?php

class Dbh {

    protected function connect() {
        try {
            $dsn = 'mysql:host=localhost;dbname=emprestai_maua';
            $username = 'enrico';
            $password = '';
            $dbh = new PDO($dsn, $username, $password);
            return $dbh;
        }
        catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}