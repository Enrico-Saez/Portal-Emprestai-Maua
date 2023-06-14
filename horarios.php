<?php
session_start();
if(!isset($_SESSION["userId"])) {
    header("location: ./index.php?error=notloggedin");
}
?>

<?php include "./classes/dbh.classes.php"; ?>

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
    <title>Empréstimos</title>
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
    <h2><strong>Horários de Empréstimo</strong></h2>
</div>
<div class="container">

    <div class="row">
        <div class="selecionar_curso col">
            <h6>Escolha o curso:</h6>
        </div>
        <div class="col row">
            <label for="mySelect">Selecione:</label>
            <select name="curso" id="curso">
                <option value="cic">Ciência da Computação</option>
                <option value="si">Sistemas de Informação</option>
                <option value="design">Design</option>
                <option value="adm">Administração</option>
                <option value="engcivil">Eng Civil</option>
                <option value="engalimentos">Eng Alimentos</option>
                <option value="engmecanica">Eng Mecânica</option>
                <option value="engcomputacao">Eng Computação</option>
                <option value="engcontroleaut">Eng Controle e Automação</option>
                <option value="engproducao">Eng Produção</option>
                <option value="engeletrica">Eng Elétrica</option>
                <option value="engeletronica">Eng Eletrônica</option>
                <option value="engquimica">Eng Química</option>
            </select>
        </div>
        <div class="selecionar_semestre col">
            <h6>Escolha o semestre:</h6>
        </div>
        <div class="col row">
            <select name="semestre" id="semestre">
                <option value="null">selecione</option>
                <option value="lab1">lab1</option>
                <option value="lab2">lab2</option>
            </select>
        </div>
        <div class="selecionar_lab col">
            <h6>Escolha o laboratório:</h6>
        </div>
        <div class="col row">
            <select name="lab" id="lab">
                <option value="null">selecione</option>
                <option value="lab1">lab1</option>
                <option value="lab2">lab2</option>
            </select>
        </div>
    </div>

    <table id="tabela_horarios" class="table table-hover mt-4">
        <thead>
        <tr>
            <th scope="col">Horários</th>
            <th scope="col">Segunda</th>
            <th scope="col">Terça</th>
            <th scope="col">Quarta</th>
            <th scope="col">Quinta</th>
            <th scope="col">Sexta</th>
        </tr>
        </thead>

        <tbody class="table-group-divider">
        <tr>
            <th scope="row">7h40 às 9h20</th>
            <td><input type="checkbox" id="segunda_7h40" name="subscribe" value="segunda_7h40" /></td>
            <td><input type="checkbox" id="terca_7h40" name="subscribe" value="terca_7h40" /></td>
            <td><input type="checkbox" id="quarta_7h40" name="subscribe" value="quarta_7h40" /></td>
            <td><input type="checkbox" id="quinta_7h40" name="subscribe" value="quinta_7h40" /></td>
            <td><input type="checkbox" id="sexta_7h40" name="subscribe" value="sexta_7h40" /></td>
        </tr>
        <tr>
            <th scope="row">9h30 às 11h10</th>
            <td><input type="checkbox" id="segunda_9h30" name="subscribe" value="segunda_9h30" /></td>
            <td><input type="checkbox" id="terca_9h30" name="subscribe" value="terca_9h30" /></td>
            <td><input type="checkbox" id="quarta_9h30" name="subscribe" value="quarta_9h30" /></td>
            <td><input type="checkbox" id="quinta_9h30" name="subscribe" value="quinta_9h30" /></td>
            <td><input type="checkbox" id="sexta_9h30" name="subscribe" value="sexta_9h30" /></td>
        </tr>
        <tr>
            <th scope="row">11h20 às 13h00</th>
            <td><input type="checkbox" id="segunda_11h20" name="subscribe" value="segunda_11h20" /></td>
            <td><input type="checkbox" id="terca_11h20" name="subscribe" value="terca_11h20" /></td>
            <td><input type="checkbox" id="quarta_11h20" name="subscribe" value="quarta_11h20" /></td>
            <td><input type="checkbox" id="quinta_11h20" name="subscribe" value="quinta_11h20" /></td>
            <td><input type="checkbox" id="sexta_11h20" name="subscribe" value="sexta_11h20" /></td>
        </tr>
        </tbody>
    </table>

    <div class="row">
        <h6 class="col">Tempo de tolerância:</h6>
        <!-- Será um tempo de tolerância para o lab em si?-->
        <select class="col" name="laboratório" id="laboratório">
            <option value="tempo1">5min</option>
            <option value="tempo2">10min</option>
            <option value="tempo3">15min</option>
        </select>
    </div>
    <div class="text-center m-5">
        <input type="submit" value="Salvar alterações">
    </div>
</div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let modalEmprestimoShown = false;
        let ativoInputBeingUsed = false;
        let QRCodeInputBeingUsed = false;

        //Quando modal é exibido, foco no input depois de 1s
        modalEmprestimo.addEventListener('shown.bs.modal', function() {
            modalEmprestimoShown = true;
            QRCodeInput.disabled = true;
            ativoInputBeingUsed = true;
            ativoInput.focus();
        });

        modalEmprestimo.addEventListener('hidden.bs.modal', function() {
            modalEmprestimoShown = false;
        });

        ativoInput.addEventListener('input', function() {
            if(ativoInput.value.length === 5) {
                ativoInputBeingUsed = false;
                setTimeout(function() {
                    QRCodeInput.disabled = false;
                    QRCodeInputBeingUsed = true;
                    QRCodeInput.focus();
                }, 1000);
            }
        });

        QRCodeInput.addEventListener('input', function() {
            if(QRCodeInput.value.length === 8) {
                lendingForm.submit();
            }
        });


        //Lógica para inputs não saírem de foco


        ativoInput.addEventListener('focusout', function() {
            if (modalEmprestimoShown && ativoInputBeingUsed) {
                setTimeout(function() {
                    ativoInput.focus();
                }, 0);
            }
        });

        QRCodeInput.addEventListener('focusout', function() {
            if (modalEmprestimoShown && QRCodeInputBeingUsed) {
                setTimeout(function() {
                    QRCodeInput.focus();
                }, 0);
            }
        });


        //Lógica pra inputs funcionarem só com leitor de código de barras


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

        QRCodeInput.addEventListener('keydown', function(event) {
            let currentTime = new Date().getTime();
            let elapsedTime = currentTime - lastKeyPressTime;
            lastKeyPressTime = currentTime;

            if (elapsedTime > inputThreshold) {
                QRCodeInput.value = '';
            }
        });
    });
</script>

</html>