<?php
    include 'includes/session.php';

    if(isset($_POST['id'])){
        $id = $_POST['id'];

		$conn = new mysqli("localhost", "root", "", "inventory");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT *, equipments.id AS equipid, equipments.name AS equipname, category.name AS catname FROM equipments LEFT JOIN category ON category.id=equipments.category_id WHERE equipments.id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $conn->close();

        echo json_encode($row);
    }
?>
