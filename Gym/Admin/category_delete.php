<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $conn = new mysqli("localhost", "root", "", "inventory");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    try{
        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result) {
			$_SESSION['status'] = 'Cannot delete the category. There are products associated with it.';
            $_SESSION['status_code'] = 'error';
        } else {
            $stmt = $conn->prepare("DELETE FROM category WHERE id=?");
            $stmt->bind_param('i', $id);
            $stmt->execute();

            $_SESSION['status'] = 'Category deleted successfully';
            $_SESSION['status_code'] = 'success';
        }
    }
    catch(mysqli_sql_exception $e){
        $_SESSION['error'] = $e->getMessage();
    }

    $stmt->close();
    $conn->close();
}
else{
    $_SESSION['status'] = 'Select category to delete first';
    $_SESSION['status_code'] = 'error';
}

header('location: category.php');
?>
