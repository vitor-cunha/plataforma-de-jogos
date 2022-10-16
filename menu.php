
    <header class="menu">
        <font class="logo">
            <a href="index.php">MegaGames</a>
        </font>

        <?php
        if(isset($_SESSION['idusuario'])) {
            $diretorio = "icon/" . $_SESSION['idusuario'] . "/" . $_SESSION['icon'];
            
            echo "<img class='icon' src='$diretorio' width='40' height='40'>";
        }
        else {
            echo "<a href='login.php'><font class='login'>Login</font></a>";
        }
        ?>

        <form action="resultados.php" method="GET">
            <input class="search" type="search" name="search" placeholder="Buscar">
        </form>

        <?php
        if(isset($_SESSION['idusuario'])) {
            if($_SESSION['tipo_conta'] == "ADM") {
                echo '<a href="upload-jogos.php"><svg class="upload" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 9h-6l8-9 8 9h-6v11h-4v-11zm11 11v2h-18v-2h-2v4h22v-4h-2z"/></svg></a>';
            }
        }
        ?>
    </header>