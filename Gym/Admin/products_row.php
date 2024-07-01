<?php
include 'includes/session.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

	$conn = new mysqli("localhost", "root", "", "inventory");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT *, products.id AS prodid, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $conn->close();

    echo json_encode($row);
}
?>
