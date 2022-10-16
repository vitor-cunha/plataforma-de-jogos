<?php
include("../conexao/connect.php");

$id = filter_input(INPUT_GET, 'id');

if($id) {
    $sql = $pdo->prepare("DELETE FROM usuarios WHERE idusuario = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
}

header("location: ../login.php");
exit();