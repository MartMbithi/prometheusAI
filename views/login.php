<?php
/*
 *   Crafted On Fri Dec 16 2022
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
require_once('../partials/head.php');
?>

<body class='pace-top'>

    <div id="app" class="app app-full-height app-without-header">

        <div class="login">

            <div class="login-content">
                <form action="https://seantheme.com/hud/index.html" method="POST" name="login_form">
                    <h1 class="text-center">Sign In</h1>
                    <div class="text-white text-opacity-50 text-center mb-4">
                        For your protection, please verify your identity.
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-white bg-opacity-5" value="" placeholder="" />
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <a href="#" class="ms-auto text-white text-decoration-none text-opacity-50">Forgot password?</a>
                        </div>
                        <input type="password" class="form-control form-control-lg bg-white bg-opacity-5" value="" placeholder="" />
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="customCheck1" />
                            <label class="form-check-label" for="customCheck1">Remember me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Sign In</button>
                    <div class="text-center text-white text-opacity-50">
                        Don't have an account yet? <a href="page_register.html">Sign up</a>.
                    </div>
                </form>
            </div>

        </div>


        <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>


        <div class="app-theme-panel">
            <div class="app-theme-panel-container">
                <a href="javascript:;" data-toggle="theme-panel-expand" class="app-theme-toggle-btn"><i class="bi bi-sliders"></i></a>
                <div class="app-theme-panel-content">
                    <div class="small fw-bold text-white mb-1">Theme Color</div>
                    <div class="card mb-3">

                        <div class="card-body p-2">

                            <div class="app-theme-list">
                                <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-pink" data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-red" data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-warning" data-theme-class="theme-warning" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-yellow" data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-lime" data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-green" data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
                                <div class="app-theme-list-item active"><a href="javascript:;" class="app-theme-list-link bg-teal" data-theme-class="" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-info" data-theme-class="theme-info" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-primary" data-theme-class="theme-primary" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-purple" data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-indigo" data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-gray-100" data-theme-class="theme-gray-200" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Gray">&nbsp;</a></div>
                            </div>

                        </div>


                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>

                    </div>
                    <div class="small fw-bold text-white mb-1">Theme Cover</div>
                    <div class="card">

                        <div class="card-body p-2">

                            <div class="app-theme-cover">
                                <div class="app-theme-cover-item active">
                                    <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-1.jpg);" data-theme-cover-class="" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a>
                                </div>
                                <div class="app-theme-cover-item">
                                    <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-2.jpg);" data-theme-cover-class="bg-cover-2" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 2">&nbsp;</a>
                                </div>
                                <div class="app-theme-cover-item">
                                    <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-3.jpg);" data-theme-cover-class="bg-cover-3" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 3">&nbsp;</a>
                                </div>
                                <div class="app-theme-cover-item">
                                    <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-4.jpg);" data-theme-cover-class="bg-cover-4" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 4">&nbsp;</a>
                                </div>
                                <div class="app-theme-cover-item">
                                    <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-5.jpg);" data-theme-cover-class="bg-cover-5" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 5">&nbsp;</a>
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
    <!-- Scripts -->
    <?php require_once('../partials/scripts.php'); ?>
    <!-- End Scripts -->
</body>


</html>