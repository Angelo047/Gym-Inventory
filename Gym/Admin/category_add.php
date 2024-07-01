<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];

		$conn = new mysqli("localhost", "root", "", "inventory");

		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}

		$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM category WHERE name=?");
		$stmt->bind_param('s', $name);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		if($row['numrows'] > 0){
			$_SESSION['status'] = 'Category already exists';
			$_SESSION['status_code'] = 'error';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO category (name) VALUES (?)");
				$stmt->bind_param('s', $name);
				$stmt->execute();
				$_SESSION['status'] = 'Category added successfully';
				$_SESSION['status_code'] = 'success';
			}
			catch(mysqli_sql_exception $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$stmt->close();
		$conn->close();
	}
	else{
		$_SESSION['status'] = 'Fill up category form first';
		$_SESSION['status_code'] = 'warning';
	}

	header('location: category.php');
?>
