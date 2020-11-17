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
        <h1 class="top_panel_text">Личный кабинет модератора</h1>
      </div>

<?php
  session_start();
  if($_SESSION['LOGGED_IN'] != 'YES') {
   $_SESSION['message'] = 'Для доступа к личному кабинету вы должны войти как модератор';
   header("Location: ../index.php");
  }
?>      

<!--student-->

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

<div class='table_title'><p>Добавить ученика / Изменить данные:</p></div>
  <table class='table_add_update'>
    <tr>
      <td>
      <form method="post" action="update_student.php">
        <label for="update_id_stud" class="label_update_form">ID:</label>
        <input type="text" name="update_id_stud">
        <label for="update_fio_stud" class="label_update_form">ФИО:</label>
        <input type="text" name="update_fio_stud">
        <label for="update_fio_stud" class="label_update_form">Логин:</label>
        <input type="text" name="update_login_stud">
        <label for="update_fio_stud" class="label_update_form">Пароль:</label>
        <input type="text" name="update_pass_stud">
        <label for="update_fio_stud" class="label_update_form">Email:</label>
        <input type="text" name="update_email_stud">
        <label for="update_fio_stud" class="label_update_form">Номер тел.:</label>
        <input type="text" name="update_phone_num_stud">
        <input type="submit" value="Обновить">
      </form>
    </td>
    </tr>
    <tr>
      <td>
        <form method="post" action="add_student.php">
        <label for="update_id_stud" class="label_update_form">ID:</label>
        <input type="text" name="update_id_stud" value="AUTO_INCREMENT" disabled>
        <label for="update_fio_stud" class="label_update_form">ФИО:</label>
        <input type="text" name="update_fio_stud">
        <label for="update_fio_stud" class="label_update_form">Логин:</label>
        <input type="text" name="update_login_stud">
        <label for="update_fio_stud" class="label_update_form">Пароль:</label>
        <input type="text" name="update_pass_stud">
        <label for="update_fio_stud" class="label_update_form">Email:</label>
        <input type="text" name="update_email_stud">
        <label for="update_fio_stud" class="label_update_form">Номер тел.:</label>
        <input type="text" name="update_phone_num_stud">
        <input type="submit" value="Добавить">
      </form>
    </td>
    </tr>
  </table>

<div class='table_title'><p>Удалить:</p></div>
  <table class='table_add_update'>
    <tr>
    <th>ID:</th>
    <td>
      <form method='post' action='delete_student.php'><input type="text" name='input_delete_stud'>
      <input type='submit' value='Удалить'>
      </form>
    </td>
    </tr>
  </table>
</div>

<!-- end of student -->

<!--teacher-->

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

<div class='table_title'><p>Добавить преподавателя / Изменить данные:</p></div>
  <table class='table_add_update'>
    <tr>
      <td>
      <form method="post" action="update_teach.php">
        <label for="update_id_teach" class="label_update_form">ID:</label>
        <input type="text" name="update_id_teach">
        <label for="update_fio_teach" class="label_update_form">ФИО:</label>
        <input type="text" name="update_fio_teach">
        <label for="update_login_teach" class="label_update_form">Логин:</label>
        <input type="text" name="update_login_teach">
        <label for="update_pass_teach" class="label_update_form">Пароль:</label>
        <input type="text" name="update_pass_teach">
        <label for="update_email_teach" class="label_update_form">Email:</label>
        <input type="text" name="update_email_teach">
        <label for="update_phone_num_teach" class="label_update_form">Номер тел.:</label>
        <input type="text" name="update_phone_num_teach">
        <input type="submit" value="Обновить">
      </form>
    </td>
    </tr>
    <tr>
      <td>
        <form method="post" action="add_teach.php">
        <label for="add_id_teach" class="label_update_form">ID:</label>
        <input type="text" name="add_id_teach" value="AUTO_INCREMENT" disabled>
        <label for="add_fio_teach" class="label_update_form">ФИО:</label>
        <input type="text" name="add_fio_teach">
        <label for="add_login_teach" class="label_update_form">Логин:</label>
        <input type="text" name="add_login_teach">
        <label for="add_pass_teach" class="label_update_form">Пароль:</label>
        <input type="text" name="add_pass_teach">
        <label for="add_email_teach" class="label_update_form">Email:</label>
        <input type="text" name="add_email_teach">
        <label for="add_phone_num_teach" class="label_update_form">Номер тел.:</label>
        <input type="text" name="add_phone_num_teach">
        <input type="submit" value="Добавить">
      </form>
    </td>
    </tr>
  </table>

<div class='table_title'><p>Удалить:</p></div>
  <table class='table_add_update'>
    <tr>
    <th>ID:</th>
    <td>
      <form method='post' action='delete_teach.php'><input type="text" name='input_delete_teach'>
      <input type='submit' value='Удалить'>
      </form>
    </td>
    </tr>
  </table>
</div>

<!-- end of teacher -->

<!--moderator-->
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

<!--end of moderator-->

<!-- subject -->

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

