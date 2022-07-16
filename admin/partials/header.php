<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?= dirname($_SERVER["PHP_SELF"]); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <h4 class="text-white">Personal Checking System</h4>
                    </span>
                    <span class="logo-lg">
                        <h4 class="text-white">Personal Checking System</h4>
                    </span>
                </a>

                <a href="<?= dirname($_SERVER["PHP_SELF"]); ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <h4 class="text-white">Personal Checking System</h4>
                    </span>
                    <span class="logo-lg">
                        <h4 class="text-white">Personal Checking System</h4>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/administrator.png" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">user<?= $_SESSION['random']; ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="../index.php"><i class="ri-lock-unlock-line align-middle me-1"></i> กลับสู่หน้าหลัก</a>
                    <hr>
                    <a class="dropdown-item text-danger" href="#" id="logout"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>