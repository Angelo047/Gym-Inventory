<?php include ('includes/session.php');?>
<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/menubar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper m-3">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h4 class="m-2 font-weight-bold text-primary">Suppliers&nbsp;<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addsuppliers"><i class="fa fa-plus"></i> New</a></h4>
                        <div class="float-right mb-4">
                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="width:100%" id="example2">
                                    <thead>
                                        <tr>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $conn = new mysqli("localhost", "root", "", "inventory");

                                    if($conn->connect_error){
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    try{
                                        $now = date('Y-m-d');
                                        $stmt = $conn->prepare("SELECT * FROM suppliers");
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        while($row = $result->fetch_assoc()){
                                            echo "
                                                <tr>
                                                    <td>".$row['name']."</td>
                                                    <td>".$row['phone']."</td>
                                                    <td>".$row['address']."</td>
                                                    <td>
                                                        <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                                                        <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                                                    </td>
                                                </tr>
                                            ";
                                        }
                                    }
                                    catch(Exception $e){
                                        echo $e->getMessage();
                                    }

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
            </div>
<?php include 'includes/suppliers_modal.php'; ?>
<?php include 'includes/suppliers_modal2.php'; ?>
<?php
 include('includes/scripts.php');
 include('includes/footer.php');
 ?>

<script>
$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('#addsuppliers').click(function(e){
    e.preventDefault();
    getSupplier();
  });

  $("#addnew").on("hidden.bs.modal", function () {
    $('.append_items').remove();
  });

  $("#edit").on("hidden.bs.modal", function () {
    $('.append_items').remove();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'supplier_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.suppliersid').val(response.suppliersid);
      $('.suppliersname').html(response.suppliersname);
      $('#edit_name').val(response.suppliersname);
      $('#edit_phone').val(response.phone);
      $('#edit_address').val(response.address);
    }
  });
}

</script>
</body>
</html>










