<?php
  $host = 'localhost';
  $user = 'root';
  $password = 'root';

  $db="vws_site";

  $connection = mysqli_connect($host, $user, $password)
  or die ("Ошибка " . mysqli_error($link));

  mysqli_select_db($connection, $db);

  $cname = $_FILES['file']['name'];

  $tname = $_FILES['file']['tmp_name'];

  $title = $cname;

  $id = $_POST['edu_mat_id'];
  
  //echo $cname;
  //echo $tname;
  //echo $id;

  $upload_dir = '../files';
  move_uploaded_file($tname, $upload_dir.'/'.$cname);

  $query = "UPDATE EDU_MAT SET file_name = '$cname' WHERE id_edu_mat = $id";

  mysqli_query($connection, $query) or die ("Ошибка " . mysqli_error($connection));

  header("Location: load_tables.php");

 ?>