<?php
    include 'includes/session.php';

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

		$conn = new mysqli("localhost", "root", "", "inventory");

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        try{
            $stmt = $conn->prepare("UPDATE suppliers SET name=?, phone=?, address=? WHERE id=?");
            $stmt->bind_param("sssi", $name, $phone, $address, $id);
            $stmt->execute();
            $_SESSION['status'] = 'Supplier updated successfully';
            $_SESSION['status_code'] = 'success';
        }
        catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
        }

        $conn->close();
    }
    else{
        $_SESSION['status'] = 'Fill up edit supplier form first';
        $_SESSION['status_code'] = 'error';
    }

    header('location: supplier.php');
?>
