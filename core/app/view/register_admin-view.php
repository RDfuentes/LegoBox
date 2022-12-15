<?php if (isset($_GET["adm"]) && $_GET["adm"] == "all") :
    $admin = AdminData::getById($_SESSION["admin_id"]);
    $admins = AdminData::getAll();
?>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">

                <h3>
                    <p class="alert alert-danger"><strong>ADMINISTRADORES DEL SISTEMA</strong></p>
                </h3>

                <?php if (count($admins) > 0) : ?>
                    <div class="col-md-12" style="height: 450px; overflow: auto">
                        <table class="table table-bordered" id="mytable" cellspacing="0" style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
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
                            </tbody>
                        </table>
                    </div>
                <?php

                else : ?>
                    <br>
                    <p class="alert alert-danger"><strong>NO SE ENCONTRARON REGISTROS</strong></p>
                <?php endif; ?>

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

<?php elseif (isset($_GET["adm"]) && $_GET["adm"] == "register") :
    $admin = AdminData::getById($_SESSION["admin_id"]);
?>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">

                <h3>
                    <p class="alert alert-danger"><strong>NUEVO ADMINISTRADOR</strong></p>
                </h3>

                <form method="post" action="./?action=admin&adm=register">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control" placeholder="" name="nombres" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" placeholder="" name="apellidos" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input type="text" class="form-control" placeholder="" name="email" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" placeholder="" name="usuario" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" placeholder="" name="password" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6" style="display: none;">
                                <div class="form-group">
                                    <label>Nombre de quien realiza cambio</label>
                                    <input type="text" class="form-control" value="<?php echo $admin->nombres; ?>" name="created_by" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> REGISTRAR</button>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <a class="btn btn-danger mt10 btn-block" href="./?view=register_admin&adm=all"><i class="fa fa-arrow-left"></i> REGRESAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php elseif (isset($_GET["adm"]) && $_GET["adm"] == "edit") :
    $admin = AdminData::getById($_SESSION["admin_id"]);
    $adm = AdminData::getById($_GET["id"]);
?>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">

                <h4>
                    <p class="alert alert-danger"><strong>EDITAR ADMINISTRADOR</strong></p>
                </h4>

                <form method="post" action="./?action=admin&adm=update">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control" value="<?php echo $adm->nombres; ?>" placeholder="Nombre" name="nombres" required>
                                    <input type="hidden" name="admin_id" value="<?php echo $adm->id; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" value="<?php echo $adm->apellidos; ?>" placeholder="Apellido" name="apellidos" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input type="text" class="form-control" value="<?php echo $adm->email; ?>" placeholder="Correo" name="email" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" value="<?php echo $adm->usuario; ?>" placeholder="Usuario" name="usuario" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6" style="display: none;">
                                <div class="form-group">
                                    <label>Nombre de quien realiza cambio</label>
                                    <input type="text" class="form-control" value="<?php echo $admin->nombres; ?>" name="created_by" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="theestado">Estado</label>
                                    <select name="estado" class="form-control" id="" required>
                                        <option value="">-- SELECCIONE --</option>
                                        <option value="1">ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-refresh"></i> ACTUALIZAR</button>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <a class="btn btn-danger mt10 btn-block" href="./?view=register_admin&adm=all"><i class="fa fa-arrow-left"></i> REGRESAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php endif; ?>