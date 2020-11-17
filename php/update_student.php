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


	if(!empty($_POST["update_id_stud"])) {
	$id = $_POST['update_id_stud'];
	}

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

	if($id && $fio && $login && $password && $email && $phone_num) {

	$query = "UPDATE STUDENT SET fio='$fio', login='$login', password='$pass',
	email = '$email', phone_num='$phone_num' WHERE id_stud = $id";
	$result = mysqli_query($connection, $query) or die ("Ошибка " . mysqli_error($connection));

	mysqli_close($connection);

	header("Location: load_tables.php");
	exit;
	
	} 

	else {
		header("Location: load_tables.php");
	}	
?>