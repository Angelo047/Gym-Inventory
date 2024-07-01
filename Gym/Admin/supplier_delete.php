<?php
    include 'includes/session.php';

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        $conn = new mysqli("localhost", "root", "", "inventory");
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM inventory WHERE suppliers_id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if($result['numrows'] > 0){
            $_SESSION['status'] = "Can't delete supplier, it has associated Stock out records";
            $_SESSION['status_code'] = 'error';
        }
        else{
            try{
                $stmt = $conn->prepare("DELETE FROM suppliers WHERE id=?");
                $stmt->bind_param("i", $id);
                $stmt->execute();

                $_SESSION['status'] = 'Supplier deleted successfully';
                $_SESSION['status_code'] = 'success';
            }
            catch(mysqli_sql_exception $e){
                $_SESSION['error'] = $e->getMessage();
            }
        }

        $conn->close();
    }
    else{
        $_SESSION['status'] = 'Select supplier to delete first';
        $_SESSION['status_code'] = 'error';
    }

    header('location: supplier.php');
?>
