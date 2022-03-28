<?php

include ("db.php");
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (empty($login) or empty($password)) { exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!"); }

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
exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}
$sql_str = "INSERT INTO `AmongAss` (login, password) VALUES ('$login', '$password')";
$q = @mysqli_query($link, $sql_str);
if ($q != '') {
  echo "Ура";
} else {
  echo "не ура";
}

db_disconnect();

?>
