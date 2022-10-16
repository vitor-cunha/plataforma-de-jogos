<?php
include("../conexao/connect.php");

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');
$icon = $_FILES['icon']['name'];

if($nome && $email && $senha && $icon) {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($_FILES["icon"]["type"] == "image/jpeg" || $_FILES["icon"]["type"] == "image/png") {
        
    if($sql->rowCount() == 0) {
        $sql = $pdo->prepare("INSERT INTO usuarios (nome,email,senha,icon) VALUES (:nome,:email,:senha,:icon)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':icon', $icon);
        $sql->execute();

        $ultimo_id = $pdo->lastInsertId();

            $diretorio = "../icon/" . $ultimo_id . "/";

            mkdir($diretorio, 0755);

            move_uploaded_file($_FILES['icon']['tmp_name'], $diretorio . $icon);

            header("location: ../login.php");
            exit();
    }
    else {
        header("location: ../registrar.php");
        exit();
    }
}
else {
    header("location: ../index.php");
    exit();
}
}
?>