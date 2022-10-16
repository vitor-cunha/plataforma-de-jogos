<?php
include("conexao/connect.php");
session_start();

$id = filter_input(INPUT_GET, 'id');

$game = [];

if($id) {
    $sql = $pdo->prepare("SELECT * FROM jogos WHERE idjogos = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $game = $sql->fetch(PDO::FETCH_ASSOC);
    }
}

if($game['nome'] == "") {
    header("location: index.php");
    exit();
}
?>

<html lang="pt-br">

  <head>
    <title><?php echo $game['nome']; ?> | MegaGames</title>
    <?php include("links.php"); ?>
    <?php include("menu.php"); ?>
    
  </head>

  <body>
    <?php $id = $game['idjogos']; ?>

    <div class="game-titulo-box">
        <?php echo $game['nome']; ?> <?php if(isset($_SESSION['idusuario'])) { if($_SESSION['tipo_conta'] == "ADM") { echo "<a href='editar-jogos.php?id=$id'><span style='font-size: 16px; color: rgb(231, 0, 0);'>Editar</span></a>"; } } ?><p>
        <a href="#"><button class="game-button">Baixar</button></a> <p>
    </div>

    <div class="game-descricao-box">
        <?php echo $game['descricao']; ?> <br>

        <br><span style="color: white;">Categoria: <?php echo $game['categoria']; ?> <p> Adicionado: <?php echo date("d/m/Y", strtotime($game["data_registro"])); ?> <p> <span style="color: white;">Tipo de jogo: <?php echo $game['tipo_jogo']; ?> </span></br>
    </div>

    <!-- submenu -->
    <div class="sub-menu">
        <font class="sub-menu-info">
            <?php echo $_SESSION['nome']; ?><p>
                    
            <hr style="margin-top: 5px; border-color: white;" size="1">

            <ul>
                <a href="alterar-foto.php?id=<?php echo $_SESSION['idusuario']; ?>"><li class="opcoes-sub-menu">Alterar foto</li></a>
                <a href="meus-dados.php?id=<?php echo $_SESSION['idusuario']; ?>"><li class="opcoes-sub-menu">Meus dados</li></a>
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