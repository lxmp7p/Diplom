<!doctype html>
<?php 
session_start();
$_SESSION['auth'] = " ";
include "connect.php";
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <style>
        .wrap{
            margin-left: 40%;
        }
        input[type="text"], input[type="password"]{
            width: 200px;
            height: 30px;
            border-radius: 20px;
            text-align: center;border: 2px solid crimson;
            margin: 25px;
        }
        input[type="text"]:focus, input[type="password"]:focus{
            width: 210px;
            height: 33px;
            border-radius: 25px;
            text-align: left;
            padding-left: 10px;
            border: 2px solid springgreen;
            background: ghostwhite;
            transition: .5s;
        }
        input[type="submit"]{
            width: 200px;
            height: 40px;
            border-radius: 25px;
            background: brown;
            color: white;
            font-weight: bold;
            margin-left: 2%;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background: mediumturquoise;
            border-radius: 30px;
            transition: .5s;
        }
    </style>
</head>
<body>
<div class="wrap">
    <form action="" method="POST">
        <input type="text" name="login" placeholder="Ваш логин">
            <br>
        <input type="password" name="password" placeholder="Ваш пароль">
        <br>
        <input type="submit" name="btn_login" value="Войти">
        <br>
    </form>
</div>
</body>
</html>
<?php

if (isset($_POST['btn_login'])){
    if (!empty($_POST['login'])){
        if (!empty($_POST['password'])){
            if (strlen($_POST['password']) >= 8 && strlen($_POST['password']) <= 32){
                if (mysqli_num_rows(mysqli_query($link, "SELECT `login` FROM `user` WHERE `login` = '".$_POST['login']."' and `password` = '".htmlspecialchars(md5(md5(md5($_POST['password']))))."'")) == 1){
                  $_SESSION['auth'] = "SESSIONTRUE";
                   header('Location: /index.php');
                } else echo "Неверный логин или пароль!";
            } else echo "Пароль должен содержать 8-32 символов";
        } else echo "Вы не ввели пароль";
    } else echo "Вы не ввели логин";
}
