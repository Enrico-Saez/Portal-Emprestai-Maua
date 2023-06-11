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
                <li class="mx-3"><a href="/tab_historico.html">Histórico</a></li>
                <li class="mx-3"><a href="/tab_alunos.html">Alunos</a></li>
                <li class="mx-3"><a href="/tab_notebooks.html">Notebooks</a></li>
                <li class="mx-3"><a href="/estatisticas.html">Estatísticas</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="m-4 text-center">
    <h2>Empréstimos</h2>
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalAtivo">Iniciar empréstimos com horário de devolução</button>
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalAtivo">Iniciar empréstimos sem horário de devolução</button>


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
            $lendings = new Lendings();
            $rows = $lendings->getLendings();
            ?>
            <?php foreach ($rows as $row): ?>
        <tr>
            <td> <a href="#ModalAluno" data-bs-toggle="modal" data-bs-target="#ModalAluno"><?php echo $row['aluno_nome']; ?></a></td>
            <td><?php echo $row['ativo']; ?></td>
            <td><?php echo $row['data_hora_emprestimo']; ?></td>
            <td><?php echo $row['data_hora_devolucao']; ?></td>
            <td><?php echo $row['func_nome']; ?></td>
            <td><?php echo $row['estado_nome']; ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
    if(empty($rows)) {
        echo "<h2>Não há empréstimos no momento</h2>";
    }
?>

<!-- Modal Aluno Tabela-->
<div class="modal fade" id="ModalAluno">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalAluno">Enrico Ricardo Saez</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>RA: </strong>Lorem, ipsum.</p>
                <p><strong>Status: </strong>Lorem, ipsum.</p>
                <p><strong>Laboratórios: </strong>Lorem, ipsum dolor.</p>
            </div>
        </div>
    </div>
</div>





<!-- Modal ativo-->
<div class="modal fade" id="ModalAtivo">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalAtivo">Escaneie o ativo do Notebook</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./includes/ativo.inc.php" method="post">
                    <input class="container" type="text" placeholder="Escaneie o ativo do notebook" id="ativo-input" name="ativo-input">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal qr code-->
<div class="modal fade" id="ModalQRCode">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalEmprestimoComHora2">Escaneie QR Code do aluno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input class="container" type="text" placeholder="Escaneie o QRCode do aluno" id="qrcode-input" name="qrcode-input">
            </div>
        </div>
    </div>
</div>

<!-- Modal ativo sem horário-->
<div class="modal fade" id="ModalAtivoSemHora">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalEmprestimoComHora">Escaneie o ativo do Notebook</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input class="container" type="text" placeholder="Clique aqui e utilize a leitora para escanear o ativo" id="barcode">
            </div>
        </div>
    </div>
</div>

<!-- Modal qr code sem horário-->
<div class="modal fade" id="ModalQRCodeSemHora">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalEmprestimoComHora2">Escaneie o QR Code do aluno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input class="container" type="text" placeholder="Escaneie o QR Code do aluno" id="barcode">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalAtivo = document.getElementById('ModalAtivo');
        const ativoInput = document.getElementById('ativo-input');
        const modalQRCode = document.getElementById('ModalQRCode');
        const QRCodeInput = document.getElementById('qrcode-input');

        modalAtivo.addEventListener('shown.bs.modal', function() {
            ativoInput.focus();
        });

        ativoInput.addEventListener('input', function() {
            if (ativoInput.value.length === 5) {
                toggleModal(modalAtivo);
                toggleModal(modalQRCode);
                QRCodeInput.focus();
            }
        });

        ativoInput.addEventListener('keyup', function(event) {
            if (event.key === 'Enter' && ativoInput.value.length === 5) {
                toggleModal(modalAtivo);
                toggleModal(modalQRCode);
                QRCodeInput.focus();
            }
        });

        QRCodeInput.addEventListener('input', function() {
            if (QRCodeInput.value.length === 5) {
                modalQRCode.submit();
            }
        });

        function toggleModal(modal) {
            if (modal.classList.contains('show')) {
                modal.classList.remove('show');
                modal.style.display = 'none';
            } else {
                modal.classList.add('show');
                modal.style.display = 'block';
            }
        }
    });



</script>

<script ></script>


</body>

</html>