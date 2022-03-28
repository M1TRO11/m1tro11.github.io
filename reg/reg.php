<?php

session_start();

include ("db.php");

$login = $_POST['login'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

if ($password === $password_confirmation){
  $login = stripslashes($login);
  $login = htmlspecialchars($login);
  $password = stripslashes($password);
  $password = htmlspecialchars($password);
  $login = trim($login);
  $password = trim($password);

  db_connect();

  $sql_str = "SELECT id FROM `AmongAss` WHERE login=".$login;
  $q = @mysqli_query($link, $sql_str);
  $myrow = mysqli_fetch_array($q);
  if (!empty($myrow['id'])) {
    $_SESSION['err_msg'] = "Извините, введённый вами логин уже зарегистрирован. Введите другой логин.";
    header('Location: index.html');
  }
  $sql_str = "INSERT INTO `AmongAss` (login, password) VALUES ('$login', '$password')";
  $q = @mysqli_query($link, $sql_str);
  if ($q != '') {
    $_SESSION['message'] = "Вы успешно зарегистрированы!";
    header('Location: ../index.html');
  } else {
    $_SESSION['err_msg'] = "Произошла ошибка! Попробуйте ещё раз позже...";
    header('Location: index.html');
  }

  db_disconnect();
}else{
  $_SESSION['err_msg'] = 'Пароли не совпадают';
  header('Location: index.html');
}

?>
