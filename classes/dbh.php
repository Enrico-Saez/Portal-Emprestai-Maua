<?php

$dsn = 'mysql:host=localhost;dbname=emprestai_maua';
$username = 'username';
$password = 'password';

$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

class Dbh {

    protected function connect() {
        try {
            $dsn = 'mysql:host=localhost;dbname=emprestai_maua';
            $username = 'username';
            $password = 'password';
            $dbh = new PDO($dsn, $username, $password);
            return $dbh;
        }
        catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}