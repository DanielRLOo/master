<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php if (isset($_SESSION['logged'])): ?>
    <nav class="navbar navbar-dark bg-dark mb-2">
        <a class="navbar-brand" href="/list-courses">Home</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
        </ul>
    </nav>
<?php endif; ?>
<div class="container mb-2">
    <div class="jumbotron">
        <h1><?= $title; ?></h1>
    </div>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['message-type'];  ?>">
            <span><?= $_SESSION['message']; ?></span>
        </div>
    <?php

        endif;
        unset($_SESSION['message']);
        unset($_SESSION['message-type']);

    ?>
