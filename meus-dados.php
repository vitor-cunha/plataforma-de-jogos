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
    <title>Meus Dados | MegaGames</title>
    <?php include("links.php"); ?>
    
  </head>

  <body>
    <div class="login-box">
        <font class="login-titulo">
            Editar Conta
        </font>

        <form class="form-login" action="dados/editar-dados.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario['idusuario']; ?>">

            <font class="input-titulo">Nome:</font>
            <input class="input-box" type="text" name="nome" required="" maxlength="30" value="<?php echo $usuario['nome']; ?>">

            <font class="input-titulo">Email:</font>
            <input class="input-box" type="email" name="email" required="" maxlength="100" value="<?php echo $usuario['email']; ?>">

            <font class="input-titulo">Senha:</font>
            <input class="input-box" type="text" name="senha" required="" maxlength="15" value="<?php echo $usuario['senha']; ?>">

            <input class="input-submit" type="submit" name="submit" value="Salvar alterações">
        </form>
            <a href="dados/excluir-conta-dados.php?id=<?php echo $usuario['idusuario']; ?>"><button style="background-color: rgb(207, 9, 9);" class="input-submit" onclick="alert('Conta excluida com sucesso');">Excluir Conta</button></a>
    </div>

  </body>

</html>