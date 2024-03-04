<div class="modal fade" id="newUser" tabindex="-1" aria-labelledby="newUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserLabel">Crear nuevo usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="./?action=admin&adm=register" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label>Nombres completos</label>
                                    <input type="text" class="form-control" placeholder="" name="nombres" required>
                                    <div class="invalid-feedback">
                                        Por favor ingresa nombres completos
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label>Apellidos completos</label>
                                    <input type="text" class="form-control" placeholder="" name="apellidos" required>
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
                                    <input type="text" class="form-control" placeholder="" name="email" required>
                                    <div class="invalid-feedback">
                                        Por favor ingresa correo electrónico
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" placeholder="" name="usuario" required>
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
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Rol</label>
                                    <select name="rol_id" class="form-control" required>
                                        <option value="">-- SELECCIONE --</option>
                                        <?php foreach (PermisosData::getAllAct() as $p) : ?>
                                            <option value="<?php echo $p->id; ?>"><?php echo $p->nombre; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="<?php echo $admin->usuario; ?>" name="created_by" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>