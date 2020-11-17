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

	if(!empty($_POST["update_id_class"])) {
	$id = $_POST['update_id_class'];
	}

	if(!empty($_POST["update_subject_class"])) {
	$subject = $_POST['update_subject_class'];
	}

	if(!empty($_POST["update_student1_class"])) {
	$student1 = $_POST['update_student1_class'];
	}

	if(!empty($_POST["update_student2_class"])) {
	$student2 = $_POST['update_student2_class'];
	}

	if(!empty($_POST["update_student3_class"])) {
	$student3 = $_POST['update_student3_class'];
	}

	if(!empty($_POST["update_student4_class"])) {
	$student4 = $_POST['update_student4_class'];
	}

	if(!empty($_POST["update_student5_class"])) {
	$student5 = $_POST['update_student5_class'];
	}

	if(!empty($_POST["update_student6_class"])) {
	$student6 = $_POST['update_student6_class'];
	}

	if(!empty($_POST["update_student7_class"])) {
	$student7 = $_POST['update_student7_class'];
	}

	if(!empty($_POST["update_student8_class"])) {
	$student8 = $_POST['update_student8_class'];
	}

	if(!empty($_POST["update_student9_class"])) {
	$student9 = $_POST['update_student9_class'];
	}

	if(!empty($_POST["update_student10_class"])) {
	$student10 = $_POST['update_student10_class'];
	}	

	if(true) {

	$query = "UPDATE CLASSES SET subject = $subject, student_1 =$student1, student_2=$student2,
	student_3 = $student3, student_4 =$student4, student_5 = $student5, student_6 = $student6, student_7 = $student7,
	student_8 = $student8, student_9 = $student9, student_10 = $student10 WHERE id_class = $id";
	$result = mysqli_query($connection, $query) or die ("Ошибка " . mysqli_error($connection));

	mysqli_close($connection);

	header("Location: load_tables.php");
	exit;
	
	} 

	else {
		header("Location: load_tables.php");
	}	
?>