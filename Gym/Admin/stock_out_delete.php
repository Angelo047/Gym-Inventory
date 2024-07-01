<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];


		$conn = new mysqli("localhost", "root", "", "inventory");

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		try{
			$stmt = $conn->prepare("DELETE FROM inventory WHERE id=?");
			$stmt->bind_param('i', $id);
			$stmt->execute();

			$_SESSION['status'] = 'Stock out Supply deleted successfully';
			$_SESSION['status_code'] = 'success';
		}
		catch(Exception $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$conn->close();
	}
	else{
		$_SESSION['status'] = 'Select Supply to delete first';
		$_SESSION['status_code'] = 'error';
	}

	header('location: stock_out.php');

?>
