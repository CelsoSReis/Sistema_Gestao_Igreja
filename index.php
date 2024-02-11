<?php 
require_once("conexao.php");
 ?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="img/logo-icone.ico" rel="shortcut icon" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/login.css">

  <title><?php echo $nome_igreja_sistema ?></title>
</head>
<body>

<body class="text-center">
    
<main class="form-signin">
  <form method="post" action="autenticar.php">
    <img class="mb-4" src="img/logo.svg" alt="Igrejas" width="100%">
    <!--<h1 class="h3 mb-3 fw-normal">Login</h1>-->

    <div class="form-floating mb-2">
      <input type="text" class="form-control" name="usuario" id="floatingInput" placeholder="E-mail ou CPF" required>
      <label for="floatingInput">Usuário</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="senha" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Senha</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Manter Conectado
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
  </form>
</main>
</body>
</html>