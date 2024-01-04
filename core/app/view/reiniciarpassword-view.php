<!-- Script para generar aleatoriamente el codigo -->
<script>
    <?php
    $caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
    $desordenada = str_shuffle($caracteres);
    $aleatory_code = substr($desordenada, 1, 27);
    ?>
</script>

<?php if (isset($_GET["adm"]) && $_GET["adm"] == "passwordreset") : ?>

    <?php if (isset($_SESSION["admin_id"])) : ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/sistemasmvc/LegoBox/?view=welcome">
    <?php else : ?>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">

                            <div class="row text-center p-5">
                                <h1><strong>LegoBox</strong></h1>
                                <h5>NEWSOFT</h5>
                            </div>

                            <div class="card-body pt-0">
                                <div class="p-0">
                                    <form method="post" action="./?action=admin&adm=passwordreset" class="needs-validation" novalidate>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Correo electrónico</label>
                                            <div class="col-md-12">
                                                <input type="email" class="form-control" id="email" name="email" required autocomplete="email" autofocus>
                                                <div class="invalid-feedback">
                                                    Por favor ingresa correo electrónico
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col-md-12">
                                                <div class="form-group" style="display: none;">
                                                    <input type="text" class="form-control" value="<?php echo $aleatory_code; ?>" id="olvido_pass_iden" name="olvido_pass_iden" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 d-grid">
                                            <button type="submit" class="btn btn-primary mt10 btn-block"><i class="fa fa-check"></i> RECUPERAR CONTRASEÑA</button>
                                        </div>
                                        <div class="d-grid">
                                            <a class="btn btn-link" href="./?view=index" style="color: #0d3e66;">REGRESAR</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php elseif (isset($_GET["adm"]) && $_GET["adm"] == "resetpassword") : ?>

    <?php if (isset($_SESSION["admin_id"])) : ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/sistemasmvc/LegoBox/?view=welcome">
    <?php else : ?>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">

                            <div class="row text-center p-5">
                                <h1><strong>LegoBox</strong></h1>
                                <h5>NEWSOFT</h5>
                            </div>

                            <div class="card-body pt-0">
                                <div class="p-0">
                                    <form method="post" action="./?action=admin&adm=resetpassword" class="needs-validation" novalidate>
                                        <div class="mb-3">
                                            <label class="form-label">Contraseña</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" id="password" name="password" required autofocus autocomplete="current-password">
                                                <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                <div class="invalid-feedback">
                                                    Por favor ingresa contraseña
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Repita contraseña</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required autocomplete="current-password">
                                                <div class="invalid-feedback">
                                                    Por favor repite contraseña
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col-md-12">
                                                <div class="form-group" style="display: none;">
                                                    <input type="text" class="form-control" value="<?php echo $_REQUEST['recoverycode']; ?>" id="olvido_pass_iden" name="olvido_pass_iden" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 d-grid">
                                            <button type="submit" class="btn btn-primary mt10 btn-block"><i class="fa fa-check"></i> RESTABLECER</button>
                                        </div>
                                        <div class="d-grid">
                                            <a class="btn btn-link" href="./?view=index" style="color: #0d3e66;">CANCELAR</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>