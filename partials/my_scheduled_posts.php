<?php
$sql = "SELECT * FROM posts p INNER JOIN user u ON u.user_id = p.post_user_id 
WHERE p.post_user_id = '{$user_id}'
ORDER BY p.created_at DESC";
$stmt = $mysqli->query($sql);
while ($row = $stmt->fetch_object()) {
    $time = date("d M Y g:i", strtotime($row->created_at));
    $post_available_from = strtotime($row->post_available_from);

    if ($row->user_profile_picture != '') {
        $post_user_image_url = "https://wcf.co.ke/storage/user_profile_images/" . $row->user_profile_picture;
    } else {
        $post_user_image_url = "https://wcf.co.ke/storage/user_profile_images/default.png";
    }
    if ($current_date < $post_available_from) {
        /* Show Only Posts That Are Sceduled */
        if ($row->post_image == '' && $row->post_clip == '' && $row->post_content != '' && $row->post_type != 'ad') { ?>
            <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
                <a href="guest_profile?view=<?php echo $row->user_id; ?>">
                    <div class="card-body p-0 d-flex">
                        <figure class="avatar me-3"><img src="<?php echo $post_user_image_url; ?>" alt="" class="shadow-sm rounded-circle cropped_image"></figure>
                        <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row->user_full_name; ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Available from: <?php echo date("d M Y", strtotime($row->post_available_from)); ?></span></h4>
                    </div>
                </a>
                <a href="post?view=<?php echo $row->post_id; ?>">
                    <div class="card-body p-0 me-lg-5">
                        <p class="fw-500 text-grey-900 lh-26 font-xssss w-100 mb-2" align="justify">
                            <?php echo strip_tags($row->post_content); ?>
                        </p>
                    </div>
                </a>
                <form method="POST">
                    <div class="card-body d-flex p-0">
                        <a href="edit_post?view=<?php echo $row->post_id; ?>" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                            <i class="feather-edit text-dark text-grey-900 btn-round-sm font-lg"></i>
                            <span class="d-none-xss">
                                Edit
                            </span>
                        </a>
                        <form method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $row->post_id; ?>" />
                            <button name="Delete_Post" class="btn-submit ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                                <i class="feather-trash text-grey-900 text-dark btn-round-sm font-lg"></i>
                                <span class="d-none-xs">
                                    Delete
                                </span>
                            </button>
                        </form>
                    </div>
                </form>
            </div>
            <br>
        <?php } elseif ($row->post_image != '' && $row->post_content != '' && $row->post_type != 'ad') { ?>
            <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
                <a href="guest_profile?view=<?php echo $row->user_id; ?>">
                    <div class="card-body p-0 d-flex">
                        <figure class="avatar me-3"><img src="<?php echo $post_user_image_url; ?>" alt="image" class="shadow-sm rounded-circle cropped_image"></figure>
                        <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row->user_full_name; ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Available from: <?php echo date("d M Y", strtotime($row->post_available_from)); ?></span></h4>
                    </div>
                </a>
                <a href="post?view=<?php echo $row->post_id; ?>">
                    <div class="card-body p-0 me-lg-5">
                        <p class="fw-500 text-grey-900 lh-26 font-xssss w-100 mb-2" align="justify">
                            <?php echo strip_tags($row->post_content); ?>
                        </p>
                    </div>
                    <div class="card-body d-block p-0 mb-3">
                        <div class="row ps-2 pe-2">
                            <div class="col-sm-12 p-1">
                                <img src="https://wcf.co.ke/storage/post_images/<?php echo $row->post_image; ?>" class="rounded-3 w-100" alt="">
                            </div>
                        </div>
                    </div>
                </a>
                <form method="POST">
                    <div class="card-body d-flex p-0">
                        <a href="edit_post?view=<?php echo $row->post_id; ?>" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                            <i class="feather-edit text-dark text-grey-900 btn-round-sm font-lg"></i>
                            <span class="d-none-xss">
                                Edit
                            </span>
                        </a>
                        <input type="hidden" name="post_id" value="<?php echo $row->post_id; ?>" />
                        <form method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $row->post_id; ?>" />
                            <button name="Delete_Post" class="btn-submit ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                                <i class="feather-trash text-grey-900 text-dark btn-round-sm font-lg"></i>
                                <span class="d-none-xs">
                                    Delete
                                </span>
                            </button>
                        </form>
                    </div>
                </form>
            </div>
            <br>

        <?php } else { ?>
            <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                <a href="guest_profile?view=<?php echo $row->user_id; ?>">
                    <div class="card-body p-0 d-flex">
                        <figure class="avatar me-3"><img src="<?php echo $post_user_image_url; ?>" alt="image" class="shadow-sm rounded-circle cropped_image"></figure>
                        <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row->user_full_name; ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Available from: <?php echo date("d M Y", strtotime($row->post_available_from)); ?></span></h4>
                    </div>
                </a>

                <a href="post?view=<?php echo $row->post_id; ?>">
                    <div class="card-body p-0 mb-3 rounded-3 overflow-hidden">
                        <a href="post?view=<?php echo $row->post_id; ?>" class="video-btn">
                            <video autoplay loop class="float-right w-100">
                                <source src="https://wcf.co.ke/storage/post_clips/<?php echo $row->post_clip; ?>" type="video/mp4">
                            </video>
                        </a>
                    </div>
                    <div class="card-body p-0 me-lg-5">
                        <p class="fw-500 text-grey-900 lh-26 font-xssss w-100 mb-2" align="justify">
                            <?php echo strip_tags($row->post_content); ?>
                        </p>
                    </div>
                </a>
                <form method="POST">
                    <div class="card-body d-flex p-0">
                        <a href="edit_post?view=<?php echo $row->post_id; ?>" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                            <i class="feather-edit text-dark text-grey-900 btn-round-sm font-lg"></i>
                            <span class="d-none-xss">
                                Edit
                            </span>
                        </a>
                        <input type="hidden" name="post_id" value="<?php echo $row->post_id; ?>" />
                        <form method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $row->post_id; ?>" />
                            <button name="Delete_Post" class="btn-submit ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                                <i class="feather-trash text-grey-900 text-dark btn-round-sm font-lg"></i>
                                <span class="d-none-xs">
                                    Delete
                                </span>
                            </button>
                        </form>
                    </div>
                </form>
            </div>
            <br>
<?php }
    }
} ?>