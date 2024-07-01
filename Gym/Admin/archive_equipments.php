<?php include ('includes/session.php');?>
<?php
  $where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
  }

?>
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
                        <h4 class="m-2 font-weight-bold text-primary">Archived Equipments&nbsp;
                        <form method="POST" action="">
                    <button type="submit" class="btn btn-success btn-sm btn-flat float-left mt-4 ml-3 mb-4" name="unarchive_multiple_data" onclick="return confirmArchive();">
                      <i class='fa fa-recycle'></i> Unarchive Equipments
                    </button>
                  </form></h4><br>
                        <div class="float-right mb-4">
                        <form class="form-inline">
                        <div class="form-group">
                            <label>Category :  </label>
                            <select class="form-control input-sm" id="select_category">
                                <option value="0">ALL</option>
                                <?php
                                $conn = new mysqli("localhost", "root", "", "inventory");

                                $query = "SELECT * FROM category";
                                $result = mysqli_query($conn, $query);

                                while($crow = mysqli_fetch_assoc($result)){
                                    $selected = ($crow['id'] == $catid) ? 'selected' : '';
                                    echo "
                                        <option value='".$crow['id']."' ".$selected.">".$crow['name']."</option>
                                    ";
                                }

                                mysqli_close($conn);
                                ?>
                            </select>
                        </div>
                    </form>
                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="width:100%" id="example1">
                                    <thead>
                                        <tr>
                                        <td></td>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Tools</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                          $conn = new mysqli("localhost", "root", "", "inventory");

                                          if ($conn->connect_error) {
                                              die("Connection failed: " . $conn->connect_error);
                                          }

                                          try {
                                              $now = date('Y-m-d');
                                              $query = "SELECT * FROM equiparchive $where";
                                              $result = $conn->query($query);

                                              if ($result) {
                                                  while ($row = $result->fetch_assoc()) {
                                                      $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/noimage.jpg';

                                                      echo "
                                                          <tr>
                                                              <td class='text-center'>
                                                              <input type='checkbox' class='checkbox' onclick='toggleCheckbox(this)' value='" . $row['id'] . "' " . ($row['visible'] == 1 ? 'checked' : "") . ">
                                                              </td>
                                                              <td>" . $row['name'] . "</td>
                                                              <td>
                                                                  <img src='" . $image . "' height='30px' width='30px'>
                                                                  <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i></a></span>
                                                              </td>
                                                              <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' data-id='" . $row['id'] . "'><i class='fa fa-search'></i> View</a></td>
                                                              <td class='text-center'>" . $row['quantity'] . "</td>
                                                              <td>
                                                                  <button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                                                              </td>
                                                          </tr>
                                                      ";
                                                  }
                                              }
                                          } catch (Exception $e) {
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

<?php include 'includes/archive_equipments_modal.php'; ?>
<?php include 'includes/archive_equipments_modal2.php'; ?>
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

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.desc', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });


  $('#select_category').change(function(){
    var val = $(this).val();
    if(val == 0){
      window.location = 'archive_equipments.php';
    }
    else{
      window.location = 'archive_equipments.php?category='+val;
    }
  });

  $('#addarchequipments').click(function(e){
    e.preventDefault();
    getCategory();
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
    url: 'archive_equipment_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#desc').html(response.description);
      $('.name').html(response.equiparchivename);
      $('.archequipid').val(response.equiparchiveid);
      $('#catselected').val(response.category_id).html(response.catname);
      $('#edit_name').val(response.equiparchivename);
      $('#edit_quantity').val(response.quantity);
      $('#edit_price').val(response.price);
      CKEDITOR.instances["editor2"].setData(response.description);
      getCategory();
    }
  });
}
function getCategory(){
  $.ajax({
    type: 'POST',
    url: 'category_fetch.php',
    dataType: 'json',
    success:function(response){
      // clear previously appended items
      $('#category').empty();

      // append new items
      $('#category').append(response);
      $('#edit_category').append(response);
    }
  });
}

function toggleCheckbox(box) {
  var id = $(box).attr("value");
  if ($(box).prop("checked") == true) {
    var visible = 1;
  } else {
    var visible = 0;
  }
  var data = {
    "search_data": 1,
    "id": id,
    "visible": visible
  };
  $.ajax({
    type: "post",
    url: "archive_equipment_res.php",
    data: data,
    success: function (response) {
      // handle success here
    }
  });
}

function confirmArchive() {
  var checkboxes = document.getElementsByClassName("checkbox");
  var checked = false;
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      checked = true;
      break;
    }
  }
  if (!checked) {
    swal({
      title: "Please select at least one equipment to unarchive.",
      icon: "warning",
      confirmButtonText: 'OK',
      dangerMode: false,
      backdrop: false,
      closeOnClickOutside: false,
    });
    return false;
  } else {
    swal({
      title: "Are you sure you want to unarchive these equipments?",
      icon: "warning",
      buttons: ["Cancel", "Yes, unarchive it"],
      dangerMode: false,
      backdrop: false,
      closeOnClickOutside: false,
    }).then((willArchive) => {
      if (willArchive) {
        var archiveData = [];
        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].checked) {
            var id = checkboxes[i].value;
            archiveData.push(id);
          }
        }
        $.ajax({
          type: "post",
          url: "archive_equipment_res.php",
          data: { unarchive_multiple_data: 1, ids: archiveData },
          success: function (response) {
            if (response == 'success') {
              swal({
                title: "Equipment Unarchive Failed",
                icon: "error",
                confirmButtonText: 'OK',
                dangerMode: true,
                backdrop: false,
                closeOnClickOutside: false,
              }).then((willReload) => {
                if (willReload) {
                  location.reload();
                }
              });
            } else {
              swal({
                title: "Equipment Unarchive Successfully",
                icon: "success",
                confirmButtonText: 'OK',
                dangerMode: false,
                backdrop: false,
                closeOnClickOutside: false,
              }).then((willReload) => {
                if (willReload) {
                  location.reload();
                }
              });
            }
          }
        });
      } else {
        // User clicked Cancel, uncheck all checkboxes
        for (var i = 0; i < checkboxes.length; i++) {
          checkboxes[i].checked = false;
        }
      }
    });
    return false;
  }
}

</script>
</body>
</html>










