<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Твой акк</title>
  </head>
  <body>
    <h1 class="mx-auto">
      <?php
        if($_SESSION['user']){
          echo $_SESSION['user'];
        }else{
          header("Location: ../reg/index.php");
          die();
        }
      ?>
    </h1>
  </body>
</html>
