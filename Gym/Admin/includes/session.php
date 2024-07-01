<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: ../Login.php');
		exit();
	}

	$mysqli = new mysqli("localhost","root","","inventory");

	if($mysqli->connect_error){
		die("Connection failed: " . $mysqli->connect_error);
	}

	$stmt = $mysqli->prepare("SELECT * FROM users WHERE id=?");
	$stmt->bind_param('s', $_SESSION['admin']);
	$stmt->execute();
	$result = $stmt->get_result();
	$admin = $result->fetch_assoc();

	$stmt->close();
	$mysqli->close();

?>
