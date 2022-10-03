    <meta name="viewport" content="width=device-width, initial-scale=1">

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="jumbotron" style="background-color:white; width:80%; height:100%; margin-top:40px; margin-left:10%">
                    <div class="text-center">
                        <h1><strong>LegoBox</strong><img src="img/legobox.png" alt="" style='width:1em; height: 1em;'> </h1>
                        <h5 class="text-center">ACREDICOM</h5>
                    </div>

                    <!-- Formulario POST para envio de usuario y contrarseña a controlador -->
                    <form method="post" action="./?action=admin&adm=login">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" required>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary mt10 btn-block"><i class="fa fa-check"></i> INICIAR SESION</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <a class="btn btn-danger mt10 btn-block" href="./?"><i class="fa fa-times"></i> CANCELAR</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>