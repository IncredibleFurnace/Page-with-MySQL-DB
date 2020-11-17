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

	if(!empty($_POST["update_fio_stud"])) {
	$fio = $_POST['update_fio_stud'];
	}

	if(!empty($_POST["update_login_stud"])) {
	$login = $_POST['update_login_stud'];
	}

	if(!empty($_POST["update_pass_stud"])) {
	$pass = $_POST['update_pass_stud'];
	}

	if(!empty($_POST["update_email_stud"])) {
	$email = $_POST['update_email_stud'];
	}

	if(!empty($_POST["update_phone_num_stud"])) {
	$phone_num = $_POST['update_phone_num_stud'];
	}

	if($fio && $login && $password && $email && $phone_num) {

	$query = "INSERT INTO STUDENT (fio, login, password, email, phone_num) VALUES ('$fio', '$login', '$pass','$email', '$phone_num');";
	$result = mysqli_query($connection, $query) or die ("Ошибка " . mysqli_error($connection));

	mysqli_close($connection);

	header("Location: load_tables.php");
	exit;
	
	} 

	else {
		header("Location: load_tables.php");
	}
?>	