<?php
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$conn = new mysqli("localhost", "root", "", "inventory");

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$stmt = $conn->prepare("SELECT *, equiparchive.id AS equiparchiveid, equiparchive.name AS equiparchivename, category.name AS catname FROM equiparchive LEFT JOIN category ON category.id=equiparchive.category_id WHERE equiparchive.id=?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$stmt->close();
		$conn->close();

		echo json_encode($row);
	}
?>
