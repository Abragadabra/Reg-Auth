<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
</head>
<body>
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

    } catch (PDOException $e) {

        die("Ошибка при подключении к БД");

    }


        echo '<ul>';

            $sql = 'SELECT * FROM `users`';

            $query = $pdo ->query($sql);

            while ($row = $query -> fetch(PDO::FETCH_OBJ)) {

                echo '<li><b>' . $row -> name . ' ' . $row -> surname . ' ' . '</li></b>' . ' <a href="users.php?login=' . $row -> login . '"> профиль</a>';

            }

        echo '</ul>';


    ?>
</body>
</html>