<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $supply = $_POST['supply'];
    $suppliers = $_POST['suppliers'];
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];

    $conn = new mysqli("localhost", "root", "", "inventory");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    try {
        $stmt = $conn->prepare("UPDATE inventory SET supply_id=?, suppliers_id=?, qty=?, amount=?, date_created=? WHERE id=?");
        $stmt->bind_param('iiidsi', $supply, $suppliers, $quantity, $amount, $date, $id);
        $stmt->execute();
        $_SESSION['status'] = 'Supply updated successfully';
        $_SESSION['status_code'] = 'success';
        header('location: stock_in.php');
        exit;
    } catch (mysqli_sql_exception $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $conn->close();
} else {
    $_SESSION['status'] = 'Fill up edit supply form first';
    $_SESSION['status_code'] = 'warning';
    header('location: stock_in.php');
    exit;
}
?>
