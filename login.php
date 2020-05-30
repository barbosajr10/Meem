<?php
  require_once('funcoes.php');

  //echo $_SESSION['user']['login'];

?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>estilo.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 header text-center">
          <img src="js/errou.jpg" style="height:200px; width:200px;" alt="">
        </div>
      </div>

      <div class="container">

        <div class="row">
          <div class="col-12">
            <div class="alert alert-danger text-center" role="alert">
              Nick ou Senha não encontrados! <br> Tente Novamente
            </div>
            <div class="alert alert-primary text-center" role="alert">
              <a href="index.php">Ou Registre-se</a>
            </div>

            <form action="login.php" method="post">

              <div class="row">
                <div class="col">
                  <br>
                  <label for="logininput">Login</label>
                  <input type="text" name="login" class="form-control" id="logininput" placeholder="Digite seu login">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <br>
                  <label for="senhainput">Senha</label>
                  <input type="password" name="senha" class="form-control" id="senhainput" placeholder="Senha">
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <br>
                  <button type="submit" name="login_btn" class="btn btn-primary">Entrar</button>
                  <button type="submit" class="btn btn-danger">Limpar</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
