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
                                Reports
                            </h1>
                            <hr class="mb-4" />
                            <div class="d-flex justify-content-center">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-control" type="text" id="Asset_Category_Search" onkeyup="FilterFunction()" placeholder="Search Reports">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row row-cols-1 row-cols-md-2 g-3">

                                <!-- Expenses & Bills  -->
                                <div class="col-sm-12 col-lg-4 col-xl-4">
                                    <div class="card Asset_Category_Name">
                                        <div class="card-header fw-bold small">1</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Expenses & Bills</h5>
                                            <div class="card-footer">
                                                <a role="button" data-bs-toggle="modal" href="#expenses_filter_pdf" class="text-center btn btn-outline-lime">PDF</a>
                                                <a role="button" data-bs-toggle="modal" href="#expenses_filter_csv" class="text-center btn btn-outline-lime">CSV</a>
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

                                <!-- Filter Expenses Modals -->
                                <div class="modal fade fixed-right" id="expenses_filter_pdf" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header align-items-center">
                                                <div class="modal-title">
                                                    <h6 class="mb-0">Filter Expenses & Bills As Per Date</h6>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="post" enctype="multipart/form-data" role="form" action="sudo_reports_generate?module=bills&type=PDF">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="">Expenses From Date</label>
                                                            <input type="date" required name="from_date" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="">Expenses To From Date</label>
                                                            <input type="date" required name="to_date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="Filter_Exenses" class="btn btn-outline-lime">Filter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade fixed-right" id="expenses_filter_csv" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header align-items-center">
                                                <div class="modal-title">
                                                    <h6 class="mb-0">Filter Expenses & Bills As Per Date</h6>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="post" enctype="multipart/form-data" role="form" action="sudo_reports_generate?module=bills&type=CSV">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="">Expenses From Date</label>
                                                            <input type="date" required name="from_date" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="">Expenses To From Date</label>
                                                            <input type="date" required name="to_date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="Filter_Exenses" class="btn btn-outline-lime">Filter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->

                                <!-- Savings -->
                                <div class="col-sm-12 col-lg-4 col-xl-4">
                                    <div class="card Asset_Category_Name">
                                        <div class="card-header fw-bold small">2</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Savings & Revenues</h5>
                                            <div class="card-footer">
                                                <a role="button" data-bs-toggle="modal" href="#savings_filter_pdf" class="text-center btn btn-outline-lime">PDF</a>
                                                <a role="button" data-bs-toggle="modal" href="#savings_filter_csv" class="text-center btn btn-outline-lime">CSV</a>
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
                                <!-- Filter Expenses Modals -->
                                <div class="modal fade fixed-right" id="savings_filter_pdf" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header align-items-center">
                                                <div class="modal-title">
                                                    <h6 class="mb-0">Filter Expenses & Bills As Per Date</h6>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="post" enctype="multipart/form-data" role="form" action="sudo_reports_generate?module=savings&type=PDF">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="">Expenses From Date</label>
                                                            <input type="date" required name="from_date" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="">Expenses To From Date</label>
                                                            <input type="date" required name="to_date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="Filter_Exenses" class="btn btn-outline-lime">Filter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade fixed-right" id="savings_filter_csv" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header align-items-center">
                                                <div class="modal-title">
                                                    <h6 class="mb-0">Filter Expenses & Bills As Per Date</h6>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="post" enctype="multipart/form-data" role="form" action="sudo_reports_generate?module=savings&type=CSV">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="">Expenses From Date</label>
                                                            <input type="date" required name="from_date" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label for="">Expenses To From Date</label>
                                                            <input type="date" required name="to_date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="Filter_Exenses" class="btn btn-outline-lime">Filter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                                <!-- Assets -->
                                <div class="col-sm-12 col-lg-4 col-xl-4">
                                    <div class="card Asset_Category_Name">
                                        <div class="card-header fw-bold small">3</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Assets</h5>
                                            <div class="card-footer">
                                                <a href="sudo_reports_generate?module=assets&type=PDF" class="text-center btn btn-outline-lime">PDF</a>
                                                <a href="sudo_reports_generate?module=assets&type=CSV" class="text-center btn btn-outline-lime">CSV</a>
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
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <?php require_once('../partials/scripts.php'); ?>
        <!-- End Scripts -->
    </div>
</body>

</html>