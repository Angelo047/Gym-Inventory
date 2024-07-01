<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
	$id = $_POST['id'];

	$conn = new mysqli("localhost", "root", "", "inventory");
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("DELETE FROM inventory WHERE id=?");
	$stmt->bind_param("i", $id);
	if($stmt->execute()){
		$_SESSION['status'] = 'Supply deleted successfully';
		$_SESSION['status_code'] = 'success';
	} else{
		$_SESSION['error'] = $stmt->error;
	}

	$stmt->close();
	$conn->close();
}
else{
	$_SESSION['status'] = 'Select Supply to delete first';
	$_SESSION['status_code'] = 'error';
}

header('location: stock_in.php');
exit();
?>
