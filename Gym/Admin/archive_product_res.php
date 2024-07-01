<?php
include 'includes/session.php';

$conn = new mysqli("localhost", "root", "", "inventory");

if(isset($_POST['search_data'])) {
    $id = $_POST['id'];
    $visible = $_POST['visible'];

    $query = "UPDATE prodarchive  SET visible='$visible' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);
}

if(isset($_POST['unarchive_multiple_data'])) {
    $id = "1";

    // Start a transaction
    mysqli_autocommit($conn, false);

    // Insert data into equiparchive table
    $insert_query = "INSERT INTO products SELECT * FROM prodarchive  WHERE visible='$id'";
    $insert_query_run = mysqli_query($conn, $insert_query);

    // Delete data from equipments table
    $delete_query = "DELETE FROM prodarchive  where visible='$id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    // Update visible to 0 after inserting into equiparchive
    $update_query = "UPDATE products  SET visible=0 WHERE visible='$id'";
    $stmt = $conn->prepare($update_query);

    // Check if both queries were successful
    if($insert_query_run && $delete_query_run && $update_query && $stmt->execute())
    {
     mysqli_commit($conn);
     $_SESSION['status'] = 'Product Data Archived Successfully';
     $_SESSION['status_code'] = 'success';
     header('location: archive_products.php');
    }
    else{
     mysqli_rollback($conn);
     $_SESSION['status'] = 'Product Data Not Archived Successfully';
     $_SESSION['status_code'] = 'error';
     header('location: archive_products.php');
    }

    // End the transaction
    mysqli_autocommit($conn, true);
 }

?>

