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

                            <?php foreach (permissionsUser() as $key => $permission) : ?>
                                <div class="col-md-12 col-lg-12">
                                    <div class="mb-3">
                                        <div class="card mb-3 mt-4">
                                            <div class="card-body position-relative">
                                                <h5 class="text-center text-uppercase"><?= $permission['title']; ?></h5>
                                                <hr>
                                                <div class="row">
                                                    <?php foreach ($permission['keys'] as $k => $v) : ?>
                                                        <div class="col-md-12">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" id="<?= $key ?>" type="checkbox" name="<?= $key ?>">
                                                                <label class="form-check-label" for="<?= $k ?>"><?= $v; ?></label>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <div class="form-group">
                                <input type="hidden" class="form-control" value="<?php echo $admin->usuario; ?>" name="created_by" required>
                            </div>
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