<?php

$link;

function db_connect() //подключение к базе
{
	global $link;

    $link = mysqli_connect("localhost", "f0652773_superbasse", "SZSQiyN1", "f0652773_superbasse"); //конекшн тут 1 - где база, 2 - имя пользователя, 3 - пароль, 4 - название бд

    if (!$link) { //вывод ошибок
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    } //тут на всякий даю таблице понять, что мы из россии и у нас русский - это utf8 P.S. если кто-то введёт русский логин или пароль, возможны ошибки, решение - эти три строки
    mysqli_query($link, "SET NAMES utf8");
    mysqli_query($link, "SET CHARACTER SET utf8");
    mysqli_set_charset($link, "utf8");
}

function db_disconnect() //дисконект между нами океаны
{
	global $link;
	mysqli_close($link);
}

?>
