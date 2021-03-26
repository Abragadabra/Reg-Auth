<?php

    // подключаю бд
    require_once 'connect.php';

    // пролучаю данные пользователя
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    // проверяю на заполненость полей
    if (!empty($name) && !empty($surname) && !empty($login) && !empty($password)) {

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

            die("Пользователь с таким логином уже существует!");

        }

        // хэширую пароль
        $password = password_hash($password, PASSWORD_DEFAULT);

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

        echo '<script>alert("Вы оставили поля пустыми!")</script>';

    }