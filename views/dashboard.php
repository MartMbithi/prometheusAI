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
                                <div class="col-7">
                                    <h3 class="mb-0"><?php echo $my_assets; ?></h3>
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
                                <div class="col-7">
                                    <h3 class="mb-0">ksh <?php echo number_format($my_purchases); ?></h3>
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

                <!-- My Assets -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">CURRENT ASSETS</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-7">
                                    <h3 class="mb-0"><?php echo $my_assets; ?></h3>
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

                <!-- My Assets -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">CURRENT ASSETS</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-7">
                                    <h3 class="mb-0"><?php echo $my_assets; ?></h3>
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
                                <span class="flex-grow-1">SERVER STATS</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>


                            <div class="ratio ratio-21x9 mb-3">
                                <div id="chart-server"></div>
                            </div>


                            <div class="row">

                                <div class="col-lg-6 mb-3 mb-lg-0">
                                    <div class="d-flex align-items-center">

                                        <div class="w-50px h-50px">
                                            <div data-render="apexchart" data-type="donut" data-title="Visitors" data-height="50"></div>
                                        </div>


                                        <div class="ps-3 flex-1">
                                            <div class="fs-10px fw-bold text-white text-opacity-50 mb-1">DISK USAGE</div>
                                            <div class="mb-2 fs-5 text-truncate">20.04 / 256 GB</div>
                                            <div class="progress h-3px bg-white-transparent-2 mb-1">
                                                <div class="progress-bar bg-theme" style="width: 20%"></div>
                                            </div>
                                            <div class="fs-11px text-white text-opacity-50 mb-2 text-truncate">
                                                Last updated 1 min ago
                                            </div>
                                            <div class="d-flex align-items-center small">
                                                <i class="bi bi-circle-fill fs-6px me-2 text-theme"></i>
                                                <div class="flex-1">DISK C</div>
                                                <div>19.56GB</div>
                                            </div>
                                            <div class="d-flex align-items-center small">
                                                <i class="bi bi-circle-fill fs-6px me-2 text-theme text-opacity-50"></i>
                                                <div class="flex-1">DISK D</div>
                                                <div>0.50GB</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="d-flex">

                                        <div class="w-50px pt-3">
                                            <div data-render="apexchart" data-type="donut" data-title="Visitors" data-height="50"></div>
                                        </div>


                                        <div class="ps-3 flex-1">
                                            <div class="fs-10px fw-bold text-white text-opacity-50 mb-1">BANDWIDTH</div>
                                            <div class="mb-2 fs-5 text-truncate">83.76GB / 10TB</div>
                                            <div class="progress h-3px bg-white-transparent-2 mb-1">
                                                <div class="progress-bar bg-theme" style="width: 10%"></div>
                                            </div>
                                            <div class="fs-11px text-white text-opacity-50 mb-2 text-truncate">
                                                Last updated 1 min ago
                                            </div>
                                            <div class="d-flex align-items-center small">
                                                <i class="bi bi-circle-fill fs-6px me-2 text-theme"></i>
                                                <div class="flex-1">HTTP</div>
                                                <div>35.47GB</div>
                                            </div>
                                            <div class="d-flex align-items-center small">
                                                <i class="bi bi-circle-fill fs-6px me-2 text-theme text-opacity-50"></i>
                                                <div class="flex-1">FTP</div>
                                                <div>1.25GB</div>
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


                <div class="col-xl-6">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">TRAFFIC ANALYTICS</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>


                            <div class="ratio ratio-21x9 mb-3">
                                <div id="world-map" class="jvectormap-without-padding"></div>
                            </div>


                            <div class="row gx-4">

                                <div class="col-lg-6 mb-3 mb-lg-0">
                                    <table class="w-100 small mb-0 text-truncate text-white text-opacity-60">
                                        <thead>
                                            <tr class="text-white text-opacity-75">
                                                <th class="w-50">COUNTRY</th>
                                                <th class="w-25 text-end">VISITS</th>
                                                <th class="w-25 text-end">PCT%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>FRANCE</td>
                                                <td class="text-end">13,849</td>
                                                <td class="text-end">40.79%</td>
                                            </tr>
                                            <tr>
                                                <td>SPAIN</td>
                                                <td class="text-end">3,216</td>
                                                <td class="text-end">9.79%</td>
                                            </tr>
                                            <tr class="text-theme fw-bold">
                                                <td>MEXICO</td>
                                                <td class="text-end">1,398</td>
                                                <td class="text-end">4.26%</td>
                                            </tr>
                                            <tr>
                                                <td>UNITED STATES</td>
                                                <td class="text-end">1,090</td>
                                                <td class="text-end">3.32%</td>
                                            </tr>
                                            <tr>
                                                <td>BELGIUM</td>
                                                <td class="text-end">1,045</td>
                                                <td class="text-end">3.18%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="col-lg-6">

                                    <div class="card">

                                        <div class="card-body py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="w-70px">
                                                    <div data-render="apexchart" data-type="donut" data-height="70"></div>
                                                </div>
                                                <div class="flex-1 ps-2">
                                                    <table class="w-100 small mb-0 text-white text-opacity-60">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-95"></div> FEED
                                                                    </div>
                                                                </td>
                                                                <td class="text-end">25.70%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-75"></div> ORGANIC
                                                                    </div>
                                                                </td>
                                                                <td class="text-end">24.30%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-55"></div> REFERRAL
                                                                    </div>
                                                                </td>
                                                                <td class="text-end">23.05%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-35"></div> DIRECT
                                                                    </div>
                                                                </td>
                                                                <td class="text-end">14.85%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-15"></div> EMAIL
                                                                    </div>
                                                                </td>
                                                                <td class="text-end">7.35%</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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
                                <span class="flex-grow-1">TOP PRODUCTS</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>


                            <div class="table-responsive">
                                <table class="w-100 mb-0 small align-middle text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="position-relative mb-2">
                                                        <div class="bg-center bg-cover bg-no-repeat w-80px h-60px" style="background-image: url(assets/img/dashboard/product-1.jpg);">
                                                        </div>
                                                        <div class="position-absolute top-0 start-0">
                                                            <span class="badge bg-theme text-theme-900 rounded-0 d-flex align-items-center justify-content-center w-20px h-20px">1</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 ps-3">
                                                        <div class="mb-1"><small class="fs-9px fw-500 lh-1 d-inline-block rounded-0 badge bg-white bg-opacity-25 text-white text-opacity-75 pt-5px">SKU90400</small></div>
                                                        <div class="fw-500 text-white">Huawei Smart Watch</div>
                                                        $399.00
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <table class="mb-2">
                                                    <tr>
                                                        <td class="pe-3">QTY:</td>
                                                        <td class="text-white text-opacity-75 fw-500">129</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-3">REVENUE:</td>
                                                        <td class="text-white text-opacity-75 fw-500">$51,471</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-3 text-nowrap">PROFIT:</td>
                                                        <td class="text-white text-opacity-75 fw-500">$15,441</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex mb-2 align-items-center">
                                                    <div class="position-relative">
                                                        <div class="bg-center bg-cover bg-no-repeat w-80px h-60px" style="background-image: url(assets/img/dashboard/product-2.jpg);">
                                                        </div>
                                                        <div class="position-absolute top-0 start-0">
                                                            <span class="badge bg-theme text-theme-900 rounded-0 d-flex align-items-center justify-content-center w-20px h-20px">2</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 ps-3">
                                                        <div class="mb-1"><small class="fs-9px fw-500 lh-1 d-inline-block rounded-0 badge bg-white bg-opacity-25 text-white text-opacity-75 pt-5px">SKU85999</small></div>
                                                        <div class="text-white fw-500">Nike Shoes Black Version</div>
                                                        $99.00
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <table class="mb-2">
                                                    <tr>
                                                        <td class="pe-3">QTY:</td>
                                                        <td class="text-white text-opacity-75 fw-500">108</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-3">REVENUE:</td>
                                                        <td class="text-white text-opacity-75 fw-500">$10,692</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-3 text-nowrap">PROFIT:</td>
                                                        <td class="text-white text-opacity-75 fw-500">$5,346</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex mb-2 align-items-center">
                                                    <div class="position-relative">
                                                        <div class="bg-center bg-cover bg-no-repeat w-80px h-60px" style="background-image: url(assets/img/dashboard/product-3.jpg);">
                                                        </div>
                                                        <div class="position-absolute top-0 start-0">
                                                            <span class="badge bg-theme text-theme-900 rounded-0 d-flex align-items-center justify-content-center w-20px h-20px">3</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 ps-3">
                                                        <div class="mb-1"><small class="fs-9px fw-500 lh-1 d-inline-block rounded-0 badge bg-white bg-opacity-25 text-white text-opacity-75 pt-5px">SKU20400</small></div>
                                                        <div class="text-white fw-500">White Sony PS4</div>
                                                        $599
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <table class="mb-2">
                                                    <tr>
                                                        <td class="pe-3">QTY:</td>
                                                        <td class="text-white text-opacity-75 fw-500">72</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-3">REVENUE:</td>
                                                        <td class="text-white text-opacity-75 fw-500">$43,128</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-3 text-nowrap">PROFIT:</td>
                                                        <td class="text-white text-opacity-75 fw-500">$4,312</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex mb-2 align-items-center">
                                                    <div class="position-relative">
                                                        <div class="bg-center bg-cover bg-no-repeat w-80px h-60px" style="background-image: url(assets/img/dashboard/product-4.jpg);">
                                                        </div>
                                                        <div class="position-absolute top-0 start-0">
                                                            <span class="badge bg-black bg-opacity-50 rounded-0 d-flex align-items-center justify-content-center w-20px h-20px">4</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 ps-3">
                                                        <div class="mb-1"><small class="fs-9px fw-500 lh-1 d-inline-block rounded-0 badge bg-white bg-opacity-25 text-white text-opacity-75 pt-5px">SKU19299</small></div>
                                                        <div class="text-white fw-500">Apple Watch Series 5</div>
                                                        $1,099
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <table class="mb-2">
                                                    <tr>
                                                        <td class="pe-3">QTY:</td>
                                                        <td class="text-white text-opacity-75 fw-500">53</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-3">REVENUE:</td>
                                                        <td class="text-white text-opacity-75 fw-500">$58,247</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-3 text-nowrap">PROFIT:</td>
                                                        <td class="text-white text-opacity-75 fw-500">$2,912</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="position-relative">
                                                        <div class="bg-center bg-cover bg-no-repeat w-80px h-60px" style="background-image: url(assets/img/dashboard/product-5.jpg);">
                                                        </div>
                                                        <div class="position-absolute top-0 start-0">
                                                            <span class="badge bg-black bg-opacity-50 rounded-0 d-flex align-items-center justify-content-center w-20px h-20px">5</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 ps-3">
                                                        <div class="mb-1"><small class="fs-9px fw-500 lh-1 d-inline-block rounded-0 badge bg-white bg-opacity-25 text-white text-opacity-75 pt-5px">SKU19299</small></div>
                                                        <div class="text-white fw-500">Black Nikon DSLR</div>
                                                        1,899
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td class="pe-3">QTY:</td>
                                                        <td class="text-white text-opacity-75 fw-500">50</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-3">REVENUE:</td>
                                                        <td class="text-white text-opacity-75 fw-500">$90,950</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-3 text-nowrap">PROFIT:</td>
                                                        <td class="text-white text-opacity-75 fw-500">$2,848</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
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
                                <span class="flex-grow-1">ACTIVITY LOG</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-striped table-borderless mb-2px small text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                                    You have sold an item - $1,299
                                                </span>
                                            </td>
                                            <td><small>just now</small></td>
                                            <td>
                                                <span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">PRODUCT</span>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill fs-6px text-white-transparent-3 me-2"></i>
                                                    Firewall upgrade
                                                </span>
                                            </td>
                                            <td><small>1 min ago</small></td>
                                            <td>
                                                <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">SERVER</span>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill fs-6px text-white-transparent-3 me-2"></i>
                                                    Push notification v2.0 installation
                                                </span>
                                            </td>
                                            <td><small>1 mins ago</small></td>
                                            <td>
                                                <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">ANDROID</span>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                                    New Subscription - 1yr Plan
                                                </span>
                                            </td>
                                            <td><small>1 min ago</small></td>
                                            <td>
                                                <span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">SALES</span>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill fs-6px text-white text-opacity-25 me-2"></i>
                                                    2 Unread enquiry
                                                </span>
                                            </td>
                                            <td><small>2 mins ago</small></td>
                                            <td>
                                                <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">ENQUIRY</span>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                                    $30,402 received from Paypal
                                                </span>
                                            </td>
                                            <td><small>2 mins ago</small></td>
                                            <td>
                                                <span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">PAYMENT</span>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                                    3 payment received
                                                </span>
                                            </td>
                                            <td><small>5 mins ago</small></td>
                                            <td>
                                                <span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">PAYMENT</span>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill fs-6px text-white text-opacity-25 me-2"></i>
                                                    1 pull request from github
                                                </span>
                                            </td>
                                            <td><small>5 mins ago</small></td>
                                            <td>
                                                <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">GITHUB</span>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill fs-6px text-white-transparent-3 me-2"></i>
                                                    3 pending invoice to generate
                                                </span>
                                            </td>
                                            <td><small>5 mins ago</small></td>
                                            <td>
                                                <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">INVOICE</span>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill fs-6px text-white text-opacity-25 me-2"></i>
                                                    2 new message from fb messenger
                                                </span>
                                            </td>
                                            <td><small>7 mins ago</small></td>
                                            <td>
                                                <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">INBOX</span>
                                            </td>
                                            <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                                        </tr>
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