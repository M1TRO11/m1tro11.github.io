<?php
  session_start(); //вот взяли и стартнули сессию, это крч для _SESSION - глобальной вариэйбл для пользователя, его питс и т д
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Регистрация на питсе</title>
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
          <a class="nav-link" aria-current="page" href="../">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="">Вход/Регистрация</a> <!-- тут типа active это выделенная черным типа мы на этой вкладке -->
        </li>
      </ul>
      <form class="d-flex" action="../cart/"> <!-- экшнон на корзину тётю зину -->
        <button class="btn btn-outline-success" type="submit">карзина тётя зина</button>
      </form>
    </div>
  </div>
</nav>
</header> <!-- тут любопытнейшая штука бустрапа - контейнер, который позволяет располагать объедки на экране правильно -->
    <div class="container" style="margin-top: 150px;">
      <div class="row align-items-center"> <!-- тут как-будто строчка таблицы - row -->
        <div class="col"> <!-- а тут как-будто столбец таблицы - col -->
          <div class="card mx-auto" style="width: 18rem;"> <!-- формы решил сделать в карточках, так красиво -->
          <div class="card-body">
          <form action="login.php" method="post"> <!-- тут начинается форма -->
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Логин</label>
              <input type="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-primary">Войти</button>
          </form>
          </div>
          </div>
        </div> <!-- тут закончился div карточки, в которому была форма и div стоблца col -->
        <div class="col">
          <div class="card mx-auto" style="width: 18rem;">
          <div class="card-body">
          <form action="reg.php" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Логин</label>
              <input name="login" type="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Подтвердите пароль</label>
                <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword2" required>
              </div>
              <button type="submit" class="btn btn-primary">Войти</button>
          </form>
          <?php
          if($_SESSION['err_msg']){ //если ошибочное сообщение существует выводим АХТУНГ
            echo '<div class="alert alert-warning" role="alert">'.$_SESSION["err_msg"].'</div>';
            unset($_SESSION['err_msg']);
          }
          ?>
          </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<!-- собсна всё -->
