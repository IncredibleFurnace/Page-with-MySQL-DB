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


	if(!empty($_POST["add_subject_subj"])) {
	$subj = $_POST['add_subject_subj'];
	}

	if($subj) {

	$query = "INSERT INTO SUBJECT (subject) VALUES ('$subj');";
	$result = mysqli_query($connection, $query) or die ("Ошибка " . mysqli_error($connection));

	mysqli_close($connection);
	
	header("Location: load_tables.php");
	exit;
	
	} 

	else {
		header("Location: load_tables.php");
	}
?>	