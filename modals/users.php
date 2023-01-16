<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $users['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>
                        Heads Up! <br><br>
                        Are You Sure You Want To Delete This Record?
                    </h4>
                    <input type="hidden" value="<?php echo $users['user_id']; ?>" required name="user_id" class="form-control">
                    <button type="button" class="text-center btn btn-outline-lime" data-bs-dismiss="modal">No</button>
                    <input type="submit" value="Yes, Delete" name="Delete_User" class="text-center btn btn-outline-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->