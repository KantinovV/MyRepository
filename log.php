<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
<h1>Регистрация</h1>
<form name="regist" method="post">
    <p>Имя:</p>
    <input type="text" name="userName" placeholder="Введите ваше имя">
    <p>Пароль:</p>
    <input type="password" name="password" placeholder="Введите ваш пароль">

    <?php
    if (isset($_POST['EventofRegistration']))
    {
        $name = $_POST['userName'];
        $password = $_POST['password'];
        if ($name == null || $password == null)
            echo "Данные необходимо заполнить!";
        else
        {
            $PDO = new PDO('mysql:dbname=user;host=Git', 'root', '');
            $Set = "INSERT INTO users(Login, password)
                    values('$name','$password')";
            $PDO->exec($Set);
            echo "Вы успешно зарегестрировались";
        }
    }
    ?>

    <p><input name = "EventofRegistration" type="submit" value="Регистрация"></input></p>
    <pre id="profile"></pre>
</form>
</body>
</html>
