<?php
	include 'includes/session.php';

	$output = '';

	$conn = new mysqli("localhost", "root", "", "inventory");

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$stmt = $conn->prepare("SELECT * FROM products");
		$stmt->execute();
		$result = $stmt->get_result();
		while($row = $result->fetch_assoc()) {
			$output .= "
				<option value='".$row['id']."' class='append_items'>".$row['name']."</option>
			";
		}

	$conn->close();
	echo json_encode($output);
?>
