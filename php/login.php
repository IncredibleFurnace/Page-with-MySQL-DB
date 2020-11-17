<?php
	session_start();

	$login_entered = $_POST['login_input'];
	$password_entered = $_POST['password_input'];

	  $_SESSION['login_entered'] = $_POST['login_input'];
    $_SESSION['password_entered'] = $_POST['password_input'];

    $host = 'localhost';
  	$user = 'root';
  	$password = 'root';

  	$db="vws_site";

 	$connection = mysqli_connect($host, $user, $password)
  	or die ("Ошибка " . mysqli_error($link));

  	mysqli_select_db($connection, $db);

  	$query = "SELECT * FROM MODERATOR WHERE login = '$login_entered' AND password = '$password_entered'";
  	$result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 0) {

    	$_SESSION['message'] = 'Данные для входа неверны или у вас нет прав модератора';
    	echo $_SESSION['message'];
    	header("Location: ../index.php");
	}

	else {
		$_SESSION['LOGGED_IN'] = 'YES';
		echo $_SESSION['LOGGED_IN'];
		header("Location: load_tables.php");
	}
?>