<div class="col-xl-4 col-xxl-3 col-lg-4 ps-lg-0">
    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
        <div class="card-body d-flex align-items-center p-4">
            <h4 class="fw-700 mb-0 font-xssss text-grey-900">People you may know</h4>
            <a href="wcf_users" class="fw-600 ms-auto font-xssss text-primary">See all</a>
        </div>
        <?php
        $users_sql = mysqli_query(
            $mysqli,
            "SELECT * FROM  user  WHERE  user_id !='{$user_id}' 
            AND (user_church_name = '{$user_church}' || user_city = '{$user_city}')
            ORDER BY RAND() LIMIT 5
            "
        );
        if (mysqli_num_rows($users_sql) > 0) {
            while ($users_details = mysqli_fetch_array($users_sql)) {
                /* Load Default Profile Photo If User Has No Image */
                if ($users_details['user_profile_picture'] == '') {
                    $url = "https://wcf.co.ke/storage/user_profile_images/default.png";
                } else {
                    $url = "https://wcf.co.ke/storage/user_profile_images/" . $users_details['user_profile_picture'];
                }

        ?> <a href="guest_profile?view=<?php echo $users_details['user_id']; ?>">
                    <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
                        <figure class="avatar me-3"><img src="<?php echo $url; ?>" alt="image" class="shadow-sm rounded-circle cropped_image"></figure>
                        <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $users_details['user_full_name']; ?>
                            <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?php echo ucwords(strtolower($users_details['user_church_name'])); ?></span>
                        </h4>
                    </div>
                </a>
            <?php }
        } else { ?>
            <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
                <figure class="avatar me-3"><img src="https://wcf.co.ke/storage/user_profile_images/default.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                <h4 class="fw-700 text-danger font-xssss mt-1">Woops
                    <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">It seems like we cannot find anyone you know</span>
                </h4>
            </div>
        <?php } ?>
    </div>
</div>