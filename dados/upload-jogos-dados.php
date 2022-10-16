<?php
include("../conexao/connect.php");

$nome = filter_input(INPUT_POST, 'nome');
$descricao = filter_input(INPUT_POST, 'descricao');
$categoria = filter_input(INPUT_POST, 'categoria');
$tipo_jogo = filter_input(INPUT_POST, 'tipo_jogo');
$capa = $_FILES['capa']['name'];

if($nome && $descricao && $categoria && $tipo_jogo && $capa) {
    $sql = $pdo->prepare("SELECT * FROM jogos WHERE nome = :nome");
    $sql->bindValue(':nome', $nome);
    $sql->execute();

    if($_FILES["capa"]["type"] == "image/jpeg" || $_FILES["capa"]["type"] == "image/png") {

    if($sql->rowCount() == 0) {
        $sql = $pdo->prepare("INSERT INTO jogos (nome,descricao,categoria,tipo_jogo,capa) VALUES (:nome,:descricao,:categoria,:tipo_jogo,:capa)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(':categoria', $categoria);
        $sql->bindValue(':tipo_jogo', $tipo_jogo);
        $sql->bindValue(':capa', $capa);
        $sql->execute();

        $ultimo_id = $pdo->lastInsertId();

        $diretorio = "../capas/" . $ultimo_id . "/";

        mkdir($diretorio, 0755);

        move_uploaded_file($_FILES['capa']['tmp_name'], $diretorio . $capa);

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
}
?>