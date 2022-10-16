<?php
include("conexao/connect.php");

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->execute();
    $statement_u = $sql->fetchAll();

    foreach($statement_u as $usuario) {
        if($email == $_POST['email'] && $senha == $_POST['senha']) {
            session_start();
            $_SESSION['idusuario'] = $usuario['idusuario'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['senha'] = $usuario['senha'];
            $_SESSION['icon'] = $usuario['icon'];
            $_SESSION['tipo_conta'] = $usuario['tipo_conta'];
            $_SESSION['data_conta'] = $usuario['data_conta'];
            $_SESSION['situacao'] = $usuario['situacao'];

            header("location: index.php");
            exit();
        }
    }
}
?>

<html lang="pt-br">

  <head>
    <title>Login | MegaGames</title>
    <?php include("links.php"); ?>
    
  </head>

  <body>
    <div class="login-box">
        <font class="login-titulo">
            Login
        </font>

        <form action="" method="POST">
            <font class="input-titulo">Email:</font>
            <input class="input-box" type="email" name="email" required="" maxlength="100">
            <font class="input-titulo">Senha:</font>
            <input class="input-box" type="password" name="senha" required="" maxlength="15">
            <input class="input-submit" type="submit" name="submit" value="Entrar">
            <font class="input-registro">Não tem uma conta? <a style="color: grey;" href="registrar.php">registre-se</a></font>
        </form>
    </div>

  </body>

</html>