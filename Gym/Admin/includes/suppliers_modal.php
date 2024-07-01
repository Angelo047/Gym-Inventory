<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Add New Supplier</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="supplier_add.php">
                <div class="form-group">
                    <label for="name" class="col-sm-12 control-label mt-3">Supplier Name</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <label for="name" class="col-sm-12 control-label mt-3">Contact</label>

                    <div class="col-sm-12">
                    <input type="tel" id="phone" class="form-control" name="phone" pattern="09\d{9}" maxlength="11" placeholder="09XXXXXXXXX" required>
                    </div>

                    <label for="name" class="col-sm-12 control-label mt-3">Address</label>

                  <div class="col-sm-12">
                    <textarea type="text" class="form-control" id="address" name="address" rows="4" cols="50" required></textarea>
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
