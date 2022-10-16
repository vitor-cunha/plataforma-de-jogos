<?php
include("conexao/connect.php");
session_start();
?>

<html lang="pt-br">

  <head>
    <title>MegaGames</title>
    <?php include("links.php"); ?>
    <?php include("menu.php"); ?>
    
  </head>

  <body>
    <?php
    $destaque = [];

    $sql = $pdo->query("SELECT * FROM pagina_principal ORDER BY idprincipal ASC LIMIT 1");
    if($sql->rowCount() > 0) {
      $destaque = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <?php foreach($destaque as $destaques): ?>
    <div class="destaque">
      <img class="destaque-banner" src="<?php echo 'principal/' . $destaques['idprincipal'] . '/' . $destaques['banner']; ?>" width="100%" height="500">

      <div class="destaque-titulo-box">
        <?php echo $destaques['titulo']; ?> <p>
        <a href="<?php echo $destaques['mais_detalhes']; ?>"><button class="destaque-button">Mais detalhes</button></a>
      </div>
    </div>
    <?php endforeach; ?>

    <header class="menu-2">
      <ul>
        <a href="jogos-recentes.php"><li class="opcoes-menu-2">Jogos Recentes</li></a>
        <a href="jogos-gratuitos.php"><li class="opcoes-menu-2">Jogos Gratuitos</li></a>
        <a href="jogos-pagos.php"><li class="opcoes-menu-2">Jogos Pagos</li></a>
      </ul>
    </header>

    <!-- Lançamentos (Adicionado de forma manual) -->
    <div class="games-box-lancamentos">
      <font class="games-titulo">Lançamentos</font>

      <a href="game.php?id=6"><img class="games-capa" src="capas/6/Elden_Ring_capa.jpg" width="180" height="230"></a>
      <a href="game.php?id=4"><img class="games-capa" src="capas/4/HrC1Prgq2P70WXZn1X36P9vu.jfif" width="180" height="230"></a>
      <a href="game.php?id=7"><img class="games-capa" src="capas/7/big-poster-gamer-homem-aranha-ps4-lo02-tamanho-90x60-cm-homem-aranha-ps4.jpg" width="180" height="230"></a>
      <a href="game.php?id=3"><img class="games-capa" src="capas/3/Batman_arkham_city_logo.jpg" width="180" height="230"></a>
      <a href="game.php?id=2"><img class="games-capa" src="capas/2/9677.jpg" width="180" height="230"></a>
      <a href="game.php?id=1"><img class="games-capa" src="capas/1/Stray-PC-Buy-Cheap-Play-Cheap-Cover-Art.jpg" width="180" height="230"></a>
    </div>

    <!-- Recentes -->
    <?php
    $lista = [];

    $sql = $pdo->query("SELECT * FROM jogos ORDER BY idjogos DESC LIMIT 6");
    if($sql->rowCount() > 0) {
      $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <div class="games-box-recentes">
      <font class="games-titulo">Recentes <a href="jogos-recentes.php"><span style="font-size: 16px; color: grey;">Ver mais</span></a></font>

      <?php
      foreach($lista as $recentes):
      ?>
      <a href="game.php?id=<?php echo $recentes['idjogos']; ?>"><img class="games-capa" src="<?php echo 'capas/' . $recentes['idjogos'] . '/' . $recentes['capa']; ?>" width="180" height="230"></a>
      <?php
      endforeach;
      ?>
    </div>

    <!-- Gratuito -->
    <?php
    $lista = [];

    $sql = $pdo->query("SELECT * FROM jogos WHERE tipo_jogo='Gratuito' ORDER BY idjogos DESC LIMIT 6");
    if($sql->rowCount() > 0) {
      $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <div class="games-box-gratuito">
      <font class="games-titulo">Gratuitos <a href="jogos-gratuitos.php"><span style="font-size: 16px; color: grey;">Ver mais</span></a></font>

      <?php
      foreach($lista as $gratuito):
      ?>
      <a href="game.php?id=<?php echo $gratuito['idjogos']; ?>"><img class="games-capa" src="<?php echo 'capas/' . $gratuito['idjogos'] . '/' . $gratuito['capa']; ?>" width="180" height="230"></a>
      <?php
      endforeach;
      ?>
    </div>

    <!-- Pagos -->
    <?php
    $lista = [];

    $sql = $pdo->query("SELECT * FROM jogos WHERE tipo_jogo='Pago' ORDER BY idjogos DESC LIMIT 6");
    if($sql->rowCount() > 0) {
      $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <div class="games-box-pago">
      <font class="games-titulo">Pagos <a href="jogos-pagos.php"><span style="font-size: 16px; color: grey;">Ver mais</span></a></font>

      <?php
      foreach($lista as $pago):
      ?>
      <a href="game.php?id=<?php echo $pago['idjogos']; ?>"><img class="games-capa" src="<?php echo 'capas/' . $pago['idjogos'] . '/' . $pago['capa']; ?>" width="180" height="230"></a>
      <?php
      endforeach;
      ?>
    </div>

    <!-- submenu -->
    <div class="sub-menu">
        <font class="sub-menu-info">
            <?php echo $_SESSION['nome']; ?><p>
                    
            <hr style="margin-top: 5px; border-color: white;" size="1">

            <ul>
                <a href="alterar-foto.php?id=<?php echo $_SESSION['idusuario']; ?>"><li class="opcoes-sub-menu">Alterar foto</li></a>
                <a href="meus-dados.php?id=<?php echo $_SESSION['idusuario']; ?>"><li class="opcoes-sub-menu">Meus dados</li></a>
                <?php if(isset($_SESSION['idusuario'])) { if($_SESSION['tipo_conta'] == "ADM") { echo "<a href='editar-destaque.php?id=1'><li class='opcoes-sub-menu'>Opcões ADM</li></a>"; } } ?>
                <a href="logout.php"><li class="opcoes-sub-menu">Sair</li></a>
            </ul>
        </font>
    </div>

    <!-- Footer -->
    <?php $data_footer = date("Y"); ?>

    <footer>
      MegaGames <?php echo $data_footer; ?>
    </footer>

    <script>
        $(".icon").click(function(){
            $(".sub-menu").fadeToggle("speed");
        });
    </script>

  </body>

</html>