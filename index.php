<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <title>Emprestaí, Mauá!</title>
</head>
<body class="bg">
  <div class="container caixa_login col-sm-12 col-md-5">
    <div class="mt-5">
        <img class="logo
        " src="./media/medidacerta.png" alt="Emprestaí, Mauá">
    </div>
    
    <form class="inputs" action="includes/login.inc.php" method="post">
      <div class="login form-group m-2">
        <p id="campo_txt_login">Login:</p>
        <input type="text" class="form-control" name="email" placeholder="Insira seu email">
      </div>

      <div class="senha form-group m-2">
        <p id="campo_txt_login">Senha:</p>
        <input type="password" class="form-control" name="password" placeholder="Insira sua senha">
      </div>

      <button class="botao_entrar mb-2 btn" type="submit">Entrar</button>
    </form>
  </div>
</body>

</html>