
<?php
require_once ('php/config.php');
require_once DBAPI;

require_once("funcoes.php");

adicionameme();
indexmeme();

$target_dir = "imagens/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Verifica se o arquivo selecionado é uma imagem
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Imagem selecionada - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "O arquivo selecionado não é uma imagem.<br>";
        $uploadOk = 0;
    }
}
// Verifica se o arquivo já existe na pasta
if (file_exists($target_file)) {
    echo "O arquivo já existe no servidor.<br>";
    $uploadOk = 0;
}
// Verifica o tamanho do arquivo - Limite de 5mb
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Arquivo muito grande!<br>";
    $uploadOk = 0;
}
// Permite apenas determinados tipos de arquivo - jpg, png, jpeg e gif
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "São aceitas somente imagens JPG, JPEG, PNG e GIF.";
    $uploadOk = 0;
}
// Verificação de erros. Se $uploadOk=0 ocorreu algum erro
if ($uploadOk == 0) {
    echo "Erro: não foi possível fazer upload.";
// Se não ocorreu problemas, tenta fazer upload
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Arquivo ". basename( $_FILES["fileToUpload"]["name"]). " enviado.";

        session_start();
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }

    } else {
        echo "Erro ao enviar a imagem.";
    }
}
?>
