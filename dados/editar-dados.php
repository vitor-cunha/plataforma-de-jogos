<?php
include("../conexao/connect.php");

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

if($id && $nome && $email && $senha) {
    $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE idusuario = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header("location: ../login.php");
    exit();
}
else {
    header("location: ../login.php");
    exit();
}
?>