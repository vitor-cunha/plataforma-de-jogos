<?php
include("conexao/connect.php");
session_start();

if(!isset($_GET['search'])) {
    header("location: index.php");
    exit();
}

$nome = "%".trim($_GET['search'])."%";

$sql = $pdo->prepare("SELECT * FROM jogos WHERE nome LIKE :nome");
$sql->bindValue(':nome', $nome);
$sql->execute();
$resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<html lang="pt-br">

  <head>
    <title>Resultados | MegaGames</title>
    <?php include("links.php"); ?>
    <?php include("menu.php"); ?>
    
  </head>

  <body>
    <font class="resultados-titulo">Resultados da pesquisa:</font>

    <div class='resultados-box'>
    <?php
    if(count($resultados)) {
        foreach($resultados as $resultado) {
            $id = $resultado['idjogos'];
            $capa = $resultado['capa'];
            $diretorio = "capas/" . $id . "/" . $capa;

            echo "<a href='#'><img class='resultados-capa' src='$diretorio' width='180' height='230'></a>";
        }
    }
    else {
        echo "<font class='resultados-pesquisa'>Nenhum resultado foi encontrado</font>";
    }
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

    <script>
        $(".icon").click(function(){
            $(".sub-menu").fadeToggle("speed");
        });
    </script>

  </body>

</html>