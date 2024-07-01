<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Edit Stock In Supply</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="stock_in_edit.php">
                <input type="hidden" class="inventid" name="id">
                <div class="form-group">

                <label for="edit_date" class="col-sm-12 control-label mt-3">Entry Date</label>

                <div class="col-sm-12">
                <input type="date" class="form-control" id="edit_date" name="date">
                </div>

                <label for="edit_supply" class="col-sm-12 control-label mt-3">Product Supply</label>

                    <div class="col-sm-12">
                    <select class="form-control" id="edit_supply" name="supply">
                        <option selected id="suppselected"></option>
                    </select>
                    </div>
                    <label for="edit_suppliers" class="col-sm-12 control-label mt-3">Supply Name</label>

                    <div class="col-sm-12">
                    <select class="form-control" id="edit_suppliers" name="suppliers">
                        <option selected id="supplierselected"></option>
                    </select>
                    </div>

                    <label for="edit_amount" class="col-sm-12 control-label mt-3">Buying Price</label>

                    <div class="col-sm-12">
                    <input type="number" class="form-control" id="edit_amount" name="amount">
                    </div>

                    <label for="edit_quantity" class="col-sm-12 control-label mt-3">Quantity</label>

                    <div class="col-sm-12">
                    <input type="number" class="form-control" id="edit_quantity" name="quantity">
                    </div>
                    </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Deleting...</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="stock_in_delete.php">
                <input type="hidden" class="inventid" name="id">
                <div class="text-center">
                    <p>DELETE SUPPLY</p>
                    <h2 class="bold name"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>