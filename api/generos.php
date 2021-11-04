<?php
require_once '../vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();

$comando = $bd->prepare('SELECT * FROM generos');
$comando->execute();

$generos = $comando->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($generos);