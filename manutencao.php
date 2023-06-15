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
                <li class="mx-3"><a href="#">Estatísticas</a></li>
                <li class='ms-5'><a href='#'><?php echo $_SESSION["userId"] ?></a></li>
                <li class="ms-2"><a href="/index.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 1.5 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg></a></li>
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
                    <p>Alterar Estado de Aluno:</p>
                    <form action="./includes/student-status-update.inc.php" method="post">
                        <input type="text" id="ra-status" name="ra-status" maxlength="8" placeholder="Digite o RA:">
                        <label for="mySelect">Selecione:</label>
                        <select name="status-status">
                            <option value="4">Ativo (ainda é aluno)</option>
                            <option value="5">Inativo (não é mais aluno)</option>
                        </select>
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
                        <input type="text" placeholder="Marca" id="marcaInput">
                        <input type="text" placeholder="Modelo" id="modeloInput">
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
                    <form action="./includes/laptop-status-update.inc.php" method="post">
                        <input type="text" id="ativo-status" name="ativo-status" maxlength="5" placeholder="Digite o Ativo:">
                        <label for="mySelect">Selecione:</label>
                        <select name="status-status">
                            <option value="1">Ativo (notebook disponível)</option>
                            <option value="3">Inativo (notebook descartado)</option>
                        </select>
                        <input type="submit" value="Confirmar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!--Modal de Registro-->
<div class="modal fade" id="ModalRegistro">
    <div class="modal-dialog modal-dialog-centered modal-sm modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalRegistro">Registrar notebooks</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input class="container" type="text" maxlength="5" placeholder="Escaneie o ativo do notebook" id="ativo-input" name="ativo-input">
                <p class="container"><strong>Ativos escaneados:</strong></p>
                <ul id="lista-ativos">
                </ul>
            </div>
            <div class="modal-footer">
                <button type="submit" id="enviarAtivos" class="btn btn-primary">Concluir registros</button>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const listaDeAtivos = [];


        const ModalRegistro = document.getElementById("ModalRegistro");
        const ativoInput = document.getElementById("ativo-input");
        const enviarAtivos = document.getElementById("enviarAtivos");
        let modalRegistroShown = false;

        let lastKeyPressTime = 0;
        let inputThreshold = 20;

        ativoInput.addEventListener('keydown', function(event) {
            let currentTime = new Date().getTime();
            let elapsedTime = currentTime - lastKeyPressTime;
            lastKeyPressTime = currentTime;

            if (elapsedTime > inputThreshold) {
                ativoInput.value = '';
            }
        });

        ativoInput.addEventListener('focusout', function() {
            if (modalRegistroShown) {
                setTimeout(function() {
                    ativoInput.focus();
                }, 0);
            }
        });

        ModalRegistro.addEventListener('shown.bs.modal', function() {
            modalRegistroShown = true;
            ativoInput.focus();
        });

        ModalRegistro.addEventListener('hidden.bs.modal', function() {
            modalRegistroShown = false;
        });

        ativoInput.addEventListener('input', function() {
            if(ativoInput.value.length === 5) {
                listaDeAtivos.push(ativoInput.value)
                addItem(ativoInput.value);
                ativoInput.value = "";
                ativoInput.disabled = true;
                setTimeout(function() {
                    ativoInput.disabled = false;
                    ativoInput.focus();
                }, 500);
            }
        });

        enviarAtivos.addEventListener('click', function() {
            postListData();
        });





        const listContainer = document.getElementById('lista-ativos');

        function addItem(ativo) {

            const listItem = document.createElement('li');

            listItem.textContent = ativo;

            listContainer.appendChild(listItem);
        }

        function postListData() {
            const marcaInput = document.getElementById("marcaInput");
            const modeloInput = document.getElementById("modeloInput");

            // Convert the list to JSON
            let jsonData = JSON.stringify(listaDeAtivos);

            // Create a new form element
            let form = document.createElement("form");
            form.method = "POST";
            form.action = "./includes/laptops-register.inc.php";

            // Create the first input field
            let input1 = document.createElement("input");
            input1.type = "hidden";
            input1.name = "ativos";
            input1.value = jsonData;

            // Create the second input field
            let input2 = document.createElement("input");
            input2.type = "text";
            input2.name = "marca";
            input2.value = marcaInput.value;

            // Create the third input field
            let input3 = document.createElement("input");
            input3.type = "text";
            input3.name = "modelo";
            input3.value = modeloInput.value;

            // Append the inputs to the form
            form.appendChild(input1);
            form.appendChild(input2);
            form.appendChild(input3);

            // Append the form to the document body
            document.body.appendChild(form);

            // Submit the form
            form.submit();
        }

    });

</script>

</html>
