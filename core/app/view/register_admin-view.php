<!-- Vuelve resposive la vista -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Script para busqueda en tabla -->
<script src="./res/js/search.js" type="text/javascript"></script>

<?php if (isset($_GET["adm"]) && $_GET["adm"] == "all") :
    $admin = AdminData::getById($_SESSION["admin_id"]);
    $admins = AdminData::getAll();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2 class="text-center">
                    <p class="alert alert-success"><strong>ADMINISTRADORES DEL SISTEMA</strong></p>
                </h2>

                <div class="col-md-12" style="height: 100%; overflow: auto">

                    <input type="text" class="form-control pull-right" style="width:30%" id="search" placeholder="Buscar..."><br><br>

                    <table class="table table-bordered" id="mytable" cellspacing="0">
                        <thead>
                            <th>No.</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </thead>
                        <?php foreach ($admins as $adm) : ?>
                            <tr>
                                <td><?php echo 1 + $cont++; ?></td>
                                <td><?php echo $adm->nombres; ?></td>
                                <td><?php echo $adm->apellidos; ?></td>
                                <td><?php echo $adm->usuario; ?></td>
                                <td>
                                    <?php if ($adm->estado == 1) : ?>
                                        <span class="label label-success">Activo</span>
                                    <?php else : ?>
                                        <span class="label label-danger">Inactivo</span>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="./?view=register_admin&adm=edit&id=<?php echo $adm->id; ?>" class="btn btn-xs btn-default">✏️ Editar</a>
                                    <a href="./?action=admin&adm=delete&id=<?php echo $adm->id; ?>" class="btn btn-xs btn-default">❌</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div><br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-6">
                                <a href="./?view=register_admin&adm=register" class="btn btn-success btn-block"><i class="fa fa-plus"></i> NUEVO ADMINISTRADOR</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <a href="./?view=welcome" class="btn btn-danger btn-block"><i class="fa fa-arrow-left"></i> REGRESAR</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php elseif (isset($_GET["adm"]) && $_GET["adm"] == "register") :
    $admin = AdminData::getById($_SESSION["admin_id"]);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2 class="text-center">
                    <p class="alert alert-success"><strong>NUEVO ADMINISTRADOR</strong></p>
                </h2>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="./?action=admin&adm=register">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control" placeholder="" name="nombres" required>
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" placeholder="" name="apellidos" required>
                                </div>
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" placeholder="" name="usuario" required>
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" placeholder="" name="password" required>
                                </div>
                                <div style="display: none;">
                                    <div class="form-group">
                                        <label>Nombre de quien realiza cambio</label>
                                        <input type="text" class="form-control" value="<?php echo $admin->nombres; ?>" name="created_by" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6 col-md-6">
                                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> REGISTRAR</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6  col-md-6">
                                        <a class="btn btn-danger mt10 btn-block" href="./?view=register_admin&adm=all"><i class="fa fa-arrow-left"></i> REGRESAR</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php elseif (isset($_GET["adm"]) && $_GET["adm"] == "edit") :
    $admin = AdminData::getById($_SESSION["admin_id"]);
    $adm = AdminData::getById($_GET["id"]);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2 class="text-center">
                    <p class="alert alert-success"><strong>EDITAR ADMINISTRADOR</strong></p>
                </h2>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <form method="post" action="./?action=admin&adm=update">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control" value="<?php echo $adm->nombres; ?>" placeholder="Nombre" name="nombres" required>
                                    <input type="hidden" name="admin_id" value="<?php echo $adm->id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" value="<?php echo $adm->apellidos; ?>" placeholder="Apellido" name="apellidos" required>
                                </div>
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" value="<?php echo $adm->usuario; ?>" placeholder="Usuario" name="usuario" required>
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" value="<?php echo $decrypt = sha1($adm->password); ?>" placeholder="Contraseña" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="theestado">Estado</label>
                                    <select name="estado" class="form-control" id="" required>
                                        <option value="">-- SELECCIONE --</option>
                                        <option value="1">ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                                    </select>
                                </div>
                                <div style="display: none;">
                                    <div class="form-group">
                                        <label>Nombre de quien realiza cambio</label>
                                        <input type="text" class="form-control" value="<?php echo $admin->nombres; ?>" name="created_by" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6 col-md-6">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-refresh"></i> ACTUALIZAR</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6 col-md-6">
                                        <a class="btn btn-danger mt10 btn-block" href="./?view=register_admin&adm=all"><i class="fa fa-arrow-left"></i> REGRESAR</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php endif; ?>