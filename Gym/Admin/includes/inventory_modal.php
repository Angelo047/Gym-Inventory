<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Manage Stock In Supply</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="stock_in_add.php">

              <input type="number" class="form-control" value="1" id="stock_type" name="stock_type" hidden>

              <label for="date" class="col-sm-12 control-label mt-3">Stock In Date</label>
                <div class="col-sm-12">
                <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <label for="suppliers" class="col-sm-12 control-label mt-3">Supplier</label>

                    <div class="col-sm-12">
                    <select class="form-control" id="suppliers" name="suppliers" required>
                      <option value="" selected>- Select -</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="supply" class="col-sm-12 control-label mt-3">Product Supply</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="supply" name="supply[]" required>
                            <option value="" selected>- Select -</option>
                        </select>
                    </div>

                    <label for="amount" class="col-sm-12 control-label mt-3">Buying Price</label>

                    <div class="col-sm-12">
                    <input type="number" class="form-control" id="amount" name="amount[]">
                    </div>

                    <label for="quantity" class="col-sm-12 control-label mt-3">Stock In Quantity</label>
                    <div class="col-sm-12">
                    <input type="number" min="1" class="form-control" id="quantity" name="quantity[]" required>
                    </div>

                    <label for="total_stock" class="col-sm-12 control-label mt-3">Available Stocks</label>

                    <div class="col-sm-12">
                    <input type="number" class="form-control" id="total_stock" name="total_stock" disabled>
                    </div>

                    <span id="append-div"></span>
                    <div class="form-group mt-3">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button class="btn btn-primary btn-xs btn-flat" id="append"><i class="fa fa-plus"></i> Stock In Field</button>
                    </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>
