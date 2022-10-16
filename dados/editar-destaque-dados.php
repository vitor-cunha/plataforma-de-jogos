<?php
include("../conexao/connect.php");

$id = filter_input(INPUT_POST, 'id');
$titulo = filter_input(INPUT_POST, 'titulo');
$banner = $_FILES['banner']['name'];
$mais_detalhes = filter_input(INPUT_POST, 'mais_detalhes');

if($id && $titulo && $banner && $mais_detalhes) {
    if($_FILES["banner"]["type"] == "image/jpeg" || $_FILES["banner"]["type"] == "image/png") {
        
        $sql = $pdo->prepare("UPDATE pagina_principal SET titulo = :titulo, banner = :banner, mais_detalhes = :mais_detalhes WHERE idprincipal = :id");
        $sql->bindValue(':titulo', $titulo);
        $sql->bindValue(':banner', $banner);
        $sql->bindValue(':mais_detalhes', $mais_detalhes);
        $sql->bindValue(':id', $id);
        $sql->execute();

        $diretorio = "../principal/" . $id . "/";

        mkdir($diretorio, 0755);

        move_uploaded_file($_FILES['banner']['tmp_name'], $diretorio . $banner);

        header("location: ../index.php");
        exit();
    }
    else {
        header("location: ../index.php");
        exit();
    }
}
else {
    header("location: ../index.php");
    exit();
}
?>