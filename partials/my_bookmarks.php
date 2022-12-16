<?php
$sql = "SELECT * FROM bookmarks bo
INNER JOIN posts p ON p.post_id = bo.bookmark_post_id
INNER JOIN user u ON u.user_id = p.post_user_id 
WHERE bo.bookmark_user_id = '{$user_id}' ORDER BY p.created_at DESC";
$stmt = $mysqli->query($sql);
while ($row = $stmt->fetch_object()) {
    $time = date("d M Y g:i", strtotime($row->created_at));
    if ($row->user_profile_picture != '') {
        $post_user_image_url = "https://wcf.co.ke/storage/user_profile_images/" . $row->user_profile_picture;
    } else {
        $post_user_image_url = "https://wcf.co.ke/storage/user_profile_images/default.png";
    }
    if ($row->post_image == '' && $row->post_clip == '' && $row->post_content != '' && $row->post_type != 'ad') { ?>
        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
            <a href="guest_profile=<?php echo $row->user_id; ?>">
                <div class="card-body p-0 d-flex">
                    <figure class="avatar me-3"><img src="<?php echo $post_user_image_url; ?>" alt="" class="shadow-sm rounded-circle cropped_image"></figure>
                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row->user_full_name; ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Published: <?php echo date("d M Y", strtotime($row->created_at)); ?></span></h4>
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
                    <input type="hidden" name="bookmark_id" value="<?php echo $row->bookmark_id; ?>" />
                    <input type="submit" id="<?php echo $row->bookmark_id; ?>" name="Remove_Bookmark" style="display: none;" />
                    <button type="submit" name="Remove_Bookmark" class="btn-submit ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                        <i class="feather-x-circle text-grey-900 text-dark btn-round-sm font-lg"></i>
                        <span class="d-none-xs">
                            Remove
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <br>
    <?php } elseif ($row->post_image != '' && $row->post_content != '' && $row->post_type != 'ad') { ?>
        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
            <a href="guest_profile=<?php echo $row->user_id; ?>">
                <div class="card-body p-0 d-flex">
                    <figure class="avatar me-3"><img src="<?php echo $post_user_image_url; ?>" alt="image" class="shadow-sm rounded-circle cropped_image"></figure>
                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row->user_full_name; ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Published: <?php echo date("d M Y", strtotime($row->created_at)); ?></span></h4>
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
                    <input type="hidden" name="bookmark_id" value="<?php echo $row->bookmark_id; ?>" />
                    <input type="submit" id="<?php echo $row->bookmark_id; ?>" name="Remove_Bookmark" style="display: none;" />
                    <button type="submit" name="Remove_Bookmark" class="btn-submit ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                        <i class="feather-x-circle text-grey-900 text-dark btn-round-sm font-lg"></i>
                        <span class="d-none-xs">
                            Remove
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <br>

    <?php } else { ?>
        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
            <a href="guest_profile=<?php echo $row->user_id; ?>">
                <div class="card-body p-0 d-flex">
                    <figure class="avatar me-3"><img src="<?php echo $post_user_image_url; ?>" alt="image" class="shadow-sm rounded-circle cropped_image"></figure>
                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row->user_full_name; ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Published: <?php echo date("d M Y", strtotime($row->created_at)); ?></span></h4>
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
                    <input type="hidden" name="bookmark_id" value="<?php echo $row->bookmark_id; ?>" />
                    <button type="submit" name="Remove_Bookmark" class="btn-submit ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">
                        <i class="feather-x-circle text-grey-900 text-dark btn-round-sm font-lg"></i>
                        <span class="d-none-xs">
                            Remove
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <br>
<?php }
} ?>