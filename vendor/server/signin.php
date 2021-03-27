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
                $_SESSION['user_login'] = $user -> login;

                $login = $user -> login;

                // перехожу в профиль
                header("Location: ../../pages/profile-page.php?login=$login");

            } else {

                // идет проверка паролей, иначе завершить код и вывести сообщение
                $_SESSION['msg_password_login_wrong_auth'] = 'Неправильный логин или пароль!';
                header('Location: /');
                die();

            }



        } else {

            // идет проверка паролей, иначе завершить код и вывести сообщение
            $_SESSION['msg_password_login_wrong_auth'] = 'Неправильный логин или пароль!';
            header('Location: /');
            die();

        }


    } else {

        // проверка на заполненность полей
        $_SESSION['msg_empty_auth'] = 'Вы оставили пустые поля!';
        header('Location: /');
        die();

    }
