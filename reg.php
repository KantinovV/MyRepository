<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
<h1>Авторизация</h1>
<form name="Auth" method="post">
    <p>Имя:</p>
    <input type="text" name="userName" placeholder="Введите ваше имя">
    <p>Пароль:</p>
    <input type="password" name="password" placeholder="Введите ваш пароль">
    <?php
    $connect = mysqli_connect('Git', 'root', '','user');
    $isAuth = false;

    if (isset($_POST['EventofAuth']))
    {
        $name = $_POST['userName'];
        $password = $_POST['password'];
        if ($name == null || $password == null)
            echo "Необходимо заполнить данные";
        else {
            if (isAuthUser($name, $password))
            {
                setcookie('name', $name, time() + (86400*30), '/');
                setcookie('password', $password, time() + (86400*30), '/');
                header("Location: main_.php");
                exit();
            }
            else {
                echo "Данные неверны!";
            }
        }
    }
    mysqli_close($connect);

    function isAuthUser($name, $password)
    {
        $connect = mysqli_connect('Git', 'root', '','user');
        $Get = 'SELECT Login, password
                    FROM users';
        $users = mysqli_query($connect, $Get);
        while($row = $users->fetch_assoc())
        {
            if($row['Login'] == $name && $row['password'] == $password)
                return true;
        }
        return false;
    }

    function isCookie()
    {
        $userName = $_COOKIE['Login'];
        $userPassword = $_COOKIE['password'];
        if (isAuthUser($userName, $userPassword)){
            return $userName;
        }
        return null;
    }

    ?>
    <p><input name = "EventofAuth" type="submit" value="Вход"></input></p>
    <pre id="profile"></pre>
</form>
</body>
</html>
