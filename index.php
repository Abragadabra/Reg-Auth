<?php
    require_once('vendor/server/connect.php');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abragadabra.net | Авторизация</title>
</head>
<body>
    <form action="vendor/server/signin.php" method="post">
        <label>Ваше логин: </label>
        <input type="text" name="login">
        <br>

        <label>Ваше пароль: </label>
        <input type="password" name="password">
        <br>

        <button>Войти</button>
        <p>Нет аккаунта - <a href="pages/reg-page.php">зарегистрируйся</a>!</p>

        <?php

        // если неправильный логин или пароль
        if ($_SESSION['msg_password_login_wrong_auth']) {
            echo '<p style="color: red">' . $_SESSION['msg_password_login_wrong_auth'] . '</p>';
        }
        // если пустые поля
        elseif ($_SESSION['msg_empty_auth']) {
            echo '<p style="color: red">' . $_SESSION['msg_empty_auth'] . '</p>';
        }
        // уничтожаю поля, после обновления страницы
        unset($_SESSION['msg_password_login_wrong_auth']);
        unset($_SESSION['msg_empty_auth']);

        ?>
    </form>
</body>
</html>