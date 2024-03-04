<header id="page-topbar">
    <div class="navbar-header">

        <div class="navbar-brand-box">
            <a href="#" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="assets/images/legobox.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="assets/images/legobox.png" alt="" height="29">
                </span>
            </a>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
            <?php if (isset($_SESSION["admin_id"])) : $admin = AdminData::getById($_SESSION["admin_id"]); ?>
                <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <?php
                $img_src = 'https://ui-avatars.com/api/?name= Ronald Fuentes';
                ?>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="<?php echo $img_src; ?>" alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo $admin->nombres; ?></span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Perfil</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="./?action=admin&adm=logout"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Cerrar Sesión</span></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</header>