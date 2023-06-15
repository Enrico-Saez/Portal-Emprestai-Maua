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
        <a href="#" class="navbar-brand">
            <img src="./media/emprestai_pintado.png" alt="Emprestai Mauá" width="300" height="40">
        </a>
        </a>
        <div>
            <ul class="navbar m-2 ">
                <li class="mx-3"><a href="./emprestimos.php">Empréstimos</a></li>
                <li class="mx-3"><a href="./historico.php">Histórico</a></li>
                <li class="mx-3"><a href="./manutencao.php">Manutenção</a></li>
                <li class="mx-3"><a href="./horarios.php">Horários</a></li>
                <li class='ms-5'><a href='#'><?php echo $_SESSION["username"] ?></a></li>
                <li class="ms-2"><a href="./logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 1.5 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="m-4 text-center">
        <h2><strong>Histórico</strong></h2>
    </div>

    <div class="container text-center">
        <div class="filtro row mb-4 p-2">
            <div class="col align-items-center justify-content-center">
                <input class="col-6" type="search" name="filtro_RA" id="filtro_RA" placeholder="RA do aluno">
                <button class="btn ml-2">Filtrar</button>
            </div>
            <div class="col align-items-center justify-content-center">
                <input class="col-6" type="search" name="filtro_Ativo" id="filtro_Ativo" placeholder="Ativo do Equipamento">
                <button class="btn ml-2">Filtrar</button>
            </div>
            <div class="col align-items-center">
                <input class="col-6" type="date" name="filtro_Data" id="filtro_Data">
                <button class="btn ml-2">Filtrar</button>
            </div>
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
        echo "
        <div>
            <h2 class='text-center'>Não há histórico</h2>
        </div>";
    }
    ?>
</body>

</html>
