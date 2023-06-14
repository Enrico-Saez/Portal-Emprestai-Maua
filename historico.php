<?php
session_start();
if(!isset($_SESSION["userId"])) {
    header("location: ./index.php?error=notloggedin");
}
?>

<?php include "./classes/dbh.classes.php"; ?>
<?php include "./classes/history.classes.php"; ?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/emprestimos.css">
    <title>Histórico</title>
</head>

<body>
<nav class="navbar">
    <div class="container-fluid">
        <a href="./index.php" class="navbar-brand">
            <img src="/emprestai_logo.png" alt="Emprestaí, Mauá" width="100">
        </a>
        <div>
            <ul class="navbar m-2 ">
                <li class="mx-3"><a href="./emprestimos.php">Empréstimos</a></li>
                <li class="mx-3"><a href="./historico.php">Histórico</a></li>
                <li class="mx-3"><a href="/tab_alunos.html">Manutenção</a></li>
                <li class="mx-3"><a href="./horarios.php">Horários</a></li>
                <li class="mx-3"><a href="/estatisticas.html">Estatísticas</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="m-4 text-center">
        <h2><strong>Histórico</strong></h2>
    </div>

    <div class="filtro row mb-4 p-2">
        <div class="col"><strong>Filtrar por:</strong></div>
        <div class="col">
            <input type="search" name="filtro_RA" id="filtro" placeholder="RA do aluno">
        </div>
        <div class="col">
            <input type="search" name="filtro_Ativo" id="filtro" placeholder="Ativo do Equipamento">
        </div>
        <div class="col">
            <input type="date" name="filtro_Data" id="filtro">
        </div>
    </div>

    <div>
        <table class="table container table-striped">
            <thead>
            <tr>
                <th>Aluno</th>
                <th>Notebook</th>
                <th>Data/hora empréstimo</th>
                <th>Previsão devolução</th>
                <th>Funcionário empréstimo</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php
            $history = new History();
            $rows = $history->getHistory();
            ?>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td> <a href="#ModalAluno" data-bs-toggle="modal" data-bs-target="#ModalAluno"><?php echo $row['aluno_nome']; ?></a></td>
                    <td><?php echo $row['ativo']; ?></td>
                    <td><?php echo $row['data_hora_emprestimo']; ?></td>
                    <td><?php echo $row['data_hora_devolucao']; ?></td>
                    <td><?php echo $row['func_nome_emp']; ?></td>
                    <td><?php echo $row['func_nome_devol']; ?></td>
                    <td><?php echo $row['estado_nome']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php
    if(empty($rows)) {
        echo "<h2>Não há histórico</h2>";
    }
    ?>
</body>

</html>
