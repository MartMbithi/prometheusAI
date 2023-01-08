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
require_once('../helpers/assets.php');
require_once('../vendor/autoload.php');
require_once('../helpers/bulk_import.php');
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

            <div class="container">

                <div class="row">
                    <div class="row">
                        <div class="col-xl-12">
                            <h1 class="page-header">
                                My Assets
                            </h1>
                            <div class="d-flex justify-content-end mb-3">
                                <div class="btn-group">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#bulk_import" class="btn-sm btn btn-outline-lime"><span>Bulk Import</button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#add_modal" class="btn-sm btn btn-outline-lime"><span>Register New Asset</button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#download_assets" class="btn-sm btn btn-outline-lime"><span>Download</button>
                                </div>
                            </div>
                            <!-- Add Modal -->
                            <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header align-items-center">
                                            <div class="modal-title">
                                                <h6 class="mb-0">Register New Asset</h6>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="post" enctype="multipart/form-data" role="form">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-3">
                                                        <label for="">Asset Category Name</label>
                                                        <select required name="asset_category_id" class="form-control">
                                                            <option>Select Asset Category</option>
                                                            <?php
                                                            $assets_category_sql = mysqli_query(
                                                                $mysqli,
                                                                "SELECT * FROM assets_category ORDER BY  category_name ASC"
                                                            );
                                                            $cnt = 1;
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
                                                    <div class="form-group col-md-8 mb-3">
                                                        <label for="">Asset Name</label>
                                                        <input type="text" required name="asset_name" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4 mb-3">
                                                        <label for="">Asset Price</label>
                                                        <input type="text" required name="asset_cost" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4 mb-3">
                                                        <label for="">Asset Date Purchased</label>
                                                        <input type="date" required name="asset_date_purchased" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4 mb-3">
                                                        <label for="">Asset Status</label>
                                                        <select type="text" required name="asset_status" class="form-control">
                                                            <option>Operational</option>
                                                            <option>Faulty</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12 mb-3">
                                                        <label for="">Asset Details</label>
                                                        <textarea rows="3" type="text" required name="asset_details" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="Add_Asset" class="btn btn-outline-lime">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->

                            <!-- Bulk Import Modal -->
                            <div class="modal fade fixed-right" id="bulk_import" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header align-items-center">
                                            <div class="modal-title">
                                                <h6 class="mb-0">Bulk Import Assets From Xls File</h6>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="post" enctype="multipart/form-data" role="form">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12 mb-3">
                                                        <label for="">Asset Category Name</label>
                                                        <select required name="asset_category_id" class="form-control">
                                                            <option>Select Asset Category</option>
                                                            <?php
                                                            $assets_category_sql = mysqli_query(
                                                                $mysqli,
                                                                "SELECT * FROM assets_category ORDER BY  category_name ASC"
                                                            );
                                                            $cnt = 1;
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
                                                    <div class="form-group col-md-12 mb-3">
                                                        <label class="form-label" for="exampleFormControlFile1">Assets XLS File</label>
                                                        <input type="file" name="assets_bulk_import_file" required class="form-control" id="exampleFormControlFile1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="Bulk_Import_Asset" class="btn btn-outline-lime">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->

                            <!-- Download Assets -->
                            <div class="modal fade" id="download_assets" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body text-center text-danger">
                                            <h4>
                                                Heads Up!
                                                <br>
                                                Export Assets Records As
                                                <br>
                                            </h4>
                                            <a href="reports?module=assets&type=PDF" class="text-center btn btn-outline-lime">PDF</a>
                                            <a href="reports?module=assets&type=CSV" class="text-center btn btn-outline-lime">CSV</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Download Assets -->
                            <hr class="mb-4" />
                            <div class="d-flex justify-content-center">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-control" type="text" id="Asset_Category_Search" onkeyup="FilterFunction()" placeholder="Search Asset">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row row-cols-1 row-cols-md-2 g-3">
                                <?php
                                $assets_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM assets a INNER JOIN 
                                    assets_category ac ON a.asset_category_id = ac.category_id
                                    ORDER BY  asset_name ASC"
                                );
                                $cnt = 1;
                                if (mysqli_num_rows($assets_sql) > 0) {
                                    while ($assets = mysqli_fetch_array($assets_sql)) {
                                ?>
                                        <div class="col-sm-12 col-lg-4 col-xl-4">
                                            <div class="card Asset_Category_Name">
                                                <div class="card-header fw-bold small"><?php echo $cnt; ?> - <?php echo $assets['category_name']; ?></div>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $assets['asset_name']; ?></h5>
                                                    <h6 class="card-subtitle mb-3 text-white text-opacity-50">
                                                        Cost: Ksh <?php echo number_format($assets['asset_cost']); ?> <br>
                                                        Purchase Date: <?php echo date('d M Y', strtotime($assets['asset_date_purchased'])); ?><br>
                                                        Status:
                                                        <?php
                                                        if ($assets['asset_status'] == 'Operational') { ?>
                                                            <span class="text-lime">Operational 😎 </span>
                                                        <?php } else { ?>
                                                            <span class="text-danger">Faulty 🙁 </span>
                                                        <?php } ?>
                                                        <br>
                                                    </h6>
                                                    <div class="card-footer">
                                                        <button data-bs-toggle="modal" data-bs-target="#details_<?php echo $assets['asset_id']; ?>" class="btn btn-sm btn-outline-lime"><i class="fas fa-eye"></i> Details</button>
                                                        <button data-bs-toggle="modal" data-bs-target="#update_<?php echo $assets['asset_id']; ?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i> Edit</button>
                                                        <button data-bs-toggle="modal" data-bs-target="#delete_<?php echo $assets['asset_id']; ?>" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Delete</button>
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
                                        include('../modals/assets.php');
                                    }
                                } ?>
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