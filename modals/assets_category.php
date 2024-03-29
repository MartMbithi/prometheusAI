<!-- Update Modal -->
<div class="modal fade" id="update_<?php echo $assets_category['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="modal-title">
                    <h6 class="mb-0">Update Assets Categories</h6>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Asset Category Code</label>
                            <input type="hidden" value="<?php echo $assets_category['category_id']; ?>" required name="category_id" class="form-control">
                            <input type="text" value="<?php echo $assets_category['category_code']; ?>" required name="category_code" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Asset Category Name</label>
                            <input type="text" value="<?php echo $assets_category['category_name']; ?>" required name="category_name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Update_Asset_Category" class="btn btn-outline-lime">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->


<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $assets_category['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>
                        Heads Up! <br><br>
                        Are You Sure You Want To Delete This Record?
                    </h4>
                    <input type="hidden" value="<?php echo $assets_category['category_id']; ?>" required name="category_id" class="form-control">
                    <button type="button" class="text-center btn btn-outline-lime" data-bs-dismiss="modal">No</button>
                    <input type="submit" value="Yes, Delete" name="Delete_Asset_Category" class="text-center btn btn-outline-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->