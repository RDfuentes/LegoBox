<?php if (isset($_GET["adm"]) && $_GET["adm"] == "all") : ?>

    <?php if (isset($_SESSION["admin_id"])) :
        $admin = AdminData::getById($_SESSION["admin_id"]);

        // CONSULTA LA EXISTENCIA DE DATA
        $conexion = Database::getCon();
        $consulta = "SELECT * FROM administrador";
        $resultado = mysqli_query($conexion, $consulta);
        $total = mysqli_num_rows($resultado);

        // CONSULTA LA DATA DE LA TABLA ADMINISTRADOR
        $sql = "SELECT aa.*
        FROM administrador AS aa";

        $result = $conexion->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        $data_json = json_encode(array("data" => $data));
    ?>

        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-left"><strong>🟢 <?php echo $admin->usuario; ?></strong></h5>
                            <h3 class="alert alert-success"><strong>Administradores del sistema</strong></h3>
                        </div>
                    </div>

                    <div class="row">
                        <?php if ($total != 0) : ?>
                            <div class="col-md-12" style="height: 600px; overflow: auto">
                                <table id="tablaDatos" class="table table-bordered" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Usuario</th>
                                            <th>Tipo</th>
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
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody></tbody>
                                </table>
                            </div>
                        <?php else : ?>
                            <br>
                            <p class="alert alert-danger"><strong>NO SE ENCONTRARON REGISTROS</strong></p>
                        <?php endif; ?>

                        <script>
                            $(document).ready(function() {
                                var data = <?php echo $data_json; ?>;

                                $('#tablaDatos tfoot th').each(function() {
                                    var title = $(this).text();
                                    $(this).html('<input class="form-control" type="text" placeholder="Filtrar..." />');
                                });

                                $('#tablaDatos').DataTable({
                                    'data': data.data,
                                    'columns': [{
                                            'data': 'id'
                                        },
                                        {
                                            'data': 'nombres'
                                        },
                                        {
                                            'data': 'apellidos'
                                        },
                                        {
                                            'data': 'usuario'
                                        },
                                        {
                                            'data': 'admin',
                                            'render': function(data, type, row) {
                                                if (data == 1) {
                                                    return '<span class="label label-danger">Admin</span>';
                                                } else if (data == 0) {
                                                    return '<span class="label label-primary">Usuario</span>';
                                                } else {
                                                    return '';
                                                }
                                            }
                                        },
                                        {
                                            'data': 'estado',
                                            'render': function(data, type, row) {
                                                if (data == 0) {
                                                    return '<span class="label label-warning">inactivo</span>';
                                                } else if (data == 1) {
                                                    return '<span class="label label-success">activo</span>';
                                                } else {
                                                    return '';
                                                }
                                            }
                                        },
                                        {
                                            'data': null,
                                            'render': function(data, type, row) {
                                                return '<a href="./?view=register_admin&adm=edit&id=' + data.id + '" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>';
                                            }
                                        }
                                    ],
                                    'lengthMenu': [
                                        [5, 10, 25, 50, -1],
                                        [5, 10, 25, 50, "All"]
                                    ],
                                    'dom': 'B<f>t<l><i><p>',
                                    'responsive': true,
                                    'language': {
                                        'url': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                                    },
                                    'order': [
                                        [0, 'asc']
                                    ],
                                    "initComplete": function() {
                                        this.api().columns().every(function() {
                                            var that = this;

                                            $('input', this.footer()).on('keyup change', function() {
                                                if (that.search() !== this.value) {
                                                    that.search(this.value).draw();
                                                }
                                            });
                                        })
                                    }
                                });

                            });
                        </script>

                    </div>

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

    <?php endif; ?>

<?php elseif (isset($_GET["adm"]) && $_GET["adm"] == "register") :
    $admin = AdminData::getById($_SESSION["admin_id"]);
?>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-left"><strong>🟢 <?php echo $admin->usuario; ?></strong></h5>
                        <h3 class="alert alert-success"><strong>NUEVO ADMINISTRADOR</strong></h3>
                    </div>
                </div>

                <div class="row">
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

                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-left"><strong>🟢 <?php echo $admin->usuario; ?></strong></h5>
                            <h3 class="alert alert-success"><strong>EDITAR ADMINISTRADOR</strong></h3>
                        </div>
                    </div>

                    <div class="row">
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
        </div>
    <?php endif; ?>