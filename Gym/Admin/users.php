<?php include ('includes/session.php');?>

<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/menubar.php');
?>
    <!-- Main content -->
    <div class="content-wrapper m-3">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h4 class="m-2 font-weight-bold text-primary">Users&nbsp;</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Photo</th>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Date Added</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                            $conn = new mysqli("localhost", "root", "", "inventory");

                                            if($conn->connect_error){
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            try{
                                                $stmt = $conn->prepare("SELECT * FROM users WHERE type=?");
                                                $stmt->bind_param('i', $type);
                                                $type = 0;
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                while($row = $result->fetch_assoc()){
                                                    $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                                                    $status = ($row['status']) ? '<span class="badge badge-success">active</span>' : '<span class="badge badge-danger">not verified</span>';
                                                    $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['id'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                                                    echo "
                                                    <tr>
                                                        <td>
                                                        <img src='".$image."' height='30px' width='30px'>
                                                        </td>
                                                        <td>".$row['email']."</td>
                                                        <td>".$row['fullname']."</td>
                                                        <td>
                                                        ".$status."
                                                        ".$active."
                                                        </td>
                                                        <td>".date('M d, Y', strtotime($row['created_on']))."</td>
                                                    </tr>
                                                    ";
                                                }
                                            }
                                            catch(Exception $e){
                                                echo "There is some problem in connection: " . $e->getMessage();
                                            }

                                            $stmt->close();
                                            $conn->close();
                                            ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            </div>
            </div>

<?php
 include('includes/scripts.php');
 include('includes/footer.php')
 ?>


</body>
</html>