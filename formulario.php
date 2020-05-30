
<?php
require_once ('php/config.php');
require_once DBAPI;

require_once("funcoes.php");
adicionameme();

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

if (!isLoggedIn()) {
  $_SESSION['message'] = "";
  header('location: index.php');
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
    <link rel="stylesheet" href="css/mandameme.css">
<script type="text/javascript" src="js/script.js"></script>

    <title>MEEM</title>
  </head>
  <body style="background: linear-gradient(to top, #ccff33 1%, #ff6600 96%);" >

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
         <a class="nav-link active" href="formulario.php">Mandar meme</a>
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
                <input type="password" name="cliente['senha']" class="form-control" id="exampleInputPassword1" maxlength="15">
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
           <h1 class="text-center">Mande seu meme</h1>

          <form action="upload.php" method="post" enctype="multipart/form-data">
              <div class="row enviameme">
                <div class="col-7">
                   <input type="text" class="form-control" name="teste['testenome']" placeholder="Nome do meme">
                </div>
                <div class="col-7 legenda">
                   <input type="text" class="form-control" name="teste['legenda']" placeholder="legenda">
                </div>
              </div>

      <div class="row enviameme">
        <div class="col">
          <input type="text" style="visibility: hidden;" id="img" class="form-control" name="teste['urlimg']" placeholder="url img">
        </div>
      </div>

      <div class="row enviameme">
        <div class="col-5">
          <input type="text" class="nomeArquivo form-control" disabled>
        </div>
        <div class="col-3">
          <label for="fileToUpload" class="btn btn-outline-dark">Selecionar</label>
        </div>
      </div>

        <div class="col-2">
          <input style="visibility: hidden;" type="file" name="fileToUpload" id="fileToUpload">
        </div>

        <div class="col-12 enviameme">
          <input type="submit" value="Enviar" name="submit" class="btn btn-dark enviar">
        </div>
      </form>

    </div>

    <div class="container enviameme" style="margin-top:10px;">
      <div class="card bg-dark text-white">
    <img src="js/ibama.jpg" class="card-img" alt="...">
    <div class="card-img-overlay">
    <h6 class="card-text text-center">Que Anjo</h6>
    </div>
  </div>
    </div>


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
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {

    $('#fileToUpload').change(function() {
     $('.nomeArquivo').val($(this).val());
     });

     $('#fileToUpload').change(function(e) {
      $('.nomeArquivo').val($(this).val());
      var nome = e.target.files[0].name;
       $('#img').val(nome);
      });

    });

    </script>

  </body>
</html>
