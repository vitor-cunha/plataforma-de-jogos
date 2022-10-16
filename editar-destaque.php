<?php
include("conexao/connect.php");
session_start();

$id = filter_input(INPUT_GET, 'id');

$destaques = [];

if($id) {
    $sql = $pdo->prepare("SELECT * FROM pagina_principal WHERE idprincipal = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $destaques = $sql->fetch(PDO::FETCH_ASSOC);
    }
}

// proteção contra edição
if(!isset($_SESSION['idusuario'])) {
    header("location: index.php");
    exit();
}

if(isset($_SESSION['idusuario'])) {
    if($_SESSION['tipo_conta'] != "ADM") {
        header("location: index.php");
        exit();
    }
}
?>

<html lang="pt-br">

  <head>
    <title>Editar página principal | MegaGames</title>
    <?php include("links.php"); ?>
    
  </head>

  <body>
    <div class="login-box">
        <font class="login-titulo">
            Editar página principal
        </font>

        <form class="form-login" action="dados/editar-destaque-dados.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $destaques['idprincipal']; ?>">

            <font class="input-titulo">Banner: <span style="color: grey; font-size: 16px;">(jpg, png)</span></font>
            <input style="border: none; background-color: transparent; color: white;" class="input-box" type="file" name="banner" required="">

            <font class="input-titulo">Titulo:</font>
            <input class="input-box" type="text" name="titulo" required="" maxlength="50" value="<?php echo $destaques['titulo']; ?>">

            <font class="input-titulo">Mais detalhes:</font>
            <input class="input-box" type="text" name="mais_detalhes" required="" maxlength="100" value="<?php echo $destaques['mais_detalhes']; ?>">

            <input class="input-submit" type="submit" name="submit" value="Salvar alterações">
        </form>
    </div>

  </body>

</html>