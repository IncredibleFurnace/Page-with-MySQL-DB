<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <title>Главная</title>
    <link rel="stylesheet" href="../css/style.css"></link>
  </head>
  <body>
    <div class="title_top">
        <div class = "ncfu_logo_wrapper">
          <a class="header_logo" href="../index.php"><img src="../img/logo_ncfu.svg" id="logo_ncfu"></a>
          <h1 class="title_uni_name">Северо-Кавказский <br> Федеральный Университет</h1>
        </div>
        <div class="title_portal_name_wrapper">
          <h1 class="title_portal_name">Портал <br> Виртуальные миры</h1>
        </div>
        <div class="iitt_logo_wrapper">
          <div class="header_logo_wrapper"><img src="../img/logo_iitt.png" id="logo_iitt"></div>
        </div>
      </div>
        <div class="top_panel">
        <h1 class="top_panel_text">Отчет</h1>
      </div>

<?php
  session_start();
  if($_SESSION['LOGGED_IN'] != 'YES') {
   $_SESSION['message'] = 'Для доступа к личному кабинету вы должны войти как модератор';
   header("Location: ../index.php");
  }
?>      

<?php
  $datetime = date('Y-m-d H:i:s');
  echo "<div class='title_portal_name'>$datetime</div>
        <div class='table_title_underline'></div>";
?>

<?php

$host = 'localhost';
$user = 'root';
$password = 'root';

$db="vws_site";

$connection = mysqli_connect($host, $user, $password)
or die ("Ошибка " . mysqli_error($link));

mysqli_select_db($connection, $db);

$query = "SELECT * FROM STUDENT";

$result = mysqli_query($connection, $query) or die ("<h1 class = 'error_h'> Ошибка MySQL: </h1> <br> <p class = 'error_p'>". mysqli_error($link));

if($result) {
	$rows = mysqli_num_rows($result);

  echo "<div class = 'table_title'><p>Ученики:</p></div>";
  echo "<div class='table_title_underline'></div>";
	echo "<table>
		<tr>
			<th>ID</th><th>ФИО:</th><th>Логин:</th><th>Пароль:</th><th>E-mail:</th><th>Номер телефона:</th>
		</tr>";
    
    for ($i = 0 ; $i < $rows ; ++$i) {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 6 ; ++$j) {
            echo "<td>$row[$j]</td>";
            }
        echo "</tr>";
    }
    echo "</table>";
   
  mysqli_free_result($result);

}

mysqli_close($connection);

?>

<?php

  $host = 'localhost';
  $user = 'root';
  $password = 'root';

  $db="vws_site";

  $connection = mysqli_connect($host, $user, $password)
  or die ("Ошибка " . mysqli_error($link));

  mysqli_select_db($connection, $db);

  $query = "SELECT * FROM TEACHER";

  $result = mysqli_query($connection, $query) or die ("<h1 class = 'error_h'> Ошибка MySQL: </h1> <br> <p class = 'error_p'>" . mysqli_error($link));

  if($result) {
      $rows = mysqli_num_rows($result);

      echo "<div class='table_wrapper'>";
      echo "<div class = 'table_title'><p>Преподаватели:</p></div>";
      echo "<div class='table_title_underline'></div>";
      echo "<table>
      <tr>
        <th>ID</th><th>ФИО:</th><th>Логин:</th><th>Пароль:</th><th>E-mail:</th><th>Номер телефона:</th>
      </tr>";
    
      for ($i = 0 ; $i < $rows ; ++$i) {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 6 ; ++$j) {
            echo "<td>$row[$j]</td>";
            }
        echo "</tr>";
      }
      echo "</table>";

      mysqli_free_result($result);
    }

    mysqli_close($connection);

?>

<?php

  $host = 'localhost';
  $user = 'root';
  $password = 'root';

  $db="vws_site";

  $connection = mysqli_connect($host, $user, $password)
  or die ("Ошибка " . mysqli_error($link));

  mysqli_select_db($connection, $db);

  $query = "SELECT Id_moder, fio FROM MODERATOR";

  $result = mysqli_query($connection, $query) or die ("<h1 class = 'error_h'> Ошибка MySQL: </h1> <br> <p class = 'error_p'>" . mysqli_error($link));

  if($result) {
      $rows = mysqli_num_rows($result);

      echo "<div class='table_wrapper'>";
      echo "<div class = 'table_title'><p>Модераторы:</p></div>";
      echo "<div class='table_title_underline'></div>";
      echo "<table>
      <tr>
        <th>ID</th><th>ФИО:</th></tr>";
    
      for ($i = 0 ; $i < $rows ; ++$i) {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 2 ; ++$j) {
            echo "<td>$row[$j]</td>";
            }
        echo "</tr>";
      }
      echo "</table>";

      mysqli_free_result($result);
  }

mysqli_close($connection);

?>

