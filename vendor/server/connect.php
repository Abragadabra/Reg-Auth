<?php
    // Массив с настройками
    $options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
    $driver = 'mysql';
    $charset = 'utf8';

    // использую try и catch чтобы если что, я знал, что нету подключения к БД :)
    try {

        $pdo = new PDO("$driver:host=localhost;dbname=abragadabra;charset=$charset",
            'root',
            'root',
            $options
        );

//        решил поработать с cookie и добавил счетчик посещений =)
//        if (isset($_COOKIE['page_visit'])) {
//
//            setcookie('page_visit', ++$_COOKIE['page_visit'], time() + 5);
//
//        } else {
//
//            setcookie('page_visit', 1, time() + 5);
//            $_COOKIE['page_visit'] = 1;
//
//        }

        session_start();

    } catch (PDOException $e) {

        die("Ошибка при подключении к БД");

    }