<?php
include("conexao/connect.php");
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
?>

<html lang="pt-br">

  <head>
    <title>Editar <?php echo $game['nome']; ?> | MegaGames</title>
    <?php include("links.php"); ?>
    
  </head>

  <body>
    <div style="top: 30px;" class="login-box">
        <font class="login-titulo">
            Editar jogo
        </font>

        <form class="form-login" action="dados/editar-jogos-dados.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $game['idjogos']; ?>">

            <font class="input-titulo">Capa do jogo: <span style="color: grey; font-size: 16px;">(jpg, png)</span></font>
            <input style="border: none; background-color: transparent; color: white;" class="input-box" type="file" name="capa" required="">

            <font class="input-titulo">Nome do jogo:</font>
            <input class="input-box" type="text" name="nome" required="" maxlength="50" value="<?php echo $game['nome']; ?>">

            <font class="input-titulo">Descrição:</font>
            <textarea style="resize: vertical; text-align: left;" class="input-box" type="text" name="descricao" required="" maxlength="400"><?php echo $game['descricao']; ?></textarea>

            <font class="input-titulo">Categoria:</font>
            <select class="input-box" name="categoria">
            <option><?php echo $game['categoria']; ?></option>
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
            <option><?php echo $game['tipo_jogo']; ?></option>
            <option><?php if($game['tipo_jogo'] == "Gratuito") { echo "Pago"; } else { echo "Gratuito"; } ?></option>
            </select>
            
            <input class="input-submit" type="submit" name="submit" value="Salvar Alterações">
            <a href="dados/excluir-jogo-dados.php?id=<?php echo $game['idjogos']; ?>"><font onclick="alert('Jogo excluido com sucesso')" style="position: relative; top: 20px; color: red;" class="input-titulo">Excluir jogo</font></a>
        </form>
    </div>

  </body>

</html>