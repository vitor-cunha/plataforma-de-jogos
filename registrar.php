<html lang="pt-br">

  <head>
    <title>Registrar | MegaGames</title>
    <?php include("links.php"); ?>
    
  </head>

  <body>
    <div class="login-box">
        <font class="login-titulo">
            Registrar
        </font>

        <form class="form-login" action="dados/registrar-dados.php" method="POST" enctype="multipart/form-data">
            <font class="input-titulo">Foto de perfil: <span style="color: grey; font-size: 16px;">(jpg, png)</span></font>
            <input style="border: none; background-color: transparent; color: white;" class="input-box" type="file" name="icon" required="">
            <font class="input-titulo">Nome:</font>
            <input class="input-box" type="text" name="nome" required="" maxlength="30">
            <font class="input-titulo">Email:</font>
            <input class="input-box" type="email" name="email" required="" maxlength="100">
            <font class="input-titulo">Senha:</font>
            <input class="input-box" type="password" name="senha" required="" maxlength="15">
            <input class="input-submit" type="submit" name="submit" value="Criar Conta">
        </form>
    </div>

  </body>

</html>