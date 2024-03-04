<div class="modal fade" id="editPermiso" tabindex="-1" aria-labelledby="newUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserLabel">Editar permiso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="./?action=permisos&perm=update" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label>Nombres del permiso</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    <input type="hidden" name="permiso_id" id="id">
                                    <div class="invalid-feedback">
                                        Por favor ingresa nombres completos
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="theestado">Estado</label>
                                    <select name="estado" class="form-control" id="estado" required>
                                        <option value="">-- SELECCIONE --</option>
                                        <option value="1">ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor selecciona el estado del registro
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" value="<?php echo $sesionAdminData['userName']; ?>" name="created_by" required>
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