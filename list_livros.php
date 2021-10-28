<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();

$comando = $bd->prepare('SELECT * FROM livros');
$comando->execute();

$livros = $comando->fetchAll(PDO::FETCH_ASSOC);

$_title = 'Livros';

?>

<?php include('./includes/header.php'); ?>

            <a class="btn btn-primary" href='insert_livro.php'>Novo Livro</a>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach($livros as $l): ?>
                    <tr>
                        <td><?= $l['id'] ?></td>
                        <td><?= $l['titulo'] ?></td>
                        <td>
                            <a class="btn btn-secondary" href="update_livro.php?id=<?= $l['id'] ?>">Editar</a> | 
                            <a class="btn btn-danger" href="delete_livro.php?id=<?= $l['id'] ?>">Remover</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>

<?php include('./includes/footer.php'); ?>