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
              <form class="form-horizontal" method="POST" action="equipments_delete.php">
                <input type="hidden" class="equipid" name="id">
                <div class="text-center">
                    <p>DELETE EQUIPMENTS</p>
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

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Edit Equipments</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-group" method="POST" action="equipments_edit.php">
                <input type="hidden" class="equipid" name="id">
                <div class="form-group row">
                  <label for="edit_name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="form-control" id="edit_name" name="name">
                  </div>

                  <label for="edit_category" class="col-sm-1 control-label">Category</label>

                  <div class="col-sm-5">
                    <select class="form-control" id="edit_category" name="category">
                      <option selected id="catselected"></option>
                    </select>
                  </div>
                  </div>
                  <div class="form-group row">
                  <label for="edit_quantity" class="col-sm-1 control-label">Quantity</label>

                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="form-control" id="edit_quantity" name="quantity">
                  </div>
                  </div>


                <div class="form-group">
                  <div class="col-sm-12">

                <p><b>Description</b></p>
                    <textarea id="editor2" name="description" rows="10" cols="85"></textarea>
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

