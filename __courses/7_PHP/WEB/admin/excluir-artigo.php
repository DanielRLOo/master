<?php

require '../db/db.php';
require '../src/ArticleHandler.php';

$articleId = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $articleId = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $printer  = new ArticleHandler($mysql);
    $printer->deleteArticle($_POST['id']);
    header('location: index.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
    <title>Excluir Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir o artigo?</h1>
        <form method="post" action="excluir-artigo.php">
            <p>
                <input type="hidden" name="id" value="<?= htmlentities($articleId); ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>
