<!-- Add To Assets -->
<div class="modal fade" id="details_<?php echo $wishlist['wishlist_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>
                        Heads Up! <br><br>
                        Add This Wishlist Item To Assets?
                    </h4>
                    <!-- Hide This -->
                    <input type="hidden" value="<?php echo $wishlist['wishlist_item_category_id']; ?>" required name="asset_category_id" class="form-control">
                    <input type="hidden" value="<?php echo $wishlist['wishlist_item_name']; ?>" required name="asset_name" class="form-control">
                    <input type="hidden" value="<?php echo $wishlist['wishlist_item_desc']; ?>" required name="asset_details" class="form-control">
                    <input type="hidden" value="<?php echo $wishlist['wishlist_item_cost']; ?>" required name="asset_cost" class="form-control">
                    <input type="hidden" value="<?php echo date('Y-m-d') ?>" required name="asset_date_purchased" class="form-control">
                    <input type="hidden" value="Operational" required name="asset_status" class="form-control">
                    <button type="button" class="text-center btn btn-outline-lime" data-bs-dismiss="modal">No</button>
                    <input type="submit" value="Yes" name="Add_To_Asset" class="text-center btn btn-outline-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add To Assets -->

<!-- Update Modal -->
<div class="modal fade" id="update_<?php echo $wishlist['wishlist_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="modal-title">
                    <h6 class="mb-0">Update Wishlist Item</h6>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" enctype="multipart/form-data" role="form">

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="">Category Name</label>
                            <select required name="asset_category_id" class="form-control">
                                <option value="<?php echo $assets['category_id']; ?>">
                                    <?php echo $wishlist['category_code'] . '-' . $wishlist['category_name']; ?>
                                </option>
                                <?php
                                $assets_category_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM assets_category
                                    WHERE category_id !='{$wishlist['category_id']}' ORDER BY  category_name ASC"
                                );
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
                        <div class="form-group col-md-6 mb-3">
                            <label for="">Item Name</label>
                            <!-- Hide This -->
                            <input type="hidden" required name="wishlist_id" class="form-control" value="<?php echo $wishlist['wishlist_id']; ?>">
                            <input type="text" required name="wishlist_item_name" class="form-control" value="<?php echo $wishlist['wishlist_item_name']; ?>">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="">QTY</label>
                            <input type="text" required name="wishlist_item_qty" class="form-control" value="<?php echo $wishlist['wishlist_item_qty']; ?>">
                        </div>
                        <div class=" form-group col-md-6 mb-3">
                            <label for="">Item Price</label>
                            <input type="text" required name="wishlist_item_cost" class="form-control" value="<?php echo $wishlist['wishlist_item_cost']; ?>">
                        </div>
                        <div class=" form-group col-md-12 mb-3">
                            <label for="">Item Desc</label>
                            <textarea rows="3" type="text" required name="wishlist_item_desc" class="form-control"><?php echo $wishlist['wishlist_item_desc']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Update_Item_Wishlist" class="btn btn-outline-lime">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $wishlist['wishlist_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>
                        Heads Up! <br><br>
                        Are You Sure You Want To Delete This Record?
                    </h4>
                    <input type="hidden" value="<?php echo $wishlist['wishlist_id']; ?>" required name="wishlist_id" class="form-control">
                    <button type="button" class="text-center btn btn-outline-lime" data-bs-dismiss="modal">No</button>
                    <input type="submit" value="Yes, Delete" name="Delete_Wishlist" class="text-center btn btn-outline-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->