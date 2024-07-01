<?php
    include 'includes/session.php';

    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $conn = new mysqli("localhost", "root", "", "inventory");

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT *, suppliers.id AS suppliersid, suppliers.name AS suppliersname FROM suppliers WHERE suppliers.id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();
        $conn->close();

        header('Content-Type: application/json');
        echo json_encode($row);
        exit;
    }
?>

