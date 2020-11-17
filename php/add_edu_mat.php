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


	if(!empty($_POST["add_title_edu_mat"])) {
	$title = $_POST['add_title_edu_mat'];
	}

	if(!empty($_POST["add_author_edu_mat"])) {
	$author = $_POST['add_author_edu_mat'];
	}

	if(!empty($_POST["add_pages_edu_mat"])) {
	$pages = $_POST['add_pages_edu_mat'];
	}

	if(!empty($_POST["add_year_edu_mat"])) {
	$year = $_POST['add_year_edu_mat'];
	}

	if(!empty($_POST["add_subject_edu_mat"])) {
	$subject = $_POST['add_subject_edu_mat'];
	}


	if($title && $author && $pages && $year && $subject) {

	$query = "INSERT INTO EDU_MAT (title, author, pages, rel_year, subject, file_name) VALUES ('$title', '$author', '$pages', '$year', '$subject','');";

	$result = mysqli_query($connection, $query) or die ("Ошибка " . mysqli_error($connection));

	mysqli_close($connection);

	header("Location: load_tables.php");
	exit;
	
	} 

	else {
		header("Location: load_tables.php");
	}	
?>