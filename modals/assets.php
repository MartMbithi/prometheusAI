<!-- Details Modal -->
<div class="modal fade" id="details_<?php echo $assets['asset_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="modal-title">
                    <h6 class="mb-0"><?php echo $assets['asset_name']; ?> Details</h6>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><?php echo $assets['asset_details']; ?></p>
            </div>
        </div>
    </div>
</div>
<!-- Details Modal -->

<!-- Update Modal -->
<div class="modal fade" id="update_<?php echo $assets['asset_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="modal-title">
                    <h6 class="mb-0">Update Asset</h6>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4 mb-3">
                            <label for="">Asset Category Name</label>
                            <select required name="asset_category_id" class="form-control">
                                <option>Select Asset Category</option>
                                <?php
                                $assets_category_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM assets_category ORDER BY  category_name ASC"
                                );
                                $cnt = 1;
                                if (mysqli_num_rows($assets_category_sql) > 0) {
                                    while ($assets_category = mysqli_fetch_array($assets_category_sql)) {
                                ?>
                                        <option value="<?php echo $assets_category['category_id']; ?>">
                                            <?php echo $assets_category['category_code'] . '-' . $assets_category['category_name']; ?>
                                        </option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="">Asset Name</label>
                            <input type="text" required name="asset_name" class="form-control">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="">Asset Price</label>
                            <input type="text" required name="asset_cost" class="form-control">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="">Asset Date Purchased</label>
                            <input type="date" required name="asset_date_purchased" class="form-control">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="">Asset Status</label>
                            <select type="text" required name="asset_status" class="form-control">
                                <option>Operational</option>
                                <option>Faulty</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="">Asset Details</label>
                            <textarea rows="3" type="text" required name="asset_details" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Update_Asset" class="btn btn-outline-lime">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $assets['asset_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>
                        Heads Up! <br><br>
                        Are You Sure You Want To Delete This Record?
                    </h4>
                    <input type="hidden" value="<?php echo $assets['asset_id']; ?>" required name="asset_id" class="form-control">
                    <button type="button" class="text-center btn btn-outline-lime" data-bs-dismiss="modal">No</button>
                    <input type="submit" value="Yes, Delete" name="Delete_Asset" class="text-center btn btn-outline-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->