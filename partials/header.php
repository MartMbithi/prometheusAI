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
        </div>
        <div class="menu-item dropdown dropdown-mobile-full">

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