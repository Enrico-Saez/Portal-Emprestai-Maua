<?php
session_start();
if(!isset($_SESSION["userId"])) {
    header("location: ./index.php?error=notloggedin");
}
?>

<?php include "./classes/dbh.classes.php"; ?>
<?php include "./classes/lendings.classes.php"; ?>

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
    <title>Manutenção</title>
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
                <li class="mx-3"><a href="./manutencao.php">Manutenção</a></li>
                <li class="mx-3"><a href="./horarios.php">Horários</a></li>
                <li class="mx-3"><a href="/estatisticas.html">Estatísticas</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="m-4 text-center">
    <h2><strong>Manutenção</strong></h2>
</div>
<!-- Botão de Registro-->
<div class="container">
    <div class="row">
        <h5><u>Alunos</u></h5>
        <div class="col">
            <a class="btn" data-bs-toggle="collapse" href="#collapseAluno" role="button" aria-expanded="false"
               aria-controls="collapseAluno">Registro</a>
        </div>
        <div class="col">
            <a class="btn" data-bs-toggle="collapse" href="#collapseAluno2" role="button" aria-expanded="false"
               aria-controls="collapseAluno2">Alteração de estado</a>
        </div>

        </p>

        <!--Collapse de Aluno-->
        <div class="collapse" id="collapseAluno">
            <div class="card card-body mb-3">
                <div class="Alunos">
                    <p>Registro de Alunos:</p>
                    <form action="./includes/student-register.inc.php" method="post">
                        <input type="text" placeholder="Nome" name="nome-aluno">
                        <input type="text" placeholder="RA" name="ra-aluno">
                        <input type="submit" value="Confirmar">
                    </form>
                </div>
            </div>
        </div>

        <div class="collapse" id="collapseAluno2">
            <div class="card card-body mb-3">
                <div class="Alunos">
                    <p>Alterar estado de aluno</p>
                    <form action="" method="get">
                        <input type="search" placeholder="RA">
                        <input type="submit" value="Confirmar">
                    </form>
                </div>
            </div>
        </div>


        <div class="mt-4">
            <h5><u>Notebooks</u></h5>
        </div>

        <a class="btn col" data-bs-toggle="collapse" href="#collapseNotebook" role="button" aria-expanded="false"
           aria-controls="collapseExample">Registro</a>

        <a class="btn col" data-bs-toggle="collapse" href="#collapseNotebook2" role="button" aria-expanded="false"
           aria-controls="collapseExample">Alteração de estado</a>
        </p>
        <!--Collapse de Notebook-->
        <div class="collapse" id="collapseNotebook">
            <div class="card card-body mb-3">
                <div class="Alunos">
                    <p>Registro de Notebooks</p>
                    <form action="" method="get">
                        <input type="text" placeholder="Marca">
                        <input type="text" placeholder="RA">
                        <button type="button" data-bs-toggle="modal"
                                data-bs-target="#ModalRegistro">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="collapse" id="collapseNotebook2">
            <div class="card card-body mb-3">
                <div class="Alunos">
                    <p>Alterar estado de notebook</p>
                    <form action="" method="get">
                        <input type="search" placeholder="Ativo">
                        <button type="button">Selecionar</button>

                        <select name="estado" id="estado_notebook" disabled="disabled">
                            <option value="opcao1">Opção 1</option>
                            <option value="opcao2">Opção 2</option>
                            <option value="opcao3">Opção 3</option>
                        </select>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!--Modal-->
<div class="modal fade" id="ModalRegistro">
    <div class="modal-dialog modal-dialog-centered modal-sm modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalRegistro">Registrar notebooks</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <input class="container" type="text" placeholder="Escaneie o ativo do notebook" id="ativo-input"
                           name="ativo-input">
                </form>
                <p class="container"><strong>Ativos escaneados:</strong></p>
                <ul>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                    <li>Ativo</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Concluir registros</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>
