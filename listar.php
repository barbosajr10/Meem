<?php
require_once('funcoes.php');
index();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Listagem de usuarios</title>
    <style>
        table, th, td, tr {
            border: 1px solid black;
        }
    </style>
</head>
<body>

  <h1>Contatos Cadastrados</h1>
  <table>
      <tr>
          <td>Código</td>
          <td>testenome</td>
      </tr>

      <?php if ($testes) : ?>
      <?php foreach ($testes as $teste) : ?>
          <tr>
              <td><?php echo $teste['codigo'];?></td>
              <td><?php echo $teste['testenome'];?></td>
              <td><a href="alterar.php?codigo=<?php echo $contato['codigo'];?>">Atualizar</a></td>
          </tr>
      <?php endforeach; ?>
      <?php else : ?>

      <tr>
          <td>Nenhum registro encontrado</td>
      </tr>
      <?php endif; ?>
  </table>
</body>
</html>
