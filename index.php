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
    </form>
</body>
</html>