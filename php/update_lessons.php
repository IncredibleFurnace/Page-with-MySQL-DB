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
									

	if(!empty($_POST["update_id_lesson"])) {
	$id = $_POST['update_id_lesson'];
	}

	if(!empty($_POST["update_timestamp_lesson"])) {
	$timestamp = $_POST['update_timestamp_lesson'];
	}

	if(!empty($_POST["update_class_lesson"])) {
	$class = $_POST['update_class_lesson'];
	}

	if(!empty($_POST["update_teacher_lesson"])) {
	$teacher = $_POST['update_teacher_lesson'];
	}

	if($id && $timestamp && $class && $teacher) {

	$query = "UPDATE LESSONS SET lesson_time = '$timestamp', classes = $class, teacher = $teacher WHERE id_less = $id";
	$result = mysqli_query($connection, $query) or die ("<h1 class = 'error_h'> Ошибка MySQL: </h1> <br> <p class = 'error_p'>" . mysqli_error($connection));

	mysqli_close($connection);

	header("Location: load_tables.php");
	exit;
	
	} 

	else {
		header("Location: load_tables.php");
	}	
?>