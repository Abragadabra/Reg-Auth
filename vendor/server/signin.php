<?php
    require_once '../server/connect.php';

    // получаю данные от пользователя
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    // проверяю заполненость полей
    if (!empty($login) && !empty($password)) {

        // sql запрос
        $sql = 'SELECT id, name, surname, login, password FROM users WHERE login = :login';

        // вместо :login вставляю данные пользователя
        $params = [
            'login' => $login
        ];

        // подготавливаю запрос в бд
        $query = $pdo -> prepare($sql);

        // заменяю :login
        $query -> execute($params);

        // получаю массив из бд
        $user = $query -> fetch(PDO::FETCH_OBJ);

        if ($user) {

            // проверяю правильность пароля
            if (password_verify($password, $user -> password)) {

                // получаю id, name , surname из базы
                $_SESSION['user_id'] = $user -> id;
                $_SESSION['user_name'] = $user -> name;
                $_SESSION['user_surname'] = $user -> surname;

                $id = $user -> id;

                // перехожу в профиль
                header("Location: ../../pages/profile-page.php?id=$id");

            } else {

                echo '<script>alert("Неверный логин или пароль")</script>';

            }



        } else {

            echo '<script>alert("Неверный логин или пароль")</script>';

        }


    } else {

        echo '<script>alert("Вы не заполнили все поля!")</script>';

    }
