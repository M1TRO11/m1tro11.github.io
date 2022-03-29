<?php

session_start(); //начинаем сессию, эта штука - решение половины задач с регой, корзиной и т.д.

include ("../db.php"); //связываемся с пхп который в ответе за базы и теперь можем юзать его функции

$login = $_POST['login']; //инитиализинг вариэйблс
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

if ($password === $password_confirmation){ //проверяем пароль и подтвердите пароль
  $login = stripslashes($login); //избавляем логин и пароль от говна и всякого говна
  $login = htmlspecialchars($login);
  $password = stripslashes($password);
  $password = htmlspecialchars($password);
  $login = trim($login);
  $password = trim($password);
  $password_confirmation = stripslashes($password_confirmation);
  $password_confirmation = htmlspecialchars($password_confirmation);
  $password_confirmation = trim($password_confirmation);

  db_connect(); //помнишь про include? я тоже забыл, но теперь вспомнил и юзнул функцию из db.php который мы сюда инклуднули

  $sql_str = "SELECT id FROM `AmongAss` WHERE `login`='".$login."'"; //составляем запрос на поиск логана
  $q = @mysqli_query($link, $sql_str); //ищем уже зареганый рено логан
  $myrow = mysqli_fetch_array($q); //получился список таких логанов
  if (!empty($myrow['id'])) { //если не пустой, т.е. логан всё таки существует
    $_SESSION['err_msg'] = "Извините, введённый вами логин уже зарегистрирован. Введите другой логин."; //в сессию заносим сообщение ошибки
    header('Location: index.php'); //и отправляем пользователя гулять обратно
    db_disconnect(); //и дисконект
    die(); //и умереть не забываем
  }
  $sql_str = "INSERT INTO `AmongAss` (login, password) VALUES ('$login', '$password')"; //прикинь, не нашли твой логан, ну чтож, купим новый
  $q = @mysqli_query($link, $sql_str); //отдал за это корыто все свои заначки ёкарный бабабуй
  if ($q != '') {
    $_SESSION['message'] = "Вы успешно зарегистрированы!";
    $_SESSION['user'] = $login;
    header('Location: ../index.php'); //ураааааа, я с логаном
  } else {
    $_SESSION['err_msg'] = "Произошла ошибка! Попробуйте ещё раз позже...";
    header('Location: index.php'); //нееееееееет, всё по отверстию пошло... P.S. эта ошибка хз вообще когда возникнет, по сути, если на сервак с бд упадёт метеорит
  }

  db_disconnect(); //дискотека алкоголя и мариуанны
}else{ //ты тупой? не можешь скопипастить пароль, мда чел...
  $_SESSION['err_msg'] = 'Пароли не совпадают';
  header('Location: index.php');
}

?>
