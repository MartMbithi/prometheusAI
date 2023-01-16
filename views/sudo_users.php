<?php
/*
 *   Crafted On Sat Dec 17 2022
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
require_once('../partials/head.php');
?>

<body>

    <div id="app" class="app">

        <!-- Header -->
        <?php require_once('../partials/header.php'); ?>
        <!-- End Header -->

        <!-- Side Navigation Bar -->
        <?php require_once('../partials/sudo_navigation.php'); ?>
        <!-- End Side Navigatio Bar -->

        <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>


        <div id="content" class="app-content">

            <div class="container">

                <div class="row">
                    <div class="row">
                        <div class="col-xl-12">
                            <h1 class="page-header">
                                Registered Users
                            </h1>
                            <hr class="mb-4" />
                            <div class="d-flex justify-content-center">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-control" type="text" id="Asset_Category_Search" onkeyup="FilterFunction()" placeholder="Search Users">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row row-cols-1 row-cols-md-2 g-3">
                                <?php
                                $per_page_record = 12;
                                if (isset($_GET["page"])) {
                                    $page  = $_GET["page"];
                                } else {
                                    $page = 1;
                                }
                                $start_from = ($page - 1) * $per_page_record;
                                $users_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM user 
                                    WHERE user_access_level = 'User'
                                    ORDER BY  user_name ASC LIMIT $start_from, $per_page_record"
                                );
                                $cnt = 1;
                                if (mysqli_num_rows($users_sql) > 0) {
                                    while ($users = mysqli_fetch_array($users_sql)) {
                                ?>
                                        <div class="col-sm-12 col-lg-4 col-xl-4">
                                            <div class="card Asset_Category_Name">
                                                <div class="card-header fw-bold small"><?php echo $cnt; ?></div>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $users['user_name']; ?></h5>
                                                    <h6 class="card-subtitle mb-3 text-white text-opacity-50">
                                                        Phone Number: <?php echo $users['user_phone']; ?> <br>
                                                        Email: <?php echo $users['user_email']; ?><br>
                                                        Date Joined: <?php echo date('d M Y', strtotime($users['user_date_joined'])); ?>
                                                    </h6>
                                                    <div class="card-footer">
                                                        <button data-bs-toggle="modal" data-bs-target="#delete_<?php echo $users['user_id']; ?>" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Delete</button>
                                                    </div>
                                                </div>
                                                <div class="card-arrow">
                                                    <div class="card-arrow-top-left "></div>
                                                    <div class="card-arrow-top-right"></div>
                                                    <div class="card-arrow-bottom-left"></div>
                                                    <div class="card-arrow-bottom-right"></div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                        $cnt = $cnt + 1;
                                        /* Modals  */
                                        include('../modals/users.php');
                                    }
                                } else {
                                    /* 404 */
                                    include('../errors/users_404.php');
                                } ?>
                            </div>
                        </div>
                    </div>
                    <?php include('../paginations/users.php'); ?>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <?php require_once('../partials/scripts.php'); ?>
        <!-- End Scripts -->
    </div>
</body>

</html>