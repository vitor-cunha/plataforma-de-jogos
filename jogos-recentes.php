<?php
include("conexao/connect.php");
session_start();

$lista = [];

$sql = $pdo->query("SELECT * FROM jogos ORDER BY idjogos DESC");
if($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<html lang="pt-br">

  <head>
    <title>Jogos recentes | MegaGames</title>
    <?php include("links.php"); ?>
    <?php include("menu.php"); ?>
    
  </head>

  <body>
    <font style="right: 1090px;" class="resultados-titulo">Jogos recentes:</font>

    <div class="resultados-box">
    <?php foreach($lista as $recentes): ?>
    <a href="game.php?id=<?php echo $recentes['idjogos']; ?>"><img class="resultados-capa" src="<?php echo 'capas/' . $recentes['idjogos'] . '/' . $recentes['capa']; ?>" width="180" height="230"></a>
    <?php endforeach; ?>
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

    <script>
        $(".icon").click(function(){
            $(".sub-menu").fadeToggle("speed");
        });
    </script>

  </body>

</html>