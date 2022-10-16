<?php
include("../conexao/connect.php");

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$capa = $_FILES['capa']['name'];
$descricao = filter_input(INPUT_POST, 'descricao');
$categoria = filter_input(INPUT_POST, 'categoria');
$tipo_jogo = filter_input(INPUT_POST, 'tipo_jogo');

if($id && $nome && $capa && $descricao && $categoria && $tipo_jogo) {
    if($_FILES["capa"]["type"] == "image/jpeg" || $_FILES["capa"]["type"] == "image/png") {

        $sql = $pdo->prepare("UPDATE jogos SET nome = :nome, capa = :capa, descricao = :descricao, categoria = :categoria, tipo_jogo = :tipo_jogo WHERE idjogos = :id");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':capa', $capa);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(':categoria', $categoria);
        $sql->bindValue(':tipo_jogo', $tipo_jogo);
        $sql->bindValue(':id', $id);
        $sql->execute();

        $diretorio = "../capas/" . $id . "/";

        mkdir($diretorio, 0755);

        move_uploaded_file($_FILES['capa']['tmp_name'], $diretorio . $capa);

        header("location: ../game.php?id=$id");
        exit();
    }
    else {
        header("location: ../game.php?id=$id");
        exit();
    }
}
else {
    header("location: ../index.php");
    exit();
}
?>