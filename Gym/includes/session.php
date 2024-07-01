<?php
include 'includes/conn.php';
session_start();

if(isset($_SESSION['admin'])){
	header('location: Admin/Index.php');
	exit; // Ensure to exit after redirection
}

if(isset($_SESSION['user'])){
	$mysqli = new mysqli("localhost","root","","inventory");
	if($mysqli->connect_error){
		die("Connection failed: " . $mysqli->connect_error);
	}

	try{
		$stmt = $mysqli->prepare("SELECT * FROM users WHERE id=?");
		$stmt->bind_param('i', $_SESSION['user']);
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows === 1) {
			$user = $result->fetch_assoc();
			// Proceed with your logic here using $user data if needed
		} else {
			echo "User not found.";
		}
	}
	catch(Exception $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$stmt->close();
	$mysqli->close();
}
?>
