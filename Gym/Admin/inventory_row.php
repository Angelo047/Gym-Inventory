<?php
include 'includes/session.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $conn = new mysqli("localhost", "root", "", "inventory");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT *, inventory.id AS inventid,
    products.name AS prodname, products.id AS products_id,
    suppliers.name AS suppname, suppliers.phone AS suppphone, suppliers.address AS suppadd,
    users.fullname AS username, users.id AS users_id
    FROM inventory
    LEFT JOIN products ON products.id=inventory.supply_id
    LEFT JOIN suppliers ON suppliers.id=inventory.suppliers_id
    LEFT JOIN users ON users.id=inventory.customer_id
    WHERE inventory.id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($row);
    exit;
}
?>
