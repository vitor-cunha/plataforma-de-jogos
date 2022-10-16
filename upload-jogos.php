<?php
session_start();

if(!isset($_SESSION['idusuario'])) {
    header("location: index.php");
    exit();
}

if(isset($_SESSION['idusuario'])) {
    if($_SESSION['tipo_conta'] == "NORMAL") {
        header("location: index.php");
        exit();
    }
}
?>

<html lang="pt-br">

  <head>
    <title>Upload de jogos | MegaGames</title>
    <?php include("links.php"); ?>
    
  </head>

  <body>
    <div class="login-box">
        <font class="login-titulo">
            Adicionar jogos
        </font>

        <form class="form-login" action="dados/upload-jogos-dados.php" method="POST" enctype="multipart/form-data">
            <font class="input-titulo">Capa do jogo: <span style="color: grey; font-size: 16px;">(jpg, png)</span></font>
            <input style="border: none; background-color: transparent; color: white;" class="input-box" type="file" name="capa" required="">
            
            <font class="input-titulo">Nome do jogo:</font>
            <input class="input-box" type="text" name="nome" required="" maxlength="50">

            <font class="input-titulo">Descrição:</font>
            <textarea style="resize: vertical; text-align: left;" class="input-box" type="text" name="descricao" required="" maxlength="400"></textarea>

            <font class="input-titulo">Categoria:</font>
            <select class="input-box" name="categoria">
            <option></option>
            <option>Ação</option>
            <option>Aventura</option>
            <option>FPS</option>
            <option>MOBA</option>
            <option>MMORPG</option>
            <option>3D</option>
            <option>2D</option>
            <option>Terror</option>
            <option>VR</option>
            <option>Point Click</option>
            <option>Anime</option>
            <option>Online</option>
            <option>Guerra</option>
            <option>Desenho</option>
            <option>Construção</option>
            <option>Simulação</option>
            <option>Música</option>
            <option>Corrida</option>
            <option>Luta</option>
            <option>Futebol</option>
            <option>Esportes</option>
            <option>Lego</option>
            </select>

            <font class="input-titulo">Tipo de jogo:</font>
            <select class="input-box" name="tipo_jogo">
            <option></option>
            <option>Gratuito</option>
            <option>Pago</option>
            </select>

            <input class="input-submit" type="submit" name="submit" value="Adicionar jogo">
        </form>
    </div>

  </body>

</html>