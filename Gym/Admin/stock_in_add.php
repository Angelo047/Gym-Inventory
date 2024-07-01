<?php
include 'includes/session.php';

if(isset($_POST['add'])){
    $suppliers = $_POST['suppliers'];
    $stock_type = $_POST['stock_type'];
    $date = $_POST['date'];

    $mysqli = new mysqli("localhost", "root", "", "inventory");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    try{
        $stmt = $mysqli->prepare("INSERT INTO inventory (supply_id, suppliers_id, qty, stock_type, amount, date_created) VALUES (?, ?, ?, ?, ?, ?)");
        // Loop through the appended data
        foreach($_POST['supply'] as $key => $supply) {
            $quantity = $_POST['quantity'][$key];
            $amount = $_POST['amount'][$key];
            $stmt->bind_param("ssssss", $supply, $suppliers, $quantity, $stock_type, $amount, $date);
            $stmt->execute();
        }
        $_SESSION['status'] = 'Supply Stock In successfully';
        $_SESSION['status_code'] = 'success';
    }
    catch(Exception $e){
        $_SESSION['error'] = $e->getMessage();
    }

    $stmt->close();
    $mysqli->close();
    header('location: stock_in.php');
    exit();
}
else{
    $_SESSION['error'] = 'Fill up inventory form first';
    header('location: stock_in.php');
    exit();
}
?>
