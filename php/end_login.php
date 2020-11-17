<?php
	session_start();
	$_SESSION['LOGGED_IN'] = 'NO';
	header("Location: load_tables.php");
?>