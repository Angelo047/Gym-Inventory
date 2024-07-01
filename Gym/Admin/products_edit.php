<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$price = $_POST['price'];
		$description = $_POST['description'];

		$conn = new mysqli("localhost", "root", "", "inventory");

		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}

		try{
			$stmt = $conn->prepare("UPDATE products SET name=?, slug=?, category_id=?, price=?, description=? WHERE id=?");
			$stmt->bind_param('sssdsi', $name, $slug, $category, $price, $description, $id);
			$stmt->execute();
			$_SESSION['status'] = 'Product updated successfully';
			$_SESSION['status_code'] = 'success';
		}
		catch(mysqli_sql_exception $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$conn->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: products.php');

?>
