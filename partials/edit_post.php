<?php
$post_id = mysqli_real_escape_string($mysqli, $_GET['view']);
$sql = "SELECT * FROM posts p INNER JOIN user u ON u.user_id = p.post_user_id 
WHERE p.post_id = '{$post_id}'
ORDER BY p.created_at DESC";
$stmt = $mysqli->query($sql);
while ($row = $stmt->fetch_object()) {
    $time = date("d M Y g:i", strtotime($row->created_at));
    if ($row->user_profile_picture != '') {
        $post_user_image_url = "https://wcf.co.ke/storage/user_profile_images/" . $row->user_profile_picture;
    } else {
        $post_user_image_url = "https://wcf.co.ke/storage/user_profile_images/default.png";
    }
?>
    <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body p-0 mt-3 position-relative">
                <input type="hidden" name="post_id" value="<?php echo $row->post_id; ?>">
                <textarea name="post_content" required class="h290 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="30"><?php echo $row->post_content; ?></textarea>
            </div>
            <div class="card-body d-flex p-0 mt-0">
                <input type="file" id="selectedFile" name="post_image" accept=".png, .jpeg, .jpg, .gif" style="display: none;" />
                <a onclick="document.getElementById('selectedFile').click();" href="#" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4">
                    <i class="font-md text-success feather-image me-2"></i><span class="">Share image</span>
                </a>
                <button type="submit" name="Update_Post" class="btn-submit nd-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4">
                    <i class="font-md text-success feather-share me-2"></i><span class="">Publish</span>
                </button>
            </div>
        </form>
    </div>
    <br>
<?php }
?>