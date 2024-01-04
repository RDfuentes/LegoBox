<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="newUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserLabel">Editar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="./?action=admin&adm=update" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label>Nombres completos</label>
                                    <input type="text" class="form-control" value="<?php echo $adm->nombres; ?>" placeholder="" name="nombres" required>
                                    <input type="hidden" name="admin_id" value="<?php echo $adm->id; ?>">
                                    <div class="invalid-feedback">
                                        Por favor ingresa nombres completos
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label>Apellidos completos</label>
                                    <input type="text" class="form-control" value="<?php echo $adm->apellidos; ?>" placeholder="" name="apellidos" required>
                                    <div class="invalid-feedback">
                                        Por favor ingresa apellidos completos
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input type="text" class="form-control" value="<?php echo $adm->email; ?>" placeholder="" name="email" required>
                                    <div class="invalid-feedback">
                                        Por favor ingresa correo electrónico
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" value="<?php echo $adm->usuario; ?>" placeholder="" name="usuario" required>
                                    <div class="invalid-feedback">
                                        Por favor ingresa usuario
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" placeholder="" name="password" required>
                                    <div class="invalid-feedback">
                                        Por favor ingresa contraseña
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12" style="display: none;">
                                <div class="form-group">
                                    <label>Nombre de quien realiza cambio</label>
                                    <input type="text" class="form-control" value="<?php echo $admin->nombres; ?>" name="created_by" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="theestado">Estado</label>
                                    <select name="estado" class="form-control" id="" required>
                                        <option value="">-- SELECCIONE --</option>
                                        <option value="1">ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor selecciona el estado del registro
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>