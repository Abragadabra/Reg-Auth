<?php

    // подключаемся к БД
    require_once 'connect.php';

    // из адреса я получаю id страницы
    $login = $_GET['login'];

    // SQL запрос
    $sql = 'DELETE FROM `users` WHERE `login` = ?';

    // подготавливаю запрос
    $query = $pdo -> prepare($sql);

    // заменяю затычку ?
    $query -> execute([$login]);

    // перехожу на главную
    header('Location: /');

