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
                <li class='ms-5'><a href='#'><?php echo $_SESSION["userId"] ?></a></li>
                <li class="ms-2"><a href="/index.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 1.5 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg></a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
<div class="m-4 text-center row">
    <h2>Empréstimos</h2>
    <button type="button" class="btn col m-1" data-bs-toggle="modal" data-bs-target="#ModalEmprestimo">Iniciar empréstimos</button>
    <button type="button" class="btn col m-1" data-bs-toggle="modal" data-bs-target="#ModalEmprestimoEspecial">Iniciar empréstimos de alunos não cadastrados</button>
    <button type="button" class="btn col m-1" data-bs-toggle="modal" data-bs-target="#ModalDevolucao">Iniciar devolução</button>


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
        echo "
        <div>
        <h2 class='text-center'>Não há empréstimos no momento</h2></div>";      
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





<!-- Modal Empréstimo-->
<div class="modal fade" id="ModalEmprestimo">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalAtivo">Empréstimo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./includes/lending-register.inc.php" method="post" id="lending-form">
                <div class="modal-body">
                    <input class="container" type="text" maxlength="5" placeholder="Escaneie o ativo do notebook" id="ativo-input" name="ativo-input">
                    <input class="container" type="password" maxlength="8" placeholder="Escaneie o QRCode do aluno" id="qrcode-input" name="qrcode-input">
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal Empréstimo de alunos não cadastrados-->
<div class="modal fade" id="ModalEmprestimoEspecial">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalEmprestimoEspecial">Empréstimo de alunos não cadastrados</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./includes/lending-register.inc.php" method="post" id="lending-form-especial">
                <div class="modal-body">
                    <input class="container" type="text" maxlength="5" placeholder="Escaneie o ativo do notebook" id="ativo-input-especial" name="ativo-input-especial">
                    <input class="container" type="password" maxlength="8" placeholder="Escaneie o QRCode do aluno" id="qrcode-input-especial" name="qrcode-input-especial">
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal Devolução-->
<div class="modal fade" id="ModalDevolucao">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalDevolucao">Devolução</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./includes/return-register.inc.php" method="post" id="return-form">
                <div class="modal-body">
                    <input class="container" type="text" maxlength="5" placeholder="Escaneie o ativo do notebook" id="ativo-input-devol" name="ativo-input-devol">
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalEmprestimo = document.getElementById('ModalEmprestimo');
        const ativoInput = document.getElementById('ativo-input');
        const QRCodeInput = document.getElementById('qrcode-input');
        const lendingForm = document.getElementById('lending-form');
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalEmprestimoEspecial = document.getElementById('ModalEmprestimoEspecial');
        const ativoInputEspecial = document.getElementById('ativo-input-especial');
        const QRCodeInputEspecial = document.getElementById('qrcode-input-especial');
        const lendingFormEspecial = document.getElementById('lending-form-especial');
        let modalEmprestimoEspecialShown = false;
        let ativoInputEspecialBeingUsed = false;
        let QRCodeInputEspecialBeingUsed = false;

        //Quando modal é exibido, foco no input depois de 1s
        modalEmprestimoEspecial.addEventListener('shown.bs.modal', function() {
            modalEmprestimoEspecialShown = true;
            QRCodeInputEspecial.disabled = true;
            ativoInputEspecialBeingUsed = true;
            ativoInputEspecial.focus();
        });

        modalEmprestimoEspecial.addEventListener('hidden.bs.modal', function() {
            modalEmprestimoEspecialShown = false;
        });

        ativoInputEspecial.addEventListener('input', function() {
            if(ativoInputEspecial.value.length === 5) {
                ativoInputEspecialBeingUsed = false;
                setTimeout(function() {
                    QRCodeInputEspecial.disabled = false;
                    QRCodeInputEspecialBeingUsed = true;
                    QRCodeInputEspecial.focus();
                }, 1000);
            }
        });

        QRCodeInputEspecial.addEventListener('input', function() {
            if(QRCodeInputEspecial.value.length === 8) {
                lendingFormEspecial.submit();
            }
        });


        //Lógica para inputs não saírem de foco


        ativoInputEspecial.addEventListener('focusout', function() {
            if (modalEmprestimoEspecialShown && ativoInputEspecialBeingUsed) {
                setTimeout(function() {
                    ativoInputEspecial.focus();
                }, 0);
            }
        });

        QRCodeInputEspecial.addEventListener('focusout', function() {
            if (modalEmprestimoEspecialShown && QRCodeInputEspecialBeingUsed) {
                setTimeout(function() {
                    QRCodeInputEspecial.focus();
                }, 0);
            }
        });


        //Lógica pra inputs funcionarem só com leitor de código de barras


        let lastKeyPressTime = 0;
        let inputThreshold = 20;

        ativoInputEspecial.addEventListener('keydown', function(event) {
            let currentTime = new Date().getTime();
            let elapsedTime = currentTime - lastKeyPressTime;
            lastKeyPressTime = currentTime;

            if (elapsedTime > inputThreshold) {
                ativoInputEspecial.value = '';
            }
        });

        QRCodeInputEspecial.addEventListener('keydown', function(event) {
            let currentTime = new Date().getTime();
            let elapsedTime = currentTime - lastKeyPressTime;
            lastKeyPressTime = currentTime;

            if (elapsedTime > inputThreshold) {
                QRCodeInputEspecial.value = '';
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalDevolucao = document.getElementById('ModalDevolucao');
        const ativoInputDevol = document.getElementById('ativo-input-devol');
        const returnForm = document.getElementById('return-form');
        let modalDevolucaoShown = false;

        //Quando modal é exibido, foco no input depois de 1s
        modalDevolucao.addEventListener('shown.bs.modal', function() {
            modalDevolucaoShown = true;
            ativoInputDevol.focus();
        });

        modalDevolucao.addEventListener('hidden.bs.modal', function() {
            modalDevolucaoShown = false;
        });

        ativoInputDevol.addEventListener('input', function() {
            if(ativoInputDevol.value.length === 5) {
                returnForm.submit();
            }
        });


        //Lógica para inputs não saírem de foco


        ativoInputDevol.addEventListener('focusout', function() {
            if (modalDevolucaoShown) {
                setTimeout(function() {
                    ativoInputDevol.focus();
                }, 0);
            }
        });


        //Lógica pra inputs funcionarem só com leitor de código de barras


        let lastKeyPressTime = 0;
        let inputThreshold = 20;

        ativoInputDevol.addEventListener('keydown', function(event) {
            let currentTime = new Date().getTime();
            let elapsedTime = currentTime - lastKeyPressTime;
            lastKeyPressTime = currentTime;

            if (elapsedTime > inputThreshold) {
                ativoInputDevol.value = '';
            }
        });
    });
</script>

</body>

</html>