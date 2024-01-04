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

        <div class="main-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">

                        <div class="row justify-content-between mb-3">
                            <div class="col-auto">
                                <h5 class="mt-2">USUARIOS</h5>
                            </div>
                            <div class="col-auto">
                                <div class="col-auto">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newUser">
                                        <span data-bs-toggle="tooltip" data-bs-offset="0,1" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Crear nuevo usuario</span>"><i class="fas fa-plus"></i></span>
                                    </button>
                                    <?php
                                    include('modals/add-view.php');
                                    ?>
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

                                <?php
                                include('modals/edit-view.php');
                                ?>

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
                                                        return '<button class="dropdown-item pointer btn-sm" onclick="loadUserData(' + data.id + ')" data-bs-toggle="modal" data-bs-target="#editUser"><i class="fa fa-edit"></i></button>';
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

                            </div> <!-- end card body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div> <!-- main-content -->

    <?php endif; ?>