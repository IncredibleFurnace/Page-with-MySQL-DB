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


	if(!empty($_POST["update_id_edu_mat"])) {
	$id = $_POST['update_id_edu_mat'];
	}

	if(!empty($_POST["update_title_edu_mat"])) {
	$title = $_POST['update_title_edu_mat'];
	}

	if(!empty($_POST["update_author_edu_mat"])) {
	$author = $_POST['update_author_edu_mat'];
	}

	if(!empty($_POST["update_pages_edu_mat"])) {
	$pages = $_POST['update_pages_edu_mat'];
	}

	if(!empty($_POST["update_year_edu_mat"])) {
	$year = $_POST['update_year_edu_mat'];
	}

	if(!empty($_POST["update_subject_edu_mat"])) {
	$subject = $_POST['update_subject_edu_mat'];
	}

	if($id && $title && $author && $pages && $year && $subject) {

	$query = "UPDATE EDU_MAT SET title='$title', author ='$author', pages='$pages',
	rel_year = '$year', subject='$subject' WHERE id_edu_mat = $id";
	$result = mysqli_query($connection, $query) or die ("Ошибка " . mysqli_error($connection));

	mysqli_close($connection);

	header("Location: load_tables.php");
	exit;
	
	} 

	else {
		header("Location: load_tables.php");
	}	
?>