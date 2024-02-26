    <?php if (isset($_SESSION["admin_id"])) :
        $admin = AdminData::getById($_SESSION["admin_id"]);

        // Incluimos modales
        include('modals/add-view.php');
        include('modals/edit-view.php');

        // Obtén los permisos del rol_id y decodificamos
        $permisosJson = PermisosData::getById($admin->rol_id)->permisos;

        // Decodifica la cadena JSON a un arreglo de PHP
        $permisosArray = json_decode($permisosJson);

        // Consulta exitencia de data
        $conexion = Database::getCon();
        $consulta = "SELECT * FROM permisos";
        $resultado = mysqli_query($conexion, $consulta);
        $total = mysqli_num_rows($resultado);

        // Consulta la data de la tabal permisos
        $sql = "SELECT pp.*
        FROM permisos AS pp";

        $result = $conexion->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        $data_json = json_encode(array("data" => $data));
    ?>

        <div class="main-content">
            <div class="container-fluid">

                <?php if (in_array("ver_permisos", $permisosArray)) : ?>
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">

                            <div class="row justify-content-between mb-3">
                                <div class="col-auto">
                                    <h5 class="mt-2">PERMISOS</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="col-auto">
                                        <?php if (in_array("crear_permisos", $permisosArray)) : ?>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newPermiso">
                                                <span data-bs-toggle="tooltip" data-bs-offset="0,1" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Crear nuevo permiso</span>"><i class="fas fa-plus"></i></span>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <?php if ($total != 0) : ?>
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="tablaDatos" class="table data-table table-striped">
                                                <thead>
                                                    <tr class="text-nowrap">
                                                        <th>No.</th>
                                                        <th>Nombre permiso</th>
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
                                                        'data': 'nombre'
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
                                                            <?php if (in_array("editar_permisos", $permisosArray)) : ?>
                                                                return '<button class="btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#editPermiso" onclick="mostrarID(' + data.id + ')"><i class="fa fa-edit"></i></button>';
                                                            <?php else : ?>
                                                                return '<span></span>';
                                                            <?php endif; ?>
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

                                        function mostrarID(id) {
                                            $.ajax({
                                                url: 'http://localhost/sistemasmvc/LegoBox/core/app/action/getDataPermisos-action.php?id=' + id,
                                                type: 'GET',
                                                dataType: 'json',
                                                success: function(data) {

                                                    var id = data.data[0].id;
                                                    var nombre = data.data[0].nombre;
                                                    var permisos = data.data[0].permisos;
                                                    var estado = data.data[0].estado;
                                                    console.log(permisos);

                                                    // Asigna el valor al input en tu modal
                                                    $('#id').val(id);
                                                    $('#nombre').val(nombre);
                                                    $('#permisos').val(permisos);
                                                    $('#estado').val(estado);

                                                },
                                                error: function(error) {
                                                    console.error('Error en la solicitud AJAX: ', error);
                                                }
                                            });
                                        }
                                    </script>

                                </div> <!-- end card body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                <?php else : ?>
                    <div class="text-center">
                        <h4 class="alert alert-danger"><strong>RESTRINGIDO</strong></h4>
                        <meta http-equiv="refresh" content="1; url=./">
                    </div>
                <?php endif; ?>

            </div> <!-- container-fluid -->
        </div> <!-- main-content -->

    <?php endif; ?>