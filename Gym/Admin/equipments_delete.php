<?php
        include 'includes/session.php';

        $conn = new mysqli("localhost", "root", "", "inventory");

        if(isset($_POST['search_data'])) {
            $id = $_POST['id'];
            $visible = $_POST['visible'];

            $query = "UPDATE equipments  SET visible='$visible' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);
        }

        if(isset($_POST['archive_multiple_data'])) {
            $id = "1";
            $remarks = $_POST['remarks']; // Get the remarks from the input field

            // Start a transaction
            mysqli_autocommit($conn, false);

            // Insert data into equiparchive table with remarks field updated
            $insert_query = "INSERT INTO equiparchive SELECT *, '$remarks' as remarks FROM equipments WHERE visible='$id'";
            $insert_query_run = mysqli_query($conn, $insert_query);
            // Delete data from equipments table
            $delete_query = "DELETE FROM equipments WHERE visible='$id'";
            $delete_query_run = mysqli_query($conn, $delete_query);

            // Update visible to 0 after inserting into equiparchive
            $update_query = "UPDATE equiparchive SET visible=0 WHERE visible='$id'";
            $stmt = $conn->prepare($update_query);

        // Check if all queries were successful
        if($insert_query_run && $delete_query_run && $stmt->execute())
        {
            mysqli_commit($conn);
            $_SESSION['status'] = 'Equipment Data Archived Successfully';
            $_SESSION['status_code'] = 'success';
            header('location: equipments.php');
        }
        else{
            mysqli_rollback($conn);
            $_SESSION['status'] = 'Equipment Data Not Archived Successfully';
            $_SESSION['status_code'] = 'error';
            header('location: equipments.php');
        }

        // End the transaction
        mysqli_autocommit($conn, true);
}
?>