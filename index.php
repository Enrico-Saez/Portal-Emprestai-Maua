<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style_tab.css">
    <title>Empréstimos Ativos</title>
</head>

<body>
<nav class="navbar">
    <div class="container-fluid">
        <a href="/loginpage.html" class="navbar-brand">
            <img src="/emprestai_logo.png" alt="Emprestaí, Mauá" width="100">
        </a>
        <div>
            <ul class="navbar m-2 ">
                <li class="mx-3"><a href="/tab_emprestimos.html">Empréstimos Ativos</a></li>
                <li class="mx-3"><a href="/tab_historico.html">Histórico</a></li>
                <li class="mx-3"><a href="/tab_alunos.html">Alunos</a></li>
                <li class="mx-3"><a href="/tab_notebooks.html">Notebooks</a></li>
                <li class="mx-3"><a href="/estatisticas.html">Estatísticas</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="m-4 text-center">
    <h2>Empréstimos Ativos</h2>
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalEmprestimoComHora">Iniciar empréstimos com horário de devolução</button>
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalEmprestimoSemHora">Iniciar empréstimos sem horário de devolução</button>


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
        <tr>
            <td> <a href="#ModalAluno" data-bs-toggle="modal" data-bs-target="#ModalAluno">Enrico Ricardo Saez</a></td>
            <td>??????</td>
            <td>01/01/2023</td>
            <td>01/01/2023</td>
            <td>Roni</td>
            <td>Em andamento</td>
        </tr>
        </tbody>
    </table>
</div>


<!-- Modal Aluno-->
<div class="modal fade" id="ModalAluno">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalAluno">Enrico Ricardo Saez</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>RA:</p>
                <p>Status:</p>
                <p>Laboratórios:</p>
            </div>
        </div>
    </div>
</div>





<!-- Modal Com Horario-->
<div class="modal fade" id="ModalEmprestimoComHora">
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

<div class="modal fade" id="ModalEmprestimoComHora2">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalEmprestimoComHora2">Escaneie QRCode do aluno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input class="container" type="text" placeholder="Escaneie o QRCode do aluno" id="barcode">
            </div>
        </div>
    </div>
</div>





<!-- Modal Sem Horario-->
<div class="modal fade" id="ModalEmprestimoSemHora">
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

<div class="modal fade" id="ModalEmprestimoSemHora2">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalEmprestimoComHora2">Escaneie o QRCode do aluno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input class="container" type="text" placeholder="Escaneie o QRCode do aluno" id="barcode">
            </div>
        </div>
    </div>
</div>

<script>
    $("#barcode").keyup(function() {
        if ($(this).val().length >= 5)
            $('#modal').submit();
    })
</script>


</body>

</html>