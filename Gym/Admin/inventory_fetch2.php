<?php
include 'includes/session.php';

$options = array(); // Array to store options

$mysqli = new mysqli("localhost", "root", "", "inventory");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM products";
$result = $mysqli->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $options[] = array('id' => $row['id'], 'name' => $row['name']);
    }
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode($options);
?>
