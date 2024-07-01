<?php
include 'includes/session.php';

if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$date = $_POST['date'];
	$supply = $_POST['supply'];
	$customers = $_POST['customers'];
	$quantity = $_POST['quantity'];
	$amount = $_POST['amount'];

	$conn = new mysqli("localhost", "root", "", "inventory");

	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	try{

		$inn_stmt = $conn->prepare("SELECT sum(qty) as inn FROM inventory where stock_type = 1 and supply_id = ?");
		$inn_stmt->bind_param('i', $supply);
		$inn_stmt->execute();
		$inn_result = $inn_stmt->get_result();
		$inn_row = $inn_result->fetch_assoc();
		$inn = $inn_row['inn'] ?? 0;

		$out_stmt = $conn->prepare("SELECT sum(qty) as `out` FROM inventory where stock_type = 2 and supply_id = ?");
		$out_stmt->bind_param('i', $supply);
		$out_stmt->execute();
		$out_result = $out_stmt->get_result();
		$out_row = $out_result->fetch_assoc();
		$out = $out_row['out'] ?? 0;

		$available = $inn - $out;

		if($quantity > $available){
			$_SESSION['status'] = 'Out of Stock';
			$_SESSION['status_code'] = 'error';
			header('location: stock_out.php');
			exit;
		}
		else{
			 $stmt = $conn->prepare("UPDATE inventory SET supply_id=?, customer_id=?, qty=?, amount=?, date_created=? WHERE id=?");
			 $stmt->bind_param('iiidsi', $supply, $customers, $quantity, $amount, $date, $id);
			 $stmt->execute();
			 $_SESSION['status'] = 'Supply stock out updated successfully';
			 $_SESSION['status_code'] = 'success';
			 header('location: stock_out.php');
			 exit;
		}
	}
	catch(Exception $e){
		$_SESSION['error'] = $e->getMessage();
	}

	$conn->close();
}
else{
	$_SESSION['status'] = 'Fill up edit supply form first';
	$_SESSION['status_code'] = 'warning';
	header('location: stock_out.php');
	exit;
}
?>
