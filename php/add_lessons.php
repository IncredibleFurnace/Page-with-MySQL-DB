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
									

	if(!empty($_POST["add_id_lesson"])) {
	$id = $_POST['add_id_lesson'];
	}

	if(!empty($_POST["add_timestamp_lesson"])) {
	$timestamp = $_POST['add_timestamp_lesson'];
	}

	if(!empty($_POST["add_class_lesson"])) {
	$class = $_POST['add_class_lesson'];
	}

	if(!empty($_POST["add_teacher_lesson"])) {
	$teacher = $_POST['add_teacher_lesson'];
	}

	if($timestamp && $class && $teacher) {

	$query = "INSERT INTO LESSONS (lesson_time, classes, teacher) VALUES ('$timestamp', $class, $teacher);";
	$result = mysqli_query($connection, $query) or die ("<h1 class = 'error_h'> Ошибка MySQL: </h1> <br> <p class = 'error_p'>" . mysqli_error($connection));

	mysqli_close($connection);

	header("Location: load_tables.php");
	exit;
	
	} 

	else {
		header("Location: load_tables.php");
	}	
?>