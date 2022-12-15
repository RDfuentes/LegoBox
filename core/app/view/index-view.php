    <div class="text-center">
        <div class="row">
            <div class="col-md-12">

                <div class="jumbotron" style="background-color:white; width:80%; height:100%; margin-top:40px; margin-left:10%">
                    <h1><strong>LegoBox</strong><img src="img/legobox.png" alt="" style='width:1em; height: 1em;'> </h1>
                    <h5 class="text-center">NEWSOFT</h5>

                    <!-- Formulario POST para envio de usuario y contrarseña a controlador -->
                    <form method="post" action="./?action=admin&adm=login">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="usuario">INICIO DE SESIÓN</label>
                                        <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h6><a href="./?view=reiniciarpassword&adm=passwordreset">OLVIDE MI CONTRASEÑA</a></h6>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt10 btn-block"><i class="fa fa-check"></i> INICIAR SESION</button>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <a class="btn btn-danger mt10 btn-block" href="./?"><i class="fa fa-times"></i> CANCELAR</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>