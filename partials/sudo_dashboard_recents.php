<?php
/*
 *   Crafted On Wed Jan 11 2023
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
?>
<div class="col-xl-6">
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex fw-bold small mb-3">
                <span class="flex-grow-1">Resources Status</span>
                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-borderless mb-2px small text-nowrap">
                    <tbody>
                        <tr>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    🌡️ RAM Usage:
                                </span>
                            </td>
                            <td>
                                <span class="badge d-block bg-lime text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo $memusage; ?>%</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    🌡️ RAM Total:
                                </span>
                            </td>
                            <td>
                                <span class="badge d-block bg-lime text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo $memtotal; ?>GB</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    🌡️ RAM Used:
                                </span>
                            </td>
                            <td>
                                <span class="badge d-block bg-lime text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo $memused; ?>GB</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    🌡️ RAM Available:
                                </span>
                            </td>
                            <td>
                                <span class="badge d-block bg-lime text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo $memavailable; ?>GB</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    🖥️ CPU Usage:
                                </span>
                            </td>
                            <td>
                                <span class="badge d-block bg-lime text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo $cpuload; ?>%</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    💽 Hard Disk Usage:
                                </span>
                            </td>
                            <td>
                                <span class="badge d-block bg-lime text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo $diskusage; ?>%</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    💽 Hard Disk Total:
                                </span>
                            </td>
                            <td>
                                <span class="badge d-block bg-lime text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo $disktotal; ?>GB</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    💽 Hard Used Total:
                                </span>
                            </td>
                            <td>
                                <span class="badge d-block bg-lime text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo $diskused; ?>GB</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    💽 Hard Free Total:
                                </span>
                            </td>
                            <td>
                                <span class="badge d-block bg-lime text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo $diskfree; ?>GB</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    🖥️ CPU Threads:
                                </span>
                            </td>
                            <td>
                                <span class="badge d-block bg-lime text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px"><?php echo $cpu_count; ?></span>
                            </td>
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
                <span class="flex-grow-1">Database & Web Server Status</span>
                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-borderless mb-2px small text-nowrap">
                    <tbody>
                        <tr>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    <?php echo $memory_usage; ?>
                                </span>
                            </td>
                            <td>
                            </td>
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