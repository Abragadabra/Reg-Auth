<?php

    // подключаю бд
    require_once 'connect.php';

    // пролучаю данные пользователя
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $password_verify = trim($_POST['password_verify']);


    // проверяю на заполненость полей
    if (!empty($name) && !empty($surname) && !empty($login) && !empty($password)) {

        if ($password != $password_verify) {

            // идет проверка паролей, иначе завершить код и вывести сообщение
            $_SESSION['msg_password_wrong'] = 'Не совпадают пароли!';
            header('Location: ../../pages/reg-page.php');
            die();

        }

        // проверка существования пользователя с таким же логином

        // sql запрос
        $sql_check = 'SELECT EXISTS(SELECT login FROM users WHERE login = :login)';

        // подготовка запроса
        $query_Check = $pdo -> prepare($sql_check);

        // вместо :login
        $query_Check -> execute([
            'login' => $login
        ]);

        if ($query_Check -> fetchColumn()) {

            // идет проверка логинов, иначе завершить код и вывести сообщение
            $_SESSION['msg_login_wrong'] = 'Пользователь с таким логином уже существует!';
            header('Location: ../../pages/reg-page.php');
            die();

        }

        // хэширую пароль
        $password = password_hash($password, CRYPT_SHA512);

        // запрос в  базу
        $sql = 'INSERT INTO users(name, surname, login, password) VALUES(:name, :surname, :login, :password)';

        // вместо :name использую данные пользователя
        $params = [
            'name' => $name,
            'surname' => $surname,
            'login' => $login,
            'password' => $password
        ];

        // подготавливаю запрос
        $query = $pdo -> prepare($sql);

        // заменяю :name на данные пользователя
        $query -> execute($params);

//        echo '<script>alert("Вы успешно зарегистрированы!")</script>';

        header('Location: /');


    } else {

        $_SESSION['msg_empty'] = 'Некоторые поля пустые!';
        header('Location: ../../pages/reg-page.php');
        die();

    }