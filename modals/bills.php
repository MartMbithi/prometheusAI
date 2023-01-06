<!-- Update Modal -->
<div class="modal fade" id="update_<?php echo $bills['purchase_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="modal-title">
                    <h6 class="mb-0">Update Bill</h6>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-8 mb-3">
                            <label for="">Bill Name</label>
                            <input type="hidden" value="<?php echo $bills['purchase_id']; ?>" required name="purchase_id" class="form-control">
                            <input type="text" value="<?php echo $bills['purchase_item']; ?>" required name="purchase_item" class="form-control">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="">Quantity</label>
                            <input type="number" required name="purchase_quantity" value="<?php echo $bills['purchase_quantity']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="">Bill Amount</label>
                            <input type="text" required name="purchase_amount" value="<?php echo $bills['purchase_amount']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="">Date Posted</label>
                            <input type="date" required name="purchase_date_made" value="<?php echo $bills['purchase_date_made']; ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Update_Bill" class="btn btn-outline-lime">Update Bill</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $bills['purchase_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>
                        Heads Up! <br><br>
                        Are You Sure You Want To Delete This Record?
                    </h4>
                    <input type="hidden" value="<?php echo $bills['purchase_id']; ?>" required name="purchase_id" class="form-control">
                    <button type="button" class="text-center btn btn-outline-lime" data-bs-dismiss="modal">No</button>
                    <input type="submit" value="Yes, Delete" name="Delete_Bill" class="text-center btn btn-outline-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->