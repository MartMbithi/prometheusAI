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
require_once('../config/checklogin.php');
require_once('../functions/analytics.php');
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


        <div id="content" class="app-content">

            <div class="row">

                <!-- My Assets -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">CURRENT ASSETS</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-12">
                                    <h4 class="mb-0"><?php echo $my_assets; ?></h4>
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

                <!-- My Savings -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">SAVINGS</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-12">
                                    <h4 class="mb-0">Ksh <?php echo number_format($my_saving_amount, 2); ?></h4>
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

                <!-- My Bills -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">BILLS</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-12">
                                    <h4 class="mb-0">Ksh <?php echo number_format($my_purchases, 2); ?></h4>
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



                <!-- My Current Financial Status -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">CURRENT FINANCIAL STATUS</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-12">
                                    <?php if ($my_saving_amount >= $my_purchases) { ?>
                                        <h4 class="mb-0 text-success">
                                            Ksh <?php echo number_format($my_curent_financial_status); ?>
                                        </h4>

                                    <?php } else if ($my_saving_amount <= $my_purchases) { ?>
                                        <h4 class="mb-0 text-warning">
                                            Ksh <?php echo number_format($my_curent_financial_status); ?>
                                        </h4>

                                    <?php } else { ?>
                                        <h4 class="mb-0 text-danger">Please Audit Your Finances</h4>
                                    <?php } ?>
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


                <div class="col-xl-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">Recent Bills</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-borderless mb-2px small text-nowrap">
                                    <tbody>
                                        <?php
                                        /* Fetch Recent Bills */
                                        $recent_bills_sql = mysqli_query(
                                            $mysqli,
                                            "SELECT * FROM purchases  ORDER BY purchase_date_made DESC LIMIT 20"
                                        );
                                        if (mysqli_num_rows($recent_bills_sql) > 0) {
                                            while ($recent_bills = mysqli_fetch_array($recent_bills_sql)) {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <span class="d-flex align-items-center">
                                                            <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                                            <?php echo $recent_bills['purchase_item']; ?>
                                                        </span>
                                                    </td>
                                                    <td>QTY: <?php echo $recent_bills['purchase_quantity']; ?></td>
                                                    <td>Amount in Ksh <?php echo number_format($recent_bills['purchase_amount']); ?></td>
                                                    <td>
                                                        <span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo date('d M Y', strtotime($recent_bills['purchase_date_made'])); ?></span>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td>
                                                    <span class="d-flex align-items-center text-warning">
                                                        <i class="bi bi-circle-fill fs-6px text-danger me-2"></i>
                                                        No Recent Bills & Expenditures
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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

                <div class="col-xl-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">Recent Incomes & Savings</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-borderless mb-2px small text-nowrap">
                                    <tbody>
                                        <?php
                                        /* Fetch Recent Bills */
                                        $recent_incomes_sql = mysqli_query(
                                            $mysqli,
                                            "SELECT * FROM savings  ORDER BY saving_date DESC LIMIT 20"
                                        );
                                        if (mysqli_num_rows($recent_incomes_sql) > 0) {
                                            while ($recent_income = mysqli_fetch_array($recent_incomes_sql)) {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <span class="d-flex align-items-center">
                                                            <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                                            <?php echo $recent_income['saving_account']; ?>
                                                        </span>
                                                    </td>
                                                    <td>Total amount in Ksh<?php echo number_format($recent_income['saving_amount']); ?></td>
                                                    <td>
                                                        <span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo date('d M Y', strtotime($recent_income['saving_date'])); ?></span>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td>
                                                    <span class="d-flex align-items-center text-warning">
                                                        <i class="bi bi-circle-fill fs-6px text-danger me-2"></i>
                                                        No Savings & Expenditures Registered
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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

    <!-- Scripts -->
    <?php require_once('../partials/scripts.php'); ?>
    <!-- End Scripts -->

</body>


</html>