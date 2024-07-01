<?php
    include 'includes/session.php';
    include 'includes/slugify.php';

    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $slug = slugify($name);
        $category = $_POST['category'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $filename = $_FILES['photo']['name'];

		$conn = new mysqli("localhost", "root", "", "inventory");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM equipments WHERE slug=?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if($row['numrows'] > 0){
            $_SESSION['status'] = 'Equipment already exists';
            $_SESSION['status_code'] = 'error';
        }
        else{
            if(!empty($filename)){
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $new_filename = $slug.'.'.$ext;
                move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);
            }
            else{
                $new_filename = '';
            }

            $stmt = $conn->prepare("INSERT INTO equipments (category_id, name, description, slug, photo, quantity) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssi", $category, $name, $description, $slug, $new_filename, $quantity);
            if($stmt->execute()){
                $_SESSION['status'] = 'Equipment added successfully';
                $_SESSION['status_code'] = 'success';
            }
            else{
                $_SESSION['error'] = $stmt->error;
            }
        }

        $conn->close();
    }
    else{
        $_SESSION['status'] = 'Fill up the equipment form first';
        $_SESSION['status_code'] = 'warning';
    }

    header('location: equipments.php');
?>
