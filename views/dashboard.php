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
require_once('../partials/head.php');
?>

<body>

    <div id="app" class="app">

        <div id="header" class="app-header">

            <div class="desktop-toggler">
                <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed" data-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>


            <div class="mobile-toggler">
                <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled" data-toggle-target=".app">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>


            <div class="brand">
                <a href="index.html" class="brand-logo">
                    <span class="brand-img">
                        <span class="brand-img-text text-theme">H</span>
                    </span>
                    <span class="brand-text">HUD ADMIN</span>
                </a>
            </div>


            <div class="menu">
                <div class="menu-item dropdown">
                    <a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app" class="menu-link">
                        <div class="menu-icon"><i class="bi bi-search nav-icon"></i></div>
                    </a>
                </div>
                <div class="menu-item dropdown dropdown-mobile-full">
                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                        <div class="menu-icon"><i class="bi bi-grid-3x3-gap nav-icon"></i></div>
                    </a>
                    <div class="dropdown-menu fade dropdown-menu-end w-300px text-center p-0 mt-1">
                        <div class="row row-grid gx-0">
                            <div class="col-4">
                                <a href="email_inbox.html" class="dropdown-item text-decoration-none p-3 bg-none">
                                    <div class="position-relative">
                                        <i class="bi bi-circle-fill position-absolute text-theme top-0 mt-n2 me-n2 fs-6px d-block text-center w-100"></i>
                                        <i class="bi bi-envelope h2 opacity-5 d-block my-1"></i>
                                    </div>
                                    <div class="fw-500 fs-10px text-white">INBOX</div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="pos_customer_order.html" target="_blank" class="dropdown-item text-decoration-none p-3 bg-none">
                                    <div><i class="bi bi-hdd-network h2 opacity-5 d-block my-1"></i></div>
                                    <div class="fw-500 fs-10px text-white">POS SYSTEM</div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="calendar.html" class="dropdown-item text-decoration-none p-3 bg-none">
                                    <div><i class="bi bi-calendar4 h2 opacity-5 d-block my-1"></i></div>
                                    <div class="fw-500 fs-10px text-white">CALENDAR</div>
                                </a>
                            </div>
                        </div>
                        <div class="row row-grid gx-0">
                            <div class="col-4">
                                <a href="helper.html" class="dropdown-item text-decoration-none p-3 bg-none">
                                    <div><i class="bi bi-terminal h2 opacity-5 d-block my-1"></i></div>
                                    <div class="fw-500 fs-10px text-white">HELPER</div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="settings.html" class="dropdown-item text-decoration-none p-3 bg-none">
                                    <div class="position-relative">
                                        <i class="bi bi-circle-fill position-absolute text-theme top-0 mt-n2 me-n2 fs-6px d-block text-center w-100"></i>
                                        <i class="bi bi-sliders h2 opacity-5 d-block my-1"></i>
                                    </div>
                                    <div class="fw-500 fs-10px text-white">SETTINGS</div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="widgets.html" class="dropdown-item text-decoration-none p-3 bg-none">
                                    <div><i class="bi bi-collection-play h2 opacity-5 d-block my-1"></i></div>
                                    <div class="fw-500 fs-10px text-white">WIDGETS</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-item dropdown dropdown-mobile-full">
                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                        <div class="menu-icon"><i class="bi bi-bell nav-icon"></i></div>
                        <div class="menu-badge bg-theme"></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end mt-1 w-300px fs-11px pt-1">
                        <h6 class="dropdown-header fs-10px mb-1">NOTIFICATIONS</h6>
                        <div class="dropdown-divider mt-1"></div>
                        <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap">
                            <div class="fs-20px">
                                <i class="bi bi-bag text-theme"></i>
                            </div>
                            <div class="flex-1 flex-wrap ps-3">
                                <div class="mb-1 text-white">NEW ORDER RECEIVED ($1,299)</div>
                                <div class="small">JUST NOW</div>
                            </div>
                            <div class="ps-2 fs-16px">
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap">
                            <div class="fs-20px w-20px">
                                <i class="bi bi-person-circle text-theme"></i>
                            </div>
                            <div class="flex-1 flex-wrap ps-3">
                                <div class="mb-1 text-white">3 NEW ACCOUNT CREATED</div>
                                <div class="small">2 MINUTES AGO</div>
                            </div>
                            <div class="ps-2 fs-16px">
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap">
                            <div class="fs-20px w-20px">
                                <i class="bi bi-gear text-theme"></i>
                            </div>
                            <div class="flex-1 flex-wrap ps-3">
                                <div class="mb-1 text-white">SETUP COMPLETED</div>
                                <div class="small">3 MINUTES AGO</div>
                            </div>
                            <div class="ps-2 fs-16px">
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap">
                            <div class="fs-20px w-20px">
                                <i class="bi bi-grid text-theme"></i>
                            </div>
                            <div class="flex-1 flex-wrap ps-3">
                                <div class="mb-1 text-white">WIDGET INSTALLATION DONE</div>
                                <div class="small">5 MINUTES AGO</div>
                            </div>
                            <div class="ps-2 fs-16px">
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap">
                            <div class="fs-20px w-20px">
                                <i class="bi bi-credit-card text-theme"></i>
                            </div>
                            <div class="flex-1 flex-wrap ps-3">
                                <div class="mb-1 text-white">PAYMENT METHOD ENABLED</div>
                                <div class="small">10 MINUTES AGO</div>
                            </div>
                            <div class="ps-2 fs-16px">
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <hr class="bg-white-transparent-5 mb-0 mt-2" />
                        <div class="py-10px mb-n2 text-center">
                            <a href="#" class="text-decoration-none fw-bold">SEE ALL</a>
                        </div>
                    </div>
                </div>
                <div class="menu-item dropdown dropdown-mobile-full">
                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                        <div class="menu-img online">
                            <img src="assets/img/user/profile.jpg" alt="Profile" height="60" />
                        </div>
                        <div class="menu-text d-sm-block d-none"><span class="__cf_email__" data-cfemail="f0858395829e919d95b09193939f859e84de939f9d">[email&#160;protected]</span></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
                        <a class="dropdown-item d-flex align-items-center" href="profile.html">PROFILE <i class="bi bi-person-circle ms-auto text-theme fs-16px my-n1"></i></a>
                        <a class="dropdown-item d-flex align-items-center" href="email_inbox.html">INBOX <i class="bi bi-envelope ms-auto text-theme fs-16px my-n1"></i></a>
                        <a class="dropdown-item d-flex align-items-center" href="calendar.html">CALENDAR <i class="bi bi-calendar ms-auto text-theme fs-16px my-n1"></i></a>
                        <a class="dropdown-item d-flex align-items-center" href="settings.html">SETTINGS <i class="bi bi-gear ms-auto text-theme fs-16px my-n1"></i></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item d-flex align-items-center" href="page_login.html">LOGOUT <i class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i></a>
                    </div>
                </div>
            </div>


            <form class="menu-search" method="POST" name="header_search_form">
                <div class="menu-search-container">
                    <div class="menu-search-icon"><i class="bi bi-search"></i></div>
                    <div class="menu-search-input">
                        <input type="text" class="form-control form-control-lg" placeholder="Search menu..." />
                    </div>
                    <div class="menu-search-icon">
                        <a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app"><i class="bi bi-x-lg"></i></a>
                    </div>
                </div>
            </form>

        </div>


        <div id="sidebar" class="app-sidebar">

            <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

                <div class="menu">
                    <div class="menu-header">Navigation</div>
                    <div class="menu-item active">
                        <a href="index.html" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="analytics.html" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-bar-chart"></i></span>
                            <span class="menu-text">Analytics</span>
                        </a>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <span class="menu-text">Email</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="email_inbox.html" class="menu-link">
                                    <span class="menu-text">Inbox</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="email_compose.html" class="menu-link">
                                    <span class="menu-text">Compose</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="email_detail.html" class="menu-link">
                                    <span class="menu-text">Detail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-header">Components</div>
                    <div class="menu-item">
                        <a href="widgets.html" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-columns-gap"></i></span>
                            <span class="menu-text">Widgets</span>
                        </a>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon">
                                <i class="bi bi-bag-check"></i>
                                <span class="w-5px h-5px rounded-3 bg-theme position-absolute top-0 end-0 mt-3px me-3px"></span>
                            </div>
                            <div class="menu-text d-flex align-items-center">POS System</div>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="pos_customer_order.html" target="_blank" class="menu-link">
                                    <div class="menu-text">Customer Order</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="pos_kitchen_order.html" target="_blank" class="menu-link">
                                    <div class="menu-text">Kitchen Order</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="pos_counter_checkout.html" target="_blank" class="menu-link">
                                    <div class="menu-text">Counter Checkout</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="pos_table_booking.html" target="_blank" class="menu-link">
                                    <div class="menu-text">Table Booking</div>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="pos_menu_stock.html" target="_blank" class="menu-link">
                                    <div class="menu-text">Menu Stock</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-controller"></i></span>
                            <span class="menu-text">UI Kits</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="ui_bootstrap.html" class="menu-link">
                                    <span class="menu-text">Bootstrap</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="ui_buttons.html" class="menu-link">
                                    <span class="menu-text">Buttons</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="ui_card.html" class="menu-link">
                                    <span class="menu-text">Card</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="ui_icons.html" class="menu-link">
                                    <span class="menu-text">Icons</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="ui_modal_notification.html" class="menu-link">
                                    <span class="menu-text">Modal & Notification</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="ui_typography.html" class="menu-link">
                                    <span class="menu-text">Typography</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="ui_tabs_accordions.html" class="menu-link">
                                    <span class="menu-text">Tabs & Accordions</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-pen"></i></span>
                            <span class="menu-text">Forms</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="form_elements.html" class="menu-link">
                                    <span class="menu-text">Form Elements</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="form_plugins.html" class="menu-link">
                                    <span class="menu-text">Form Plugins</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="form_wizards.html" class="menu-link">
                                    <span class="menu-text">Wizards</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-grid-3x3"></i></span>
                            <span class="menu-text">Tables</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="table_elements.html" class="menu-link">
                                    <span class="menu-text">Table Elements</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="table_plugins.html" class="menu-link">
                                    <span class="menu-text">Table Plugins</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-pie-chart"></i></span>
                            <span class="menu-text">Charts</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="chart_js.html" class="menu-link">
                                    <span class="menu-text">Chart.js</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="chart_apex.html" class="menu-link">
                                    <span class="menu-text">Apexcharts.js</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a href="map.html" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-compass"></i></span>
                            <span class="menu-text">Map</span>
                        </a>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-layout-sidebar"></i></span>
                            <span class="menu-text">Layout</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="layout_starter.html" class="menu-link">
                                    <span class="menu-text">Starter Page</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="layout_fixed_footer.html" class="menu-link">
                                    <span class="menu-text">Fixed Footer</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="layout_full_height.html" class="menu-link">
                                    <span class="menu-text">Full Height</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="layout_full_width.html" class="menu-link">
                                    <span class="menu-text">Full Width</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="layout_boxed_layout.html" class="menu-link">
                                    <span class="menu-text">Boxed Layout</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="layout_collapsed_sidebar.html" class="menu-link">
                                    <span class="menu-text">Collapsed Sidebar</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-collection"></i></span>
                            <span class="menu-text">Pages</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="page_scrum_board.html" class="menu-link">
                                    <span class="menu-text">Scrum Board</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="page_products.html" class="menu-link">
                                    <span class="menu-text">Products</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="page_orders.html" class="menu-link">
                                    <span class="menu-text">Orders</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="page_gallery.html" class="menu-link">
                                    <span class="menu-text">Gallery</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="page_search_results.html" class="menu-link">
                                    <span class="menu-text">Search Results</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="page_coming_soon.html" class="menu-link">
                                    <span class="menu-text">Coming Soon Page</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="page_404_error.html" class="menu-link">
                                    <span class="menu-text">404 Error Page</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="page_login.html" class="menu-link">
                                    <span class="menu-text">Login</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="page_register.html" class="menu-link">
                                    <span class="menu-text">Register</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-divider"></div>
                    <div class="menu-header">Users</div>
                    <div class="menu-item">
                        <a href="profile.html" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-people"></i></span>
                            <span class="menu-text">Profile</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="calendar.html" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-calendar4"></i></span>
                            <span class="menu-text">Calendar</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="settings.html" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-gear"></i></span>
                            <span class="menu-text">Settings</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="helper.html" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-gem"></i></span>
                            <span class="menu-text">Helper</span>
                        </a>
                    </div>
                </div>

                <div class="p-3 px-4 mt-auto">
                    <a href="documentation/index.html" target="_blank" class="btn d-block btn-outline-theme">
                        <i class="fa fa-code-branch me-2 ms-n2 opacity-5"></i> Documentation
                    </a>
                </div>
            </div>

        </div>


        <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>


        <div id="content" class="app-content">

            <div class="row">

                <div class="col-xl-3 col-lg-6">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">SITE VISITORS</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>


                            <div class="row align-items-center mb-2">
                                <div class="col-7">
                                    <h3 class="mb-0">4.2m</h3>
                                </div>
                                <div class="col-5">
                                    <div class="mt-n2" data-render="apexchart" data-type="bar" data-title="Visitors" data-height="30"></div>
                                </div>
                            </div>


                            <div class="small text-white text-opacity-50 text-truncate">
                                <i class="fa fa-chevron-up fa-fw me-1"></i> 33.3% more than last week<br />
                                <i class="far fa-user fa-fw me-1"></i> 45.5% new visitors<br />
                                <i class="far fa-times-circle fa-fw me-1"></i> 3.25% bounce rate
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


                <div class="col-xl-3 col-lg-6">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">STORE SALES</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>


                            <div class="row align-items-center mb-2">
                                <div class="col-7">
                                    <h3 class="mb-0">$35.2K</h3>
                                </div>
                                <div class="col-5">
                                    <div class="mt-n2" data-render="apexchart" data-type="line" data-title="Visitors" data-height="30"></div>
                                </div>
                            </div>


                            <div class="small text-white text-opacity-50 text-truncate">
                                <i class="fa fa-chevron-up fa-fw me-1"></i> 20.4% more than last week<br />
                                <i class="fa fa-shopping-bag fa-fw me-1"></i> 33.5% new orders<br />
                                <i class="fa fa-dollar-sign fa-fw me-1"></i> 6.21% conversion rate
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


                <div class="col-xl-3 col-lg-6">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">NEW MEMBERS</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>


                            <div class="row align-items-center mb-2">
                                <div class="col-7">
                                    <h3 class="mb-0">4,490</h3>
                                </div>
                                <div class="col-5">
                                    <div class="mt-n3 mb-n2" data-render="apexchart" data-type="pie" data-title="Visitors" data-height="45"></div>
                                </div>
                            </div>


                            <div class="small text-white text-opacity-50 text-truncate">
                                <i class="fa fa-chevron-up fa-fw me-1"></i> 59.5% more than last week<br />
                                <i class="fab fa-facebook-f fa-fw me-1"></i> 45.5% from facebook<br />
                                <i class="fab fa-youtube fa-fw me-1"></i> 15.25% from youtube
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


                <div class="col-xl-3 col-lg-6">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="d-flex fw-bold small mb-3">
                                <span class="flex-grow-1">BANDWIDTH</span>
                                <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                            </div>


                            <div class="row align-items-center mb-2">
                                <div class="col-7">
                                    <h3 class="mb-0">4.5TB</h3>
                                </div>
                                <div class="col-5">
                                    <div class="mt-n3 mb-n2" data-render="apexchart" data-type="donut" data-title="Visitors" data-height="45"></div>
                                </div>
                            </div>


                            <div class="small text-white text-opacity-50 text-truncate">
                                <i class="fa fa-chevron-up fa-fw me-1"></i> 5.3% more than last week<br />
                                <i class="far fa-hdd fa-fw me-1"></i> 10.5% from total usage<br />
                                <i class="far fa-hand-point-up fa-fw me-1"></i> 2MB per visit
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