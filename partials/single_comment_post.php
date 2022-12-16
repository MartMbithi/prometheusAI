<?php
/*
 *   Crafted On Sat Nov 19 2022
 *
 * 
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD End User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. GRANT OF LICENSE 
 *   Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   DEVLAN SOLUTIONS LTD  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF DEVLAN SOLUTIONS LTD HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL DEVLAN SOLUTIONS LTD  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */

$comment_id = mysqli_real_escape_string($mysqli, $_GET['comment']);
$sql = "SELECT * FROM comments c INNER JOIN posts p ON c.comment_post_id = p.post_id
INNER JOIN user u ON u.user_id = p.post_user_id  WHERE c.comment_id = '{$comment_id}'  ";
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
            <a href="guest_profile?view=<?php echo $row->user_id; ?>">
                <div class="card-body p-0 d-flex">
                    <figure class="avatar me-3"><img src="<?php echo $post_user_image_url; ?>" alt="" class="shadow-sm rounded-circle cropped_image"></figure>
                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row->user_full_name; ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Published: <?php echo date("d M Y", strtotime($row->created_at)); ?></span></h4>
                </div>
            </a>
            <div class="card-body p-0 me-lg-5">
                <p class="fw-500 text-grey-900 lh-26 font-xssss w-100 mb-2" align="justify">
                    <?php echo strip_tags($row->post_content); ?>
                </p>
            </div>
        </div>
        <br>
    <?php } elseif ($row->post_image != '' && $row->post_content != '' && $row->post_type != 'ad') { ?>
        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
            <a href="guest_profile?view=<?php echo $row->user_id; ?>">
                <div class="card-body p-0 d-flex">
                    <figure class="avatar me-3"><img src="<?php echo $post_user_image_url; ?>" alt="image" class="shadow-sm rounded-circle cropped_image"></figure>
                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row->user_full_name; ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Published: <?php echo date("d M Y", strtotime($row->created_at)); ?></span></h4>
                </div>
            </a>
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
        </div>
        <br>

    <?php } else { ?>
        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
            <a href="guest_profile?view=<?php echo $row->user_id; ?>">
                <div class="card-body p-0 d-flex">
                    <figure class="avatar me-3"><img src="<?php echo $post_user_image_url; ?>" alt="image" class="shadow-sm rounded-circle cropped_image"></figure>
                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $row->user_full_name; ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Published: <?php echo date("d M Y", strtotime($row->created_at)); ?></span></h4>
                </div>
            </a>

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
        </div>
        <br>
<?php }
} ?>