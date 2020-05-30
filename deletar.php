<?php
require_once('funcoes.php');

if (isset($_GET['codigo'])){
    deletar($_GET['codigo']);
} else {
    die("ERRO: Código não definido");
}

?>
