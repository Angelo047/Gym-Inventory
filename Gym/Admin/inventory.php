<?php include ('includes/session.php');?>
<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/menubar.php');
?>

<div class="container-fluid mb-5">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4><b>Inventory</b></h4>
					</div>
					<div class="card-body">
						<table class="table table-bordered" id="example2">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Supply Name</th>
								<th class="text-center">Stock In</th>
								<th class="text-center">Stock Out</th>
								<th class="text-center">Stock Available</th>
							</thead>
							<tbody>
                            <?php
                                $i = 1;
                                $conn = new mysqli("localhost", "root", "", "inventory");

                                if($conn->connect_error){
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $result = $conn->query("SELECT * FROM products order by name asc");

                                while ($row = $result->fetch_assoc()) {
                                    $sup_arr[$row['id']] = $row['name'];
                                    $supply_id = $row['id'];
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

                                    if($available > 10){
                                        $badge_class = 'badge-success';
                                    } elseif($available > 0){
                                        $badge_class = 'badge-danger';
                                    } else {
                                        $badge_class = 'badge-warning';
                                        $available = 'Out of Stock';
                                    }

                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++ ?></td>
                                        <td class=""><?php echo $row['name'] ?></td>
                                        <td class="text-center"><?php echo $inn ?></td>
                                        <td class="text-center"><?php echo $out ?></td>
                                        <td class="text-center">
                                            <span class="badge <?php echo $badge_class ?>"><?php echo $available ?></span>
                                        </td>
                                    </tr>
                                    <?php
                                }

                                $conn->close();
                                ?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>

<?php include 'includes/inventory_modal.php'; ?>
<?php include 'includes/inventory_modal2.php'; ?>
<?php
 include('includes/scripts.php');
 include('includes/footer.php');
 ?>
</body>
</html>