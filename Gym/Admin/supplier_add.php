<?php
    include 'includes/session.php';

    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

		$conn = new mysqli("localhost", "root", "", "inventory");

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM suppliers WHERE name=?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if($row['numrows'] > 0){
            $_SESSION['status'] = 'Supplier already exists';
            $_SESSION['status_code'] = 'error';
        }
        else{
            try{
                $stmt = $conn->prepare("INSERT INTO suppliers (name, phone, address) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $phone, $address);
                $stmt->execute();
                $_SESSION['status'] = 'Supplier added successfully';
                $_SESSION['status_code'] = 'success';

            }
            catch(Exception $e){
                $_SESSION['error'] = $e->getMessage();
            }
        }

        $conn->close();
    }
    else{
        $_SESSION['status'] = 'Fill up supplier form first';
        $_SESSION['status_code'] = 'warning';
    }

    header('location: supplier.php');
?>
