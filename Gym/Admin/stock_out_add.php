<?php
    ob_start();

    include 'includes/session.php';

    if(isset($_POST['add'])){
        $supply = $_POST['supply'];
        $customers = $_POST['customers'];
        $quantity = $_POST['quantity'];
        $stock_type = $_POST['stock_type'];
        $pro_price = isset($_POST['pro_price']) ? $_POST['pro_price'] : array();
        $date = $_POST['date'];

        try {
            $conn = mysqli_connect("localhost", "root", "", "inventory");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Loop through the supplies
            for($i = 0; $i < count($supply); $i++) {
                $supply_id = $supply[$i];

                $inn_stmt = $conn->prepare("SELECT sum(qty) as inn FROM inventory where stock_type = 1 and supply_id = ?");
                $inn_stmt->bind_param('i', $supply_id);
                $inn_stmt->execute();
                $inn_result = $inn_stmt->get_result();
                $inn = $inn_result->fetch_assoc()['inn'] ?? 0;

                $out_stmt = $conn->prepare("SELECT sum(qty) as `out` FROM inventory where stock_type = 2 and supply_id = ?");
                $out_stmt->bind_param('i', $supply_id);
                $out_stmt->execute();
                $out_result = $out_stmt->get_result();
                $out = $out_result->fetch_assoc()['out'] ?? 0;

                $available = $inn - $out;

                if($quantity[$i] > $available){
                    $_SESSION['status'] = 'Out of Available Stock';
                    $_SESSION['status_code'] = 'warning';
                    mysqli_close($conn);
                    header('location: stock_out.php');
                    exit();
                }

                try{
                    $stmt = $conn->prepare("INSERT INTO inventory (supply_id, customer_id, qty, stock_type, amount, date_created) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param('iiidss', $supply_id, $customers, $quantity[$i], $stock_type, $pro_price[$i], $date);
                    $stmt->execute();
                    $_SESSION['status'] = 'Supply Stock Out successfully';
                    $_SESSION['status_code'] = 'success';
                }
                catch(mysqli_sql_exception $e){
                    $_SESSION['error'] = $e->getMessage();
                }
            }

            mysqli_close($conn);
            header('location: stock_out.php');
            exit();
        }
        catch (mysqli_sql_exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('location: stock_out.php');
            exit();
        }
    }
    else{
        $_SESSION['error'] = 'Fill up Manage Stock Out Supply form first';
        header('location: stock_out.php');
        exit();
    }

    ob_end_flush(); // Flush buffered output
?>
