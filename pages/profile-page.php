<?php
    require_once '../vendor/server/connect.php';

    if (isset($_SESSION['user_name'])) {

        echo $_SESSION['user_name'] . ' ' . $_SESSION['user_surname'] .', Добро пожаловать!' . '<br>';

        // кнопка выйти
        echo '<a href="../vendor/server/logout.php">Выйти</a>' . '<br>';

        // предупреждение
        echo 'Внимание, если вы хотите удалить свой аккаунт, то нажмите на кнопку ниже. АККАУНТ ВОССТАНОВЛЕНИЮ НЕ ПОДЛЕЖИТ' . '<br>';

        // ссылка на удаление аккаунта
        echo '<a style="color: red" href="../vendor/server/delete-account.php?id=' . $_SESSION['user_login'] . '">УДАЛИТЬ АКАУНТ</a>' . '<br>';

        echo '<a href="users.php">Список пользователей</a>';

    } else {

        header('Location: /');

    }
