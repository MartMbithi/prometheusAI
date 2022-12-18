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
        <a href="dashboard" class="brand-logo">
            <span class="brand-img">
                <span class="brand-img-text text-theme">F</span>
            </span>
            <span class="brand-text">Financial AI</span>
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
                <div class="menu-img online">
                    <img src="../public/img/user/profile.png" alt="Profile" height="60" />
                </div>
                <div class="menu-text d-sm-block d-none">
                    <?php echo $_SESSION['user_name']; ?>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
                <button class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logout_modal">End Session <i class="bi bi-lock  ms-auto text-theme fs-16px my-n1"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="logout">
                <div class="modal-body text-center text-danger">
                    <h4>
                        Heads Up😉! <br><br>
                        Are You Sure You Want To Terminate This Session?
                    </h4>
                    <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                    <input type="submit" value="Yes, Terminate" class="text-center btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>