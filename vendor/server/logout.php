<?php

    require_once 'connect.php';

    // вместо сессии делаю пустоту
    $_SESSION = [];

    // делаю куки пустыми
    if (isset($_SESSION[session_name()])) {

        setcookie(session_name(), '', time() - 3600, '/');

    }

    // добиваю сессию
    session_destroy();

    // перехожу обратно на главную страницу
    header('Location: /');