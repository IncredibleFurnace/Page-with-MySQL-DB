<head>
	<link rel="stylesheet" href="../css/style.css"></link>
</head>
<?php
	
	$host = 'localhost';
	$user = 'root';
	$password = 'root';

	$db="vws_site";

	$connection = mysqli_connect($host, $user, $password)
	or die ("<h1 class = 'error_h'> Ошибка MySQL: </h1> <br> <p class = 'error_p'>" . mysqli_error($connection));

	mysqli_select_db($connection, $db);


	if(!empty($_POST["add_fio_teach"])) {
	$fio = $_POST['add_fio_teach'];
	}

	if(!empty($_POST["add_login_teach"])) {
	$login = $_POST['add_login_teach'];
	}

	if(!empty($_POST["add_pass_teach"])) {
	$pass = $_POST['add_pass_teach'];
	}

	if(!empty($_POST["add_email_teach"])) {
	$email = $_POST['add_email_teach'];
	}

	if(!empty($_POST["add_phone_num_teach"])) {
	$phone_num = $_POST['add_phone_num_teach'];
	}

	if($fio && $login && $password && $email && $phone_num) {

	$query = "INSERT INTO TEACHER (fio, login, password, email, phone_num) VALUES ('$fio', '$login', '$pass','$email', '$phone_num');";
	$result = mysqli_query($connection, $query) or die ("Ошибка " . mysqli_error($connection));

	mysqli_close($connection);

	header("Location: load_tables.php");
	exit;
	
	} 

	else {
		header("Location: load_tables.php");
	}

?>	