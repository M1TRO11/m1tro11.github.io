<?php

$link;

function db_connect() //подключение к базе
{
	global $link;

    $link = mysqli_connect("localhost", "f0652773_superbasse", "SZSQiyN1", "f0652773_superbasse");

    if (!$link) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
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
