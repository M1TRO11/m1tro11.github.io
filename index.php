<?php
  session_start();
  include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Вкусная питса</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <header> <!-- панель навигации скопипастенная с бустрапа -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Питса</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">Главная</a><!-- тут типа active это выделенная черным типа мы на этой вкладке -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/reg/">Вход/Регистрация</a>
        </li>
      </ul>
      <?php
        if($_SESSION['user']){
          echo '<a href="../account/">'.$_SESSION["user"].'</a>';
        }
      ?>
      <form class="d-flex" action="cart/"> <!-- экшнон на корзину тётю зину -->
        <button class="btn btn-outline-success" type="submit">карзина тётя зина</button>
      </form>
    </div>
  </div>
</nav>
</header>
    <h1 class="display-1">СУПЕР МЕГА ПИТСА КЛАСС</h1>
    <?php
        db_connect(); //ищем питсы
        $sql_str = "SELECT * FROM `pitsi`";
        $q = @mysqli_query($link, $sql_str);
        if($q != ''){ //если питсы вообще есть
            $to_echo = '<div class="container">'; //бустраповский контейнер
            $to_echo .= '<div class="row">'; //строка
            $i = 1;
            while($myrow = mysqli_fetch_array($q)){
                $to_echo .= '<div class="col">'; //типа столбец
                $to_echo .= '<div class="card" style="width: 18rem;">'; //и карточка
                $to_echo .= '<img src="'.$myrow["img"].'" class="card-img-top" alt="'.$myrow["name"].'">'; //подвозим из базы картинку и имя
                $to_echo .= '<div class="card-body">';
                $to_echo .= '<h5 class="card-title">'.$myrow["name"].'</h5>';
                $to_echo .= '<h6 class="card-subtitle mb-2 text-muted">'.$myrow["components"].'</h6>';
                $to_echo .= '<p class="card-text">'.$myrow["description"].'</p>'; //описание
                $to_echo .= '<a href="#" class="btn btn-warning">Добавить в корзину: '.$myrow["price"].' bucks</a>';
                $to_echo .= '</div>';
                $to_echo .= '</div>'; //вся эта конструкция просто красивая, мне нравится писать через точку равно, видно что за html-структура тут, так то тут можно что угодно и как угодно впихнуть
                $to_echo .= '</div>';
                if($i%5 == 0 /*& isset($myrow['id'][i+1])*/){
                  $to_echo .= '</div>';
                  $to_echo .= '<div class="row">';
                }
                $i++;
            }
            $to_echo .= '</div>';
            $to_echo .= '</div>';
            echo $to_echo;
        }
    ?>
  </body>
  <?php
    if($_SESSION['message']){ //если ты успешный... пффффф, да ты ущербный, бро, о чём речь?
      echo '<script>alert("'.$_SESSION["message"].'");</script>';
      unset($_SESSION['message']);
    }
  ?>
</html>
