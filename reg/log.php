<?php

    session_start();

    include ("../db.php");

    $login = $_POST['login'];
    $password = $_POST['password'];

    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);

    db_connect();

    $sql_str = "SELECT password FROM `AmongAss` WHERE `login`='".$login."'";
    $q = @mysqli_query($link, $sql_str);
    $myrow = mysqli_fetch_array($q);
    if (empty($myrow['password'])) {
        $_SESSION['log_err_msg'] = "Такого пользователя не существует!";
        header("Location: index.php");
    }else{
        if($myrow['password'] === $password){
            $_SESSION['message'] = "велcum бэк!";
            $_SESSION['user'] = $login;
            header('Location: ../index.php');
        }else{
            $_SESSION['log_err_msg'] = "Пароль неверный!";
            header("Location: index.php");
        }
    }

?>
