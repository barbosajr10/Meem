<?php
require_once ('php/config.php');
require_once DBAPI;

require_once ("funcoes.php");
//adiciona();
//index();
reg_login();
adicionameme();
indexmeme();

  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
<script type="text/javascript" src="js/script.js"></script>

    <title>MEEM</title>
  </head>
  <body style="background: linear-gradient(to top, #ccff33 1%, #ff6600 96%); background-repeat: no-repeat;" >

  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">

      <ul class="navbar-nav">
      <li class="nav-item">
        <button style="margin-left: 1vw;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      <a href="index.php"><img width="25%" src="logo.png" alt="" class="rounded-circle"></a>
      </li>
      </ul>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
     <ul class="navbar-nav">

      <li class="nav-item">
       <a class="nav-link" href="formulario.php">Mandar meme</a>
      </li>

     </ul>

         <?php  if (isset($_SESSION['user'])) : ?>
           <ul class="navbar-nav">
            <li class="nav-item">
             <a class="nav-link" href="conta.php">Usuário: <?php echo $_SESSION['user']['login']; ?></a>
             <!--  <i style="color: #888;"><?php echo ucfirst($_SESSION['user']['tipo']); ?>)</i> -->
            </li>
            </ul>
         <?php endif ?>

         <?php if (!isLoggedIn()) : ?>
           <ul class="navbar-nav">
           <li class="nav-item">
            <a class="nav-link" id="conta" data-toggle="modal" data-target="#exampleModalCenterRegistrar" href="conta.php">Registrar</a>
          </li>
        </ul>

          <ul class="navbar-nav">
           <li class="nav-item">
            <a class="nav-link" id="conta" data-toggle="modal" data-target="#exampleModalCenterLogar" href="conta.php">Logar</a>
           </li>
           </ul>
         <?php else : ?>
         <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link" href="index.php?logout='1'" style="color:red;">Sair</a>
             </li>
            </ul>
          <?php endif ?>

    </div>

    <div class="justify-content-end">

      <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>

    </div>


  </nav>

        <div class="modal fade" id="exampleModalCenterRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Registre-se</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
            </div>

          <div id="modaqmuda" class="modal-body">
             <form action="index.php" method="post">
               <div class="form-group">
                <label id="nick" for="exampleInputEmail1">Nick</label>
                 <input type="text" name="cliente['login']" class="form-control" id="exampleInputNick1" maxlength="20">
               </div>
            <div class="form-group">
             <label id="email" for="exampleInputEmail1">Email</label>
              <input type="email" name="cliente['email']" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="50">
            </div>
            <div class="form-group">
             <label id="pass" for="exampleInputPassword1">Senha</label>
              <input type="password" name="cliente['senha']" class="form-control" id="exampleInputPassword1" minlength="8" required  maxlength="15">
            </div>
            <button id="enviarlogcad" type="submit" class="btn btn-outline-dark">Registrar</button>
            </form>
          </div>

         </div>
        </div>
       </div>


        <!-- Button trigger modal -->

         <!-- Modal -->
           <div class="modal fade" id="exampleModalCenterLogar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Logar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
               </div>

             <div id="modaqmuda" class="modal-body">
               <form action="login.php" method="post">

                 <div class="row">
                   <div class="col">
                     <br>
                     <label for="logininput">Nick</label>
                     <input type="text" name="login" class="form-control" id="logininput" placeholder="Digite seu nick">
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
                     <button type="submit" name="login_btn" class="btn btn-outline-dark">Entrar</button>
                     <button type="submit" class="btn btn-outline-danger">Limpar</button>
                   </div>
                 </div>
               </form>
             </div>

            </div>
           </div>
          </div>


  <div class="container">

    <?php if ($testes) : ?>
    <?php foreach ($testes as $teste) : ?>

<div class="row conteudo justify-content-center">
 <div class="col-8">
  <div class="card" style=" background-color: #2e2e2e;">
    <img src="imagens/<?php echo $teste['urlimg'] ?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h1 class="card-title text-center" style="color: darkgrey;"><?php echo $teste['testenome'];?></h1>
      <h5 style="color: darkgrey;" class="card-text text-center"><?php echo $teste['legenda'];?></h5>
      <div class="row justify-content-end">
          <?php  if (isAdmin()) : ?>
          <strong><a style="color: red;" href="deletar.php?codigo=<?php echo $teste['codigo'];?>">Remover</a></strong>
          <?php endif ?>
      </div>
    </div>
   </div>
 </div>
</div>

      <?php endforeach; ?>
      <?php else : ?>
        <p class="card-text"><small class="text-muted">Nenhum registro encontrado</small></p>

      <?php endif; ?>

</div>


  <?php
    $db = abre_banco();

    if ($db) {
        //echo '<h1> Banco de dados conectado. :) </h1>';
    } else {
        //echo '<h1> Não foi possível conectar, :( </h1>';
    }
  ?>
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div class="container-fluid">
      <footer>
        <div class="row rodape" style="  margin-top: 10px; height: 100px; background-color: #303030;">
          <div class="col-8">
            <h6 style="color:gainsboro; margin-top:15px;">Email: <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" style="color:gainsboro;">meem.meme@gmail.com</a></h6>
            <h6 style="color:gainsboro; margin-top:25px;">Contato: (19) 97100-3950</h6>
          </div>
          <div class="col">
            <h6 style="color:gainsboro; margin-top:15px;">Redes Sociais</h6>
            <a href="https://www.facebook.com/barbosa.gabriel95%22%3E">
              <img width="25" height="25" src="js/facebook.svg" alt="">
            </a>
            <a href="https://www.instagram.com/barbosajr17/?hl=pt-br%22%3E">
              <img width="25" height="25" src="js/instagram.svg" alt="">
            </a>
            <a href="https://github.com/barbosajr10%22%3E">
              <img width="25" height="25" src="js/github.svg" alt="">
            </a>
          </div>
        </div>

      </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
