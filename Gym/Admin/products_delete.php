<?php
include 'includes/session.php';

$conn = new mysqli("localhost", "root", "", "inventory");

if(isset($_POST['search_data'])) {
    $id = $_POST['id'];
    $visible = $_POST['visible'];

    $query = "UPDATE products  SET visible='$visible' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);
}

if(isset($_POST['archive_multiple_data'])) {
    $id = "1";

    // Start a transaction
    mysqli_autocommit($conn, false);

    // Insert data into equiparchive table
    $insert_query = "INSERT INTO prodarchive SELECT * FROM products  WHERE visible='$id'";
    $insert_query_run = mysqli_query($conn, $insert_query);

    // Delete data from equipments table
    $delete_query = "DELETE FROM products  where visible='$id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    // Update visible to 0 after inserting into equiparchive
    $update_query = "UPDATE prodarchive  SET visible=0 WHERE visible='$id'";
    $stmt = $conn->prepare($update_query);

    // Check if both queries were successful
    if($insert_query_run && $delete_query_run && $update_query && $stmt->execute())
    {
     mysqli_commit($conn);
     $_SESSION['status'] = 'Product Data Archived Successfully';
     $_SESSION['status_code'] = 'success';
     header('location: products.php');
    }
    else{
     mysqli_rollback($conn);
     $_SESSION['status'] = 'Product Data Not Archived Successfully';
     $_SESSION['status_code'] = 'error';
     header('location: products.php');
    }

    // End the transaction
    mysqli_autocommit($conn, true);
 }

?>