<div class='table_title'><p>Добавить предмет / Изменить данные:</p></div>
  <table class='table_add_update'>
    <tr>
      <td>
      <form method="post" action="update_subj.php">
        <label for="update_id_subj" class="label_update_form">ID:</label>
        <input type="text" name="update_id_subj">
        <label for="update_subject_subj" class="label_update_form">Название предмета:</label>
        <input type="text" name="update_subject_subj">
        <input type="submit" value="Обновить">
      </form>
    </td>
    </tr>
    <tr>
      <td>
        <form method="post" action="add_subj.php">
        <label for="add_id_subj" class="label_update_form">ID:</label>
        <input type="text" name="add_id_subj" value="AUTO_INCREMENT" disabled>
        <label for="add_subject_subj" class="label_update_form">Название предмета:</label>
        <input type="text" name="add_subject_subj">
        <input type="submit" value="Добавить">
      </form>
    </td>
    </tr>
  </table>

<div class='table_title'><p>Удалить:</p></div>
  <table class='table_add_update'>
    <tr>
    <th>ID:</th>
    <td>
      <form method='post' action='delete_subj.php'><input type="text" name='input_delete_subj'>
      <input type='submit' value='Удалить'>
      </form>
    </td>
    </tr>
  </table>
</div>

<!-- end of subject -->

<!-- edu_mat -->

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

<div class='table_title'><p>Добавить учебный материал / Изменить данные:</p></div>
  <table class='table_add_update'>
    <tr>
      <td>
      <form method="post" action="update_edu_mat.php">
        <label for="update_id_edu_mat" class="label_update_form">ID:</label>
        <input type="text" name="update_id_edu_mat">
        <label for="update_title_edu_mat" class="label_update_form">Заголовок:</label>
        <input type="text" name="update_title_edu_mat">
        <label for="update_author_edu_mat" class="label_update_form">Автор:</label>
        <input type="text" name="update_author_edu_mat">
        <label for="update_pages_edu_mat" class="label_update_form">Кол-во стр.:</label>
        <input type="text" name="update_pages_edu_mat">
        <label for="update_year_edu_mat" class="label_update_form">Год:</label>
        <input type="text" name="update_year_edu_mat">
        <label for="update_subject_edu_mat" class="label_update_form">Предмет (ID):</label>
        <input type="text" name="update_subject_edu_mat">
        <input type="submit" value="Обновить">
      </form>
    </td>
    </tr>
    <tr>
      <td>
        <form method="post" action="add_edu_mat.php">
        <label for="add_id_edu_mat" class="label_update_form">ID:</label>
        <input type="text" name="add_id_edu_mat" value="AUTO_INCREMENT" disabled>
        <label for="add_title_edu_mat" class="label_update_form">Заголовок:</label>
        <input type="text" name="add_title_edu_mat">
        <label for="add_author_edu_mat" class="label_update_form">Автор:</label>
        <input type="text" name="add_author_edu_mat">
        <label for="add_pages_edu_mat" class="label_update_form">Кол-во стр.:</label>
        <input type="text" name="add_pages_edu_mat">
        <label for="add_year_edu_mat" class="label_update_form">Год:</label>
        <input type="text" name="add_year_edu_mat">
        <label for="add_subject_edu_mat" class="label_update_form">Предмет (ID):</label>
        <input type="text" name="add_subject_edu_mat">
        <input type="submit" value="Добавить">
      </form>
    </td>
    </tr>
  </table>

<div class='table_title'><p>Удалить:</p></div>
  <table class='table_add_update'>
    <tr>
    <th>ID:</th>
    <td>
      <form method='post' action='delete_edu_mat.php'>
        <input type="text" name='input_delete_edu_mat'>
        <input type='submit' value='Удалить'>
      </form>
    </td>
    </tr>
  </table>
</div>

<!-- end of edu_mat -->

<!-- classes -->

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

