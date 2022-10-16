<?php
$hostname = "localhost";
$bancodedados = "megagames";
$usuario = "root";
$senha = "";

try {
    $pdo = new PDO("mysql:host=$hostname;port=3306;dbname=$bancodedados", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "Falha ao conectar";
}
?>