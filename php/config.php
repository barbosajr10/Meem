<?php

//Nome do Banco de dados
define("DB_NAME", "projeto");

//Usuário do Banco de dados
define("DB_USER", "root");

//Senha do Banco de dados
define("DB_PASSWORD", "");

//Host do Banco de dados
define("DB_HOST", "localhost");

// Caminho para a pasta do sistema
if ( !defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__). '/');

// Caminho da pasta no servidor
if ( !defined('BASEURL'))
    define('BASEURL','/projeto/');

// Caminho para o aruqivo de banco de dados
if ( !defined('DBAPI'))
    define('DBAPI', ABSPATH . 'banco.php');

?>
