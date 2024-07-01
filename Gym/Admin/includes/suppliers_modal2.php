
<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Edit Supplier</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-group" method="POST" action="supplier_edit.php">
                <input type="hidden" class="suppliersid" name="id">
                <div class="form-group">
                    <label for="name" class="col-sm-12 control-label mt-3">Supplier Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>

                    <label for="name" class="col-sm-12 control-label mt-3">Contact</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_phone" name="phone" required>
                    </div>

                    <label for="name" class="col-sm-12 control-label mt-3">Address</label>

                  <div class="col-sm-12">
                    <textarea class="form-control" id="edit_address" name="address" rows="4" cols="50" required></textarea>
                  </div>
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
              <form class="form-horizontal" method="POST" action="supplier_delete.php">
                <input type="hidden" class="suppliersid" name="id">
                <div class="text-center">
                    <p>DELETE SUPPLIERS</p>
                    <h2 class="bold suppliersname"></h2>
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

