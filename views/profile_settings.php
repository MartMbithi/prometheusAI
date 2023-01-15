<?php
/*
 *   Crafted On Sun Jan 15 2023
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
session_start();
require_once('../config/config.php');
require_once('../config/codeGen.php');
require_once('../config/checklogin.php');
require_once('../helpers/savings.php');
require_once('../partials/head.php');
?>

<body>

    <div id="app" class="app">

        <!-- Header -->
        <?php require_once('../partials/header.php'); ?>
        <!-- End Header -->

        <!-- Side Navigation Bar -->
        <?php require_once('../partials/sidenavigation.php'); ?>
        <!-- End Side Navigatio Bar -->

        <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>

        <?php
        /* Load This Partial With Logged In User Session */
        $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
        $user_sql = mysqli_query(
            $mysqli,
            "SELECT * FROM user WHERE user_id = '{$user_id}'"
        );
        if (mysqli_num_rows($user_sql) > 0) {
            while ($user = mysqli_fetch_array($user_sql)) {
        ?>
                <div id="content" class="app-content">
                    <div class="card">
                        <div class="card-body p-0">

                            <div class="profile">

                                <div class="profile-container">

                                    <div class="profile-sidebar">
                                        <div class="desktop-sticky-top">
                                            <div class="profile-img">
                                                <img src="../public/img/user/profile.png" alt="" />
                                            </div>

                                            <h4><?php echo $user['user_name']; ?></h4>
                                            <div class="mb-3 text-white text-opacity-50 fw-bold mt-n2"></div>

                                            <div class="mb-1">
                                                <i class="fa fa-phone fa-fw text-white text-opacity-50"></i> <?php echo $user['user_phone']; ?>
                                            </div>
                                            <div class="mb-3">
                                                <i class="fa fa-envelope fa-fw text-white text-opacity-50"></i> <?php echo $user['user_email']; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="profile-content">

                                        <div class="profile-content-container">
                                            <div class="row gx-4">
                                                <div class="col-xl-12">
                                                    <div class="tab-content p-0">

                                                        <div class="tab-pane fade show active" id="profile-post">
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="d-flex align-items-center mb-3">
                                                                        <div class="flex-fill ps-2">
                                                                            <div class="fw-bold">
                                                                                Profile Settings
                                                                            </div>
                                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="form-group col-md-6 mb-3">
                                                                                            <label for="">Full Name</label>
                                                                                            <input type="text" required name="user_name" value="<?php echo $user['user_name']; ?>" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-6 mb-3">
                                                                                            <label for="">Phone Number</label>
                                                                                            <input type="text" required name="user_phone" value="<?php echo $user['user_phone']; ?>" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-12 mb-3">
                                                                                            <label for="">Email Address</label>
                                                                                            <input type="email" required name="user_email" value="<?php echo $user['user_email']; ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit" name="Update_Profile" class="btn btn-outline-lime">Update </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="card-arrow">
                                                                    <div class="card-arrow-top-left"></div>
                                                                    <div class="card-arrow-top-right"></div>
                                                                    <div class="card-arrow-bottom-left"></div>
                                                                    <div class="card-arrow-bottom-right"></div>
                                                                </div>
                                                            </div>

                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="d-flex align-items-center mb-3">
                                                                        <div class="flex-fill ps-2">
                                                                            <div class="fw-bold">
                                                                                Password Settings
                                                                            </div>
                                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="form-group col-md-6 mb-3">
                                                                                            <label for="">Old Password</label>
                                                                                            <input type="password" required name="old_password" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-6 mb-3">
                                                                                            <label for="">New Password</label>
                                                                                            <input type="password" required name="new_password" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group col-md-12 mb-3">
                                                                                            <label for="">Confirm Password</label>
                                                                                            <input type="password" required name="confirm_password" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit" name="Update_Password" class="btn btn-outline-lime">Update</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="card-arrow">
                                                                    <div class="card-arrow-top-left"></div>
                                                                    <div class="card-arrow-top-right"></div>
                                                                    <div class="card-arrow-bottom-left"></div>
                                                                    <div class="card-arrow-bottom-right"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
    <!-- Scripts -->
    <?php require_once('../partials/scripts.php'); ?>
    <!-- ./Scripts -->

</body>


</html>