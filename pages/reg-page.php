<?php
    require_once('../vendor/server/connect.php');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abragadabra.net | Регистрация</title>
</head>
<body>
<form action="../vendor/server/signup.php" method="post">
    <label>Ваше имя: </label>
    <input type="text" name="name">
    <br>

    <label>Ваша фамилия: </label>
    <input type="text" name="surname">
    <br>

    <label>Ваш логин: </label>
    <input type="text" name="login">
    <br>

    <label>Ваш пароль: </label>
    <input type="password" name="password">
    <br>

    <label>Ваш пароль еще раз: </label>
    <input type="password" name="password_verify">
    <br>

    <button>Зарегистрироваться</button>
    <p>Есть аккаунт - <a href="../index.php">Авторизуйтесь</a>!</p>

    <?php

        // если не совпадают пароли
        if ($_SESSION['msg_password_wrong']) {
            echo '<p style="color: red">' . $_SESSION['msg_password_wrong'] . '</p>';
        }
        // если одинаковые логины
        elseif ($_SESSION['msg_login_wrong']) {
            echo '<p style="color: red">' . $_SESSION['msg_login_wrong'] . '</p>';
        }
        // если поля пустые
        elseif ($_SESSION['msg_empty']) {
            echo '<p style="color: red">' . $_SESSION['msg_empty'] . '</p>';
        }
        // уничтожаю поля, после обновления страницы
        unset($_SESSION['msg_password_wrong']);
        unset($_SESSION['msg_login_wrong']);
        unset($_SESSION['msg_empty']);

    ?>

</form>
</body>
</html>