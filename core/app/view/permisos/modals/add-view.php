<div class="modal fade" id="newPermiso" tabindex="-1" aria-labelledby="newUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserLabel">Crear nuevo permiso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="./?action=permisos&perm=add" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label>Nombres permiso</label>
                                    <input type="text" class="form-control" placeholder="" name="nombre" required>
                                    <div class="invalid-feedback">
                                        Por favor ingresa nombre del permiso
                                    </div>
                                </div>
                            </div>

                            <?php
                            include('core/app/action/Functions.php');
                            ?>

                            <?php foreach (permissionsUser() as $key => $permission) : ?>
                                <div class="col-md-12 col-lg-12">
                                    <div class="mb-3">
                                        <div class="card mb-3 mt-4">
                                            <div class="card-body position-relative">
                                                <h5 class="text-center text-uppercase"><?= $permission['title']; ?></h5>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" name="<?= $key ?>" id="<?= $key ?>" onclick="toggle('<?= $key ?>')" />
                                                        <label class="form-check-label fw-bold" for="<?= $key ?>">Seleccionar todo</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <?php foreach ($permission['keys'] as $k => $v) : ?>
                                                        <div class="col-md-12">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input <?= $key ?>" type="checkbox" name="<?= $k ?>" id="<?= $k ?>" />
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

                            <script>
                                function toggle(key) {
                                    const checkboxes = document.querySelectorAll('.' + key);
                                    const isChecked = document.getElementById(key).checked;
                                    checkboxes.forEach(checkbox => checkbox.checked = isChecked);
                                }

                                function guardarPermisos() {
                                    const checkboxes = document.querySelectorAll("input[type=checkbox]:checked");
                                    let result = [];
                                    checkboxes.forEach(checkbox => {
                                        result.push(checkbox.name);
                                    });

                                    document.getElementById("result").value = JSON.stringify(result);
                                    document.getElementById("permissionsForm").submit();
                                }
                            </script>

                            <input type="hidden" class="form-control" name="permisos" id="result">
                            <input type="hidden" class="form-control" value="<?php echo $admin->usuario; ?>" name="created_by" required>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" onclick="guardarPermisos()" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>