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
                                <form method="post" action="./?action=admin&adm=login" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Usuario</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="usuario" name="usuario" required autocomplete="usuario" autofocus>
                                            <div class="invalid-feedback">
                                                Por favor ingresa usuario
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Contraseña</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                                            <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            <div class="invalid-feedback">
                                                Por favor ingresa contraseña
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 d-grid">
                                        <button type="submit" class="btn btn-primary mt10 btn-block"><i class="fa fa-check"></i> INICIAR SESION</button>
                                    </div>
                                    <div class="d-grid">
                                        <a class="btn btn-link" href="./?view=reiniciarpassword&adm=passwordreset" style="color: #0d3e66;">OLVIDE MI CONTRASEÑA</a>
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