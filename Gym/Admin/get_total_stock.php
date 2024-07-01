<?php

$conn = new mysqli("localhost", "root", "", "inventory");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['supply_id'])) {
    $supply_id = $_POST['supply_id'];
    $inn_stmt = $conn->prepare("SELECT SUM(qty) AS inn FROM inventory WHERE stock_type = 1 AND supply_id = ?");
    $inn_stmt->bind_param('i', $supply_id);
    $inn_stmt->execute();
    $inn_result = $inn_stmt->get_result();
    $inn = $inn_result->fetch_assoc()['inn'] ?? 0;
    $out_stmt = $conn->prepare("SELECT SUM(qty) AS `out` FROM inventory WHERE stock_type = 2 AND supply_id = ?");
    $out_stmt->bind_param('i', $supply_id);
    $out_stmt->execute();
    $out_result = $out_stmt->get_result();
    $out = $out_result->fetch_assoc()['out'] ?? 0;
    $total_stock = $inn - $out;


    $price_stmt = $conn->prepare("SELECT price FROM products WHERE id = ?"); // Update with your table name and column name for product price
    $price_stmt->bind_param('i', $supply_id);
    $price_stmt->execute();
    $price_result = $price_stmt->get_result();
    $product_price = $price_result->fetch_assoc()['price'] ?? 0;


    $inn_stmt->close();
    $out_stmt->close();
    $price_stmt->close();

    echo json_encode(array('total_stock' => $total_stock, 'product_price' => $product_price));
    exit;
}

$conn->close();
?>
