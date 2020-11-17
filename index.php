<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <title>Главная</title>
    <link rel="stylesheet" href="css/style.css"></link>
  </head>
  <body>
      <div class="title_top">
        <div class = "ncfu_logo_wrapper">
          <a class="header_logo" href="index.php"><img src="img/logo_ncfu.svg" id="logo_ncfu"></a>
          <h1 class="title_uni_name">Северо-Кавказский <br> Федеральный Университет</h1>
        </div>
        <div class="title_portal_name_wrapper">
          <h1 class="title_portal_name">Портал <br> Виртуальные миры</h1>
        </div>
        <div class="iitt_logo_wrapper">
          <div class="header_logo_wrapper"><img src="img/logo_iitt.png" id="logo_iitt"></div>
        </div>
      </div>
      <div class="top_panel">
        <h1 class="top_panel_text">Добро пожаловать на портал</h1>
      </div>
    <div class="login_form_wrapper">
      <form class="login" method="post" action="php/login.php">
        <p class="text_in_login_form">Для продолжения войдите в систему</p>
        <label class="label_login" for="login">Логин:</label>
        <input class="login_input" name="login_input" type="text" placeholder="Логин"><br>
        <label class="label_login" for="password">Пароль:</label>
        <input class="login_input" name="password_input" type="password" placeholder="Пароль"><br>
        <input class="submit_input" type="submit" value="Войти"/><br>
      </form>
    </div>
    <?php
      session_start();
      if(isset($_SESSION['message'])) {
        echo '<p class = "login_error">'  .$_SESSION["message"].  '</p>';
        unset($_SESSION['message']);
      }
    ?>
  </body>
</html>
