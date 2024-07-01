<?php include ('includes/session.php');?>
<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/menubar.php');
?>

<div class="container-fluid mb-5">

          <?php
          $conn = new mysqli("localhost", "root", "", "inventory");
          $prod_arr = array();
          $stmt = $conn->query("SELECT * FROM products ORDER BY id ASC");
          while ($row = $stmt->fetch_assoc()){
              $prod_arr[$row['id']] = $row['name'];
          }

          $prodarchive_arr = array();
          $stmt = $conn->query("SELECT * FROM prodarchive ORDER BY id ASC");
          while ($row = $stmt->fetch_assoc()){
              $prodarchive_arr[$row['id']] = $row['name'];
          }


          $stmt = $conn->query("SELECT * FROM suppliers ORDER BY name ASC");
          $supp_arr = array();
          while ($row = $stmt->fetch_assoc()){
              $supp_arr[$row['id']] = $row['name'];
          }
          ?>

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
                    <h4><b>Stock In</b>&nbsp;<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="managesupplyin"><i class="fa fa-plus"></i> Incoming Supply</a></h4>

					</div>
					<div class="card-body">
						<table class="table table-bordered" id="example2">
							<thead>
								<th class="text-center">Date</th>
								<th class="text-center">Supply Name</th>
								<th class="text-center">Qty</th>
                <th class="text-center">Buying Price</th>
                <th class="text-center">Total Amount</th>
                <th class="text-center">Supplier</th>
								<th class="text-center">Tools</th>
							</thead>
							<tbody>
							<?php
              $i = 1;
              $inventory = $conn->query("SELECT * FROM inventory WHERE stock_type = 1 ORDER BY date_created DESC");
              while ($row = $inventory->fetch_assoc()) :
              ?>
                  <tr>
                      <td class="text-center"><?php echo date("m-d-Y", strtotime($row['date_created'])) ?></td>
                      <td class="text-center">
                        <?php
                        if (array_key_exists($row['supply_id'], $prod_arr)) {
                            echo $prod_arr[$row['supply_id']];
                        } elseif (array_key_exists($row['supply_id'], $prodarchive_arr)) {
                            echo $prodarchive_arr[$row['supply_id']];
                        }
                        ?>
                    </td>
                      <td class="text-center"><?php echo $row['qty'] ?></td>
                      <td class="text-center"><?php echo '₱' . number_format($row['amount'], 2) ?></td>
                      <td class="text-center"><?php echo '₱' . number_format ($row['qty'] * $row['amount'], 2) ?></td>
                      <td class="text-center"><?php echo $supp_arr[$row['suppliers_id']] ?></td>
                      <td class="text-center">
                          <button type="button" class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
                          <button type="button" class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
                      </td>
                  </tr>
              <?php endwhile; ?>

              <?php
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

<script>

function getRow(id){
$.ajax({
  type: 'POST',
  url: 'inventory_row.php',
  data: {id:id},
  dataType: 'json',
  success: function(response){
    $('.inventid').val(response.inventid);
    $('.name').html(response.prodname);
    $('#supplierselected').val(response.suppliers_id).html(response.suppname);
    $('#suppselected').val(response.supply_id).html(response.prodname);
    $('#edit_amount').val(response.amount);
    $('#edit_quantity').val(response.qty);
    $('#edit_stock_type').val(response.stock_type);
    $('#edit_date').val(response.date_created);

    getSuppliers(response.suppliers_id);
    getProducts(response.supply_id);
  }
});
}
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

$(document).on('click', '.desc', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

$('#managesupplyin').click(function(e){
  e.preventDefault();
  getProducts();
  getSuppliers();
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
  url: 'inventory_row.php',
  data: {id:id},
  dataType: 'json',
  success: function(response){
    $('.inventid').val(response.inventid);
    $('.name').html(response.prodname);
    $('#supplierselected').val(response.suppliers_id).html(response.suppname);
    $('#suppselected').val(response.supply_id).html(response.prodname);
    $('#edit_amount').val(response.amount);
    $('#edit_quantity').val(response.qty);
    $('#edit_stock_type').val(response.stock_type);
    $('#edit_date').val(response.date_created);

    getSuppliers(response.suppliers_id);
    getProducts(response.supply_id);
  }
});
}


function getProducts(supplyId){
  $.ajax({
    type: 'POST',
    url: 'inventory_fetch.php',
    data: {supplyId: supplyId},
    dataType: 'json',
    success:function(response){

      $('#supply').append(response);
        $('#edit_supply').append(response);
      }
  });
}


