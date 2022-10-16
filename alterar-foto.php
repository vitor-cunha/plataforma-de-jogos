<?php
include("conexao/connect.php");
session_start();

$id = filter_input(INPUT_GET, 'id');

$usuario = [];

if($id) {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE idusuario = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    }
}

// proteção contra edição
if(!isset($_SESSION['idusuario'])) {
    header("location: index.php");
    exit();
}

if($_SESSION['idusuario'] == "") {
    header("location: index.php");
    exit();
}

if($_SESSION['idusuario'] != $usuario['idusuario']) {
    header("location: index.php");
    exit();
}
?>

<html lang="pt-br">

  <head>
    <title>Alterar foto | MegaGames</title>
    <?php include("links.php"); ?>
    
  </head>

  <body>
    <div style="top: 20px;" class="login-box">
        <font class="login-titulo">
            Alterar foto
        </font>

        <form class="form-login" action="dados/alterar-foto-dados.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $usuario['idusuario']; ?>">

            <font class="input-titulo">Foto de perfil atual: <span style="color: grey; font-size: 16px;">(jpg, png)</span></font>
            <img src="<?php echo "icon/" . $usuario['idusuario'] . "/" . $usuario['icon']; ?>" width="100%" height="350">

            <input style="border: none; background-color: transparent; color: white;" class="input-box" type="file" name="icon" required="">
            
            <input style="background-color: transparent; color: white;" class="input-submit" type="submit" name="submit" value="Salvar imagem">
        </form>
    </div>

  </body>

</html>