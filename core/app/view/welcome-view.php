<?php
include "./core/app/helpers/session_helper.php";
$sesionAdminData = validarSesionAdmin();
?>

<?php if ($sesionAdminData) : ?>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">INICIO</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Sistema LegoBox</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- start row -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div style="background-color:#0d3e66; color:aliceblue;">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-4">
                                    <p>Hola, <br> Bievenido(a) al Sistema LegoBox</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $img_src = "https://ui-avatars.com/api/{$sesionAdminData['userName']}";
                    ?>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <img class="img-thumbnail rounded-circle" src="<?php echo $img_src; ?>" alt="Header Avatar">
                                </div>
                                <h5 class="font-size-15 text-truncate"><?php echo $sesionAdminData['userName']; ?></h5>
                                <p class="text-muted mb-0 text-truncate">ID: <?php echo $sesionAdminData['userId']; ?></p>
                                <?php
                                echo "<p>Permisos:</p>";
                                echo "<ul>";
                                foreach ($sesionAdminData['permissions'] as $perm) {
                                    echo "<li>{$perm}</li>";
                                }
                                echo "</ul>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <?php if (in_array("asignar_producto", $sesionAdminData['permissions'])) : ?>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Espacio Uno</p>
                                            <h4 class="mb-0">470</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-error font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Espacio Dos</p>
                                        <h4 class="mb-0">350</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title">
                                                <i class="bx bx-user-plus font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Espacio Tres</p>
                                        <h4 class="mb-0">52</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title">
                                                <i class="bx bx-user-x font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
<?php endif; ?>