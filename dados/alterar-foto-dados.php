<?php
include("../conexao/connect.php");

$id = filter_input(INPUT_POST, 'id');
$icon = $_FILES['icon']['name'];

if($id && $icon) {
    if($_FILES["icon"]["type"] == "image/jpeg" || $_FILES["icon"]["type"] == "image/png") {
        $sql = $pdo->prepare("UPDATE usuarios SET icon = :icon WHERE idusuario = :id");
        $sql->bindValue(':icon', $icon);
        $sql->bindValue(':id', $id);
        $sql->execute();

        $diretorio = "../icon/" . $id . "/";

        mkdir($diretorio, 0755);

        move_uploaded_file($_FILES['icon']['tmp_name'], $diretorio . $icon);

        header("location: ../login.php");
        exit();
    }
    else {
        header("location: ../alterar-foto.php?id=$id");
        exit();
    }
}
else {
    header("location: ../login.php");
    exit();
}
?>