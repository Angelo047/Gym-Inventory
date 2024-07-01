<?php
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$conn = new mysqli("localhost", "root", "", "inventory");

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$stmt = $conn->prepare("SELECT *, prodarchive.id AS prodarchiveid, prodarchive.name AS prodarchivename, category.name AS catname FROM prodarchive LEFT JOIN category ON category.id=prodarchive.category_id WHERE prodarchive.id=?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$stmt->close();
		$conn->close();

		echo json_encode($row);
	}
?>
