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

	$student1 = 'NULL';
	$student2 = 'NULL';
	$student3 = 'NULL';
	$student4 = 'NULL';
	$student5 = 'NULL';
	$student6 = 'NULL';
	$student7 = 'NULL';
	$student8 = 'NULL';
	$student9 = 'NULL';
	$student10 = 'NULL';									

	if(!empty($_POST["add_id_class"])) {
	$id = $_POST['add_id_class'];
	}

	if(!empty($_POST["add_subject_class"])) {
	$subject = $_POST['add_subject_class'];
	}

	if(!empty($_POST["add_student1_class"])) {
	$student1 = $_POST['add_student1_class'];
	}

	if(!empty($_POST["add_student2_class"])) {
	$student2 = $_POST['add_student2_class'];
	}

	if(!empty($_POST["add_student3_class"])) {
	$student3 = $_POST['add_student3_class'];
	}

	if(!empty($_POST["add_student4_class"])) {
	$student4 = $_POST['add_student4_class'];
	}

	if(!empty($_POST["add_student5_class"])) {
	$student5 = $_POST['add_student5_class'];
	}

	if(!empty($_POST["add_student6_class"])) {
	$student6 = $_POST['add_student6_class'];
	}

	if(!empty($_POST["add_student7_class"])) {
	$student7 = $_POST['add_student7_class'];
	}

	if(!empty($_POST["add_student8_class"])) {
	$student8 = $_POST['add_student8_class'];
	}

	if(!empty($_POST["add_student9_class"])) {
	$student9 = $_POST['add_student9_class'];
	}

	if(!empty($_POST["add_student10_class"])) {
	$student10 = $_POST['add_student10_class'];
	}	

	if(true) {

	$query = "INSERT INTO CLASSES (subject, student_1, student_2, student_3, student_4, student_5, student_6, student_7, student_8, student_9, student_10) VALUES ($subject, $student1, $student2, $student3, $student4, $student5, $student6, $student7, $student8, $student9, $student10);";
	$result = mysqli_query($connection, $query) or die ("Ошибка " . mysqli_error($connection));

	mysqli_close($connection);

	header("Location: load_tables.php");
	exit;
	
	} 

	else {
		header("Location: load_tables.php");
	}	
?>