<div class='table_title'><p>Добавить группу / Изменить данные:</p></div>
  <table class='table_add_update'>
    <tr>
      <td>
      <form method="post" action="update_classes.php">
        <label for="update_id_class" class="label_update_form">ID:</label>
        <input type="text" name="update_id_class" class="input_small">
        <label for="update_subject_class" class="label_update_form">Предмет:</label>
        <input type="text" name="update_subject_class" class="input_small">
        <label for="update_student1_class" class="label_update_form">Уч. 1:</label>
        <input type="text" name="update_student1_class" class="input_small">
        <label for="update_student2_class" class="label_update_form">Уч. 2:</label>
        <input type="text" name="update_student2_class" class="input_small">
        <label for="update_student3_class" class="label_update_form">Уч. 3:</label>
        <input type="text" name="update_student3_class" class="input_small">
        <label for="update_student4_class" class="label_update_form">Уч. 4:</label>
        <input type="text" name="update_student4_class" class="input_small">
        <label for="update_student5_class" class="label_update_form">Уч. 5:</label>
        <input type="text" name="update_student5_class" class="input_small">
        <label for="update_student6_class" class="label_update_form">Уч. 6:</label>
        <input type="text" name="update_student6_class" class="input_small">
        <label for="update_student7_class" class="label_update_form">Уч. 7:</label>
        <input type="text" name="update_student7_class" class="input_small">
        <label for="update_student8_class" class="label_update_form">Уч. 8:</label>
        <input type="text" name="update_student8_class" class="input_small">
        <label for="update_student9_class" class="label_update_form">Уч. 9:</label>
        <input type="text" name="update_student9_class" class="input_small">
        <label for="update_student10_class" class="label_update_form">Уч. 10:</label>
        <input type="text" name="update_student10_class" class="input_small">
        <input type="submit" value="Обновить">
      </form>
    </td>
    </tr>
    <tr>
      <td>
      <form method="post" action="add_classes.php">
        <label for="add_id_class" class="label_update_form">ID:</label>
        <input type="text" name="add_id_class" class="input_small" value="AUTO_INCR" disabled>
        <label for="add_subject_class" class="label_update_form">Предмет:</label>
        <input type="text" name="add_subject_class" class="input_small">
        <label for="add_student1_class" class="label_update_form">Уч. 1:</label>
        <input type="text" name="add_student1_class" class="input_small">
        <label for="add_student2_class" class="label_update_form">Уч. 2:</label>
        <input type="text" name="add_student2_class" class="input_small">
        <label for="add_student3_class" class="label_update_form">Уч. 3:</label>
        <input type="text" name="add_student3_class" class="input_small">
        <label for="add_student4_class" class="label_update_form">Уч. 4:</label>
        <input type="text" name="add_student4_class" class="input_small">
        <label for="add_student5_class" class="label_update_form">Уч. 5:</label>
        <input type="text" name="add_student5_class" class="input_small">
        <label for="add_student6_class" class="label_update_form">Уч. 6:</label>
        <input type="text" name="add_student6_class" class="input_small">
        <label for="add_student7_class" class="label_update_form">Уч. 7:</label>
        <input type="text" name="add_student7_class" class="input_small">
        <label for="add_student8_class" class="label_update_form">Уч. 8:</label>
        <input type="text" name="add_student8_class" class="input_small">
        <label for="add_student9_class" class="label_update_form">Уч. 9:</label>
        <input type="text" name="add_student9_class" class="input_small">
        <label for="add_student10_class" class="label_update_form">Уч. 10:</label>
        <input type="text" name="add_student10_class" class="input_small">
        <input type="submit" value="Добавить">
      </form>
    </td>
    </tr>
  </table>

<div class='table_title'><p>Удалить:</p></div>
  <table class='table_add_update'>
    <tr>
    <th>ID:</th>
    <td>
      <form method='post' action='delete_class.php'>
        <input type="text" name='input_delete_class'>
        <input type='submit' value='Удалить'>
      </form>
    </td>
    </tr>
  </table>
</div>

<!-- end of classes -->

<!--lessons-->

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

<div class='table_title'><p>Добавить урок / Изменить данные:</p></div>
  <table class='table_add_update'>
    <tr>
      <td>
      <form method="post" action="update_lessons.php">
        <label for="update_id_lesson" class="label_update_form">ID:</label>
        <input type="text" name="update_id_lesson">
        <label for="update_timestamp_lesson" class="label_update_form">Время урока:</label>
        <input type="text" name="update_timestamp_lesson">
        <label for="update_class_lesson" class="label_update_form">Группа:</label>
        <input type="text" name="update_class_lesson">
        <label for="update_teacher_lesson" class="label_update_form">Преподаватель:</label>
        <input type="text" name="update_teacher_lesson">

        <input type="submit" value="Обновить">
      </form>
    </td>
    </tr>
    <tr>
      <td>
        <form method="post" action="add_lessons.php">
        <label for="add_id_lesson" class="label_update_form">ID:</label>
        <input type="text" name="add_id_lesson" value="AUTO_INCREMENT" disabled>
        <label for="add_timestamp_lesson" class="label_update_form">Время урока:</label>
        <input type="text" name="add_timestamp_lesson">
        <label for="add_class_lesson" class="label_update_form">Группа:</label>
        <input type="text" name="add_class_lesson">
        <label for="add_teacher_lesson" class="label_update_form">Преподаватель:</label>
        <input type="text" name="add_teacher_lesson">

        <input type="submit" value="Добавить">
      </form>
    </td>
    </tr>
  </table>

<div class='table_title'><p>Удалить:</p></div>
  <table class='table_add_update'>
    <tr>
    <th>ID:</th>
    <td>
      <form method='post' action='delete_lesson.php'>
        <input type="text" name='input_delete_lesson'>
        <input type='submit' value='Удалить'>
      </form>
    </td>
    </tr>
  </table>
</div>
<form method="post" action="record.php">
<input type="submit" class="button_back" value="Отчет">
</form>
<form method="post" action="end_login.php">
<input type="submit" class="button_back" name="end_login_submit" value="Выход">
</form>
</body>
</html>