<?php

  $host = 'localhost';
  $user = 'root';
  $password = 'root';

  $db="vws_site";

  $connection = mysqli_connect($host, $user, $password)
  or die ("Ошибка " . mysqli_error($link));

  mysqli_select_db($connection, $db);

  $query = "SELECT * FROM SUBJECT";

  $result = mysqli_query($connection, $query) or die ("<h1 class = 'error_h'> Ошибка MySQL: </h1> <br> <p class = 'error_p'>" . mysqli_error($link));

  if($result) {
      $rows = mysqli_num_rows($result);

      echo "<div class='table_wrapper'>";
      echo "<div class = 'table_title'><p>Предметы:</p></div>";
      echo "<div class='table_title_underline'></div>";
      echo "<table>
      <tr>
        <th>ID</th><th>Предмет:</th>
      </tr>";
    
      for ($i = 0 ; $i < $rows ; ++$i) {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 2 ; ++$j) {
            echo "<td>$row[$j]</td>";
            }
        echo "</tr>";
      }
      echo "</table>";

      mysqli_free_result($result);
    }

    mysqli_close($connection);

?>

<?php

  $host = 'localhost';
  $user = 'root';
  $password = 'root';

  $db="vws_site";

  $connection = mysqli_connect($host, $user, $password)
  or die ("Ошибка " . mysqli_error($link));

  mysqli_select_db($connection, $db);

  $query = "SELECT * FROM EDU_MAT";

  $result = mysqli_query($connection, $query) or die ("<h1 class = 'error_h'> Ошибка MySQL: </h1> <br> <p class = 'error_p'>" . mysqli_error($link));

  if($result) {
      $rows = mysqli_num_rows($result);

      echo "<div class='table_wrapper'>";
      echo "<div class = 'table_title'><p>Учебные материалы:</p></div>";
      echo "<div class='table_title_underline'></div>";
      echo "<table>
      <tr>
        <th>ID</th><th>Заголовок:</th><th>Автор:</th><th>Кол-во страниц:</th><th>Год:</th><th>Предмет(ID):</th><th>Имя:</th><th>Загрузить:</th>
      </tr>";

      for ($i = 0 ; $i < $rows ; ++$i) {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 7 ; ++$j) {
            echo "<td>$row[$j]</td>";
            }
        echo "<td>
        <form method = 'post' action='upload_file.php' enctype='multipart/form-data'>
        <label class = 'label_update_form'> Файл: </label>
        <input type='file' name = 'file'>
        <input type='hidden' value = $row[0] name='edu_mat_id' >
        <input type='submit' name = 'submit_file' value='Загрузить'>
        </form>
        <form method = 'post' action='upload_file.php'>
        </form>
        </td>";
        echo "</tr>";
      }
      echo "</table>";

      mysqli_free_result($result);
    }

    mysqli_close($connection);

?>

<?php

  $host = 'localhost';
  $user = 'root';
  $password = 'root';

  $db="vws_site";

  $connection = mysqli_connect($host, $user, $password)
  or die ("Ошибка " . mysqli_error($link));

  mysqli_select_db($connection, $db);

  $query = "SELECT * FROM CLASSES";

  $result = mysqli_query($connection, $query) or die ("<h1 class = 'error_h'> Ошибка MySQL: </h1> <br> <p class = 'error_p'>" . mysqli_error($link));

  if($result) {
      $rows = mysqli_num_rows($result);

      echo "<div class='table_wrapper'>";
      echo "<div class = 'table_title'><p>Группы:</p></div>";
      echo "<div class='table_title_underline'></div>";
      echo "<table>
      <tr>
        <th>ID</th><th>Предмет (ID):</th><th>Уч. 1 (ID):</th><th>Уч. 2 (ID):</th><th>Уч. 3 (ID):</th><th>Уч. 4 (ID):</th><th>Уч. 5 (ID):</th>
        <th>Уч. 6 (ID):</th><th>Уч. 7 (ID):</th><th>Уч. 8 (ID):</th><th>Уч. 9 (ID):</th><th>Уч. 10 (ID):</th>
      </tr>";
    
      for ($i = 0 ; $i < $rows ; ++$i) {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 12 ; ++$j) {
              if ($row[$j] == ""){
                echo "<td>Место свободно</td>";
              } 
              else {
              echo "<td>$row[$j]</td>";
            }
            }
        echo "</tr>";
      }
      echo "</table>";

      mysqli_free_result($result);
    }

    mysqli_close($connection);

?>

<?php

  $host = 'localhost';
  $user = 'root';
  $password = 'root';

  $db="vws_site";

  $connection = mysqli_connect($host, $user, $password)
  or die ("Ошибка " . mysqli_error($link));

  mysqli_select_db($connection, $db);

  $query = "SELECT * FROM LESSONS";

  $result = mysqli_query($connection, $query) or die ("<h1 class = 'error_h'> Ошибка MySQL: </h1> <br> <p class = 'error_p'>" . mysqli_error($link));

  if($result) {
      $rows = mysqli_num_rows($result);

      echo "<div class='table_wrapper'>";
      echo "<div class = 'table_title'><p>Уроки:</p></div>";
      echo "<div class='table_title_underline'></div>";
      echo "<table>
      <tr>
        <th>ID</th><th>Время урока:</th><th>Группа (ID):</th><th>Учитель (ID):</th>
      </tr>";
    
      for ($i = 0 ; $i < $rows ; ++$i) {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 4 ; ++$j) {
              if ($row[$j] == ""){
                echo "<td>Место свободно</td>";
              } 
              else {
              echo "<td>$row[$j]</td>";
            }
            }
        echo "</tr>";
      }
      echo "</table>";

      mysqli_free_result($result);
    }

    mysqli_close($connection);

?>

<form method="post" action="load_tables.php">
<input type="submit" class="button_back" name="end_login_submit" value="Назад">
</form>
</body>
</html>