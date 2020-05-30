<?php
session_start();
require_once("php/config.php");
require_once(DBAPI);

$usuario = null;
$usuarios = null;

$teste = null;
$testes = null;

function adiciona() {
    if (!empty($_POST['usuario'])) {
        $usuario = $_POST['usuario'];
        cadastrar('usuarios',$usuario);
        header('location: index.php');
    }
}

function adicionameme() {
    if (!empty($_POST['teste'])) {
        $teste = $_POST['teste'];
        cadastrar('testes',$teste);
        header('location: index.php');
    }
}

function index() {
    global $usuarios;
    $usuarios = listar_tudo('usuarios');
}

function indexmeme() {
    global $testes;
    $testes = listar_tudo('testes');
}

function editar() {
    if (isset($_GET['codigo'])) {
        $codigo = $_GET['codigo'];
        if (isset($_POST['usuario'])) {
            $usuario = $_POST['usuario'];
            atualizar('usuarios', $codigo, $usuario);
            header('location: index.php');
        } else {
            global $usuario;
            $usuario = listar('usuarios', $codigo);
        }
    } else {
        header('location: index.php');
    }
}

// CADASTRO DE LOGINS
function reg_login(){
   if (!empty($_POST['cliente'])) {
      $cliente = $_POST['cliente'];
      cadastrar('logins', $cliente);
      header('location: index.php'); }
}
// Função para verificar se existe usuário logado
function isLoggedIn(){
   if (isset($_SESSION['user'])) {
     return true;
    }else{
      return false; }
}
// Função para desconectar o usuário
if (isset($_GET['logout'])) {
  session_destroy();
    unset($_SESSION['user']);
      header("location: index.php");
  }

   if (isset($_POST['login_btn'])) {
         login($_POST['login'], $_POST['senha']);
  }
// Função para verificar se o usuário logado é Administrador
function isAdmin(){
   if (isset($_SESSION['user']) && $_SESSION['user']['tipo'] == 'Administrador' ) {
      return true;
     }else{
        return false;
      }
}
function deletar($codigo = null){
    global $contato;
    $contato = remover('testes', $codigo);
    header('location: index.php');
}

/*
if (!isLoggedIn()) {
$_SESSION['msg'] = "Você precisa estar logado!";
header('location: login.php');
}
*/

?>
