<?php
    include 'includes/session.php';

    if(isset($_POST['upload'])){
        $id = $_POST['id'];
        $filename = $_FILES['photo']['name'];

		$conn = new mysqli("localhost", "root", "", "inventory");
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM prodarchive WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if(!empty($filename)){
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $new_filename = $row['slug'].'_'.time().'.'.$ext;
            move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);
        }

        try{
            $stmt = $conn->prepare("UPDATE prodarchive SET photo=? WHERE id=?");
            $stmt->bind_param('si', $new_filename, $id);
            $stmt->execute();

            $_SESSION['status'] = 'Product photo updated successfully';
            $_SESSION['status_code'] = 'success';
        }
        catch(mysqli_sql_exception $e){
            $_SESSION['error'] = $e->getMessage();
        }

        $conn->close();
    }
    else{
        $_SESSION['status'] = 'Select product to update photo first';
            $_SESSION['status_code'] = 'error';
    }

    header('location: archive_products.php');
?>
