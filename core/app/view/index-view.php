<body style="background-attachment: fixed;
  background-position: center center;
  background-size: cover;
  background-image: url(./img/fondo.png);">

    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">

                <div class="jumbotron" style="background-color:white; width:80%; height:120%; margin-top:100px; margin-left:10%">
                    <h1><strong>LegoBox </strong><img src="img/legobox.png" alt="" style='width:1em; height: 1em;'> </h1>
                    <h5 class="text-center">NEWSOFT</h5>

                    <form method="post" action="./?action=admin&adm=login">
                        <h3><strong>INICIO DE SESIÓN</strong></h3>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <p class="btn btn-default" disabled><i class="fa fa-user"></i></p>
                                </span>
                                <input type="text" class="form-control" id="theusername" placeholder="Usuario" name="usuario" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a class="btn btn-default" disabled><i class="fa fa-lock"></i></a>
                                </span>
                                <input type="password" class="form-control" id="thepassworduser" placeholder="Contraseña" name="password" required>
                                <span class="input-group-btn">
                                    <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
                                </span>
                            </div>
                            <h6><a href="./?view=reiniciarpassword&adm=passwordreset">OLVIDE MI CONTRASEÑA</a></h6>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt10 btn-block"><i class="fa fa-check"></i> INICIAR SESION</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>