function getSuppliers(suppiersId){
$.ajax({
  type: 'POST',
  url: 'suppliers_fetch.php',
  data: {suppiersId: suppiersId},
  dataType: 'json',
  success:function(response){
    $('#suppliers').append(response);
    $('#edit_suppliers').append(response);
  }
});
}

$(document).ready(function() {
    $('#supply').on('change', function() {
        var supply_id = $(this).val();
        $.ajax({
            url: 'get_total_stock.php',
            type: 'POST',
            data: {supply_id: supply_id},
            dataType: 'json',
            success: function(response) {
                $('#total_stock').val(response.total_stock);
            },
            error: function(xhr, status, error) {
                console.error('Ajax request error:', error);
            }
        });
    });
});

$(document).ready(function() {
    $('#quantity').on('input', function() {
        var quantity = $(this).val();
        var old_quantity = $(this).data('old-quantity') || 0;
        var total_stock = parseInt($('#total_stock').val()) || 0;
        var updated_total_stock = total_stock - old_quantity;

        if (quantity !== '') {
            updated_total_stock += parseInt(quantity);
        }
        $('#total_stock').val(updated_total_stock);

        $(this).data('old-quantity', parseInt(quantity));
    });
});


$(function(){
  $(document).on('click', '#append', function(e){
    e.preventDefault();
    $('#append-div').append(
      '<div class="form-group text-center mt-4"><label for="" class="col-sm-12 control-label">--Stock In Another Supply--</label><div class="col-sm-12"></div></div>'
    );
    $('#append-div').append(
      '<div class="form-group mt-3"><label for="" class="col-sm-12 control-label">Product Supply</label><div class="col-sm-12"><select class="form-control supply" id="supply" name="supply[]" required><option value="" selected>- Select -</option></select></div></div>'
    );
    $('#append-div').append(
      '<div class="form-group mt-3"><label for="" class="col-sm-12 control-label">Buying Price</label><div class="col-sm-12"><input type="number" class="form-control" id="amount" name="amount[]"></div></div>'
    );
    $('#append-div').append(
      '<div class="form-group mt-3"><label for="" class="col-sm-12 control-label">Stock In Quantity</label><div class="col-sm-12"><input type="number" min="1" class="form-control" id="quantity" name="quantity[]" required></div></div>'
    );
    $('#append-div').append(
      '<div class="form-group mt-3"><label for="" class="col-sm-12 control-label">Available Stocks</label><div class="col-sm-12"><input type="number" class="form-control" id="total_stock" name="total_stock" disabled></div></div>'
    );
  });

$(document).on('focus', '.supply', function() {
  var dropdown = $(this);
  $.ajax({
    url: 'inventory_fetch2.php',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      dropdown.empty(); // Clear existing options before appending new options
      $.each(response, function(index, option) {
        dropdown.append('<option value="' + option.id + '">' + option.name + '</option>');
      });
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
});


$(document).on('change', '.supply', function() {
  var selectedSupplyId = $(this).val();
  var availableStockInput = $(this).closest('.form-group').next().next().next().find('#total_stock');
  var productPriceInput = $(this).closest('.form-group').next().next().next().next().next().find('#total_amount');

  $.ajax({
    url: 'get_total_stock.php',
    type: 'POST',
    dataType: 'json',
    data: {supply_id: selectedSupplyId},
    success: function(response) {
      availableStockInput.val(response.total_stock);
      productPriceInput.val(response.total_stock * response.product_price);
      availableStockInput.data('original-value', response.total_stock);
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
});

$(document).on('input', '#quantity', function() {
  var stockInQuantity = $(this).val();
  var availableStockInput = $(this).closest('.form-group').next().find('#total_stock');
  var buyingPriceInput = $(this).closest('.form-group').prev().find('#amount');
  var productPriceInput = $(this).closest('.form-group').next().next().next().find('#total_amount');

  var buyingPrice = buyingPriceInput.val();
  var availableStock = availableStockInput.val();

  productPriceInput.val(buyingPrice * stockInQuantity);

  if (stockInQuantity === '') {
    availableStockInput.val(availableStockInput.data('original-value'));
  } else {
    availableStockInput.val(parseInt(availableStockInput.data('original-value')) + parseInt(stockInQuantity));
  }
});
});
</script>
</body>
</html>