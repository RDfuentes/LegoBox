<!-- Script para generar aleatoriamente el codigo -->
<script>
    <?php
    $caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
    $desordenada = str_shuffle($caracteres);
    $aleatory_code = substr($desordenada, 1, 27);
    ?>
</script>

<?php if (isset($_GET["adm"]) && $_GET["adm"] == "passwordreset") : ?>

    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">

                <div class="jumbotron" style="background-color:white; width:80%; height:100%; margin-top:40px; margin-left:10%">
                    <h1><strong>LegoBox</strong><img src="img/legobox.png" alt="" style='width:1em; height: 1em;'> </h1>
                    <h5>NEWSOFT</h5>

                    <form method="post" action="./?action=admin&adm=passwordreset">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="email">Correo electrónico</label>
                                        <input type="text" class="form-control" id="email" placeholder="Ingrese correo electronico" name="email" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group" style="display: none;">
                                        <input type="text" class="form-control" value="<?php echo $aleatory_code; ?>" id="olvido_pass_iden" name="olvido_pass_iden" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt10 btn-block"><i class="fa fa-check"></i> PROCESAR</button>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <a class="btn btn-danger mt10 btn-block" href="./"><i class="fa fa-times"></i> REGRESAR</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php elseif (isset($_GET["adm"]) && $_GET["adm"] == "resetpassword") : ?>

    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">

                <div class="jumbotron" style="background-color:white; width:80%; height:100%; margin-top:40px; margin-left:10%">
                    <h1><strong>LegoBox</strong><img src="img/legobox.png" alt="" style='width:1em; height: 1em;'> </h1>
                    <h5>NEWSOFT</h5>

                    <form method="post" action="./?action=admin&adm=resetpassword">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="password">Restablecer contraseña</label>
                                        <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="confirm_password" placeholder="Repita contraseña" name="confirm_password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group" style="display: none;">
                                        <input type="text" class="form-control" value="<?php echo $_REQUEST['recoverycode']; ?>" id="olvido_pass_iden" name="olvido_pass_iden" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt10 btn-block"><i class="fa fa-check"></i> PROCESAR</button>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <a class="btn btn-danger mt10 btn-block" href="./"><i class="fa fa-times"></i> REGRESAR</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>