<?php
require_once './vendor/autoload.php';

use PDO;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
    $comando = $bd->prepare('INSERT INTO generos(nome) VALUES (:nome)');
    $comando->execute([':nome' => $_POST['nome']]);
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Document</title>
    </head>
    <body>
        <h1>Novo Gênero</h1>
        <form action="insert.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" />
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>