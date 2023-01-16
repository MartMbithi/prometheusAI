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
require_once('../helpers/system_settings.php');
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
                                System Configurations
                            </h1>

                            <br>
                            <?php
                            /* Fetch System Settings */
                            $settings_sql = mysqli_query(
                                $mysqli,
                                "SELECT * FROM mailer_settings"
                            );
                            if (mysqli_num_rows($settings_sql) > 0) {
                                while ($sys_configs = mysqli_fetch_array($settings_sql)) {
                            ?>
                                    <div class="row row-cols-1 row-cols-md-2 g-3">
                                        <!-- Users -->
                                        <div class="col-sm-12 col-lg-12 col-xl-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">STMP Mailer</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Database Settings</button>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                                            <form method="post" enctype="multipart/form-data" role="form">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-8 mb-3">
                                                                            <label for="">Host</label>
                                                                            <input type="text" required name="mailer_host" value="<?php echo $sys_configs['mailer_host']; ?>" class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-4 mb-3">
                                                                            <label for="">Port</label>
                                                                            <select type="text" required name="mailer_port" value="<?php echo $sys_configs['mailer_port']; ?>" class="form-control">
                                                                                <option>465</option>
                                                                                <option>586</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4 mb-3">
                                                                            <label for="">Protocol</label>
                                                                            <select type="text" required name="mailer_protocol" value="<?php echo $sys_configs['mailer_protocol']; ?>" class="form-control">
                                                                                <option>ssl</option>
                                                                                <option>tls</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-8 mb-3">
                                                                            <label for="">Mail Username</label>
                                                                            <input type="text" required name="mailer_username" value="<?php echo $sys_configs['mailer_username']; ?>" class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-4 mb-3">
                                                                            <label for="">Mail Password</label>
                                                                            <input type="password" required name="mailer_password" value="<?php echo $sys_configs['mailer_password']; ?>" class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-4 mb-3">
                                                                            <label for="">Mail From Email</label>
                                                                            <input type="text" required name="mailer_mail_from_email" value="<?php echo $sys_configs['mailer_mail_from_email']; ?>" class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-4 mb-3">
                                                                            <label for="">Mail From Name</label>
                                                                            <input type="text" required name="mailer_mail_from_name" value="<?php echo $sys_configs['mailer_mail_from_name']; ?>" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="Update_Mailer_Settings" class="btn btn-outline-lime">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                                            <br>
                                                            <h4 class="text-center">
                                                                Local Database Configurations
                                                            </h4>
                                                            <div class="d-flex justify-content-center mb-3">
                                                                <div class="btn-group">
                                                                    <br>
                                                                    <form method="post">
                                                                        <button type="submit" name="Settings_Backup_Local_Db" class="btn-sm btn btn-outline-lime"><span>Backup</button>
                                                                        <button type="submit" name="Settings_Sync_Local_Db" class="btn-sm btn btn-outline-lime"><span>Synchronize To Remote</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <br>
                                                            <h4 class="text-center">
                                                                Remote Database Configurations
                                                            </h4>
                                                            <div class="d-flex justify-content-center mb-3">
                                                                <div class="btn-group">
                                                                    <br>
                                                                    <form method="post">
                                                                        <button type="submit" name="Settings_Backup_Remote_Db" class="btn-sm btn btn-outline-lime"><span>Backup</button>
                                                                        <button type="submit" name="Settings_Sync_Remote_Db" class="btn-sm btn btn-outline-lime"><span>Synchronize To Remote</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
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
                            <?php }
                            } ?>
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