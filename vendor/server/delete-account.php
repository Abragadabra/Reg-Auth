<?php

    // подключаемся к БД
    require_once 'connect.php';

    // из адреса я получаю id страницы
    $id = $_GET['id'];

    // SQL запрос
    $sql = 'DELETE FROM `users` WHERE `id` = ?';;

    // подготавливаю запрос
    $query = $pdo -> prepare($sql);

    // заменяю затычку ?
    $query -> execute([$id]);

    // перехожу на главную
    header('Location: /');

