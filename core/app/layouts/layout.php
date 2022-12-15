<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <!-- Título pestaña -->
  <title>LegoBox</title>
  <!-- Icono de pestaña -->
  <link rel="icon" type="image/png" sizes="16x16" href="img/legobox.png">
  <!-- Iconos Icon -->
  <link rel="stylesheet" href="res/font-awesome/css/font-awesome.min.css">
  <!-- Agregamos Bootstrap -->
  <link href="res/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Agregamos Jquery -->
  <script src="res/js/jquery.min.js"></script>
  <!-- Agregamos Sweetalert -->
  <script type="text/javascript" src="res/js/sweetalert2@11.js"></script>
  <!-- RESPONSIVE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- BUSQUEDA -->
  <script src="./res/js/search.js" type="text/javascript"></script>
  <!-- Data Table -->
  <link rel="stylesheet" type="text/css" href="res/js/jquery.dataTables.min.css" />
  <script type="text/javascript" src="res/js/jquery.dataTables.min.js"></script>
  <!-- Css DataTable -->
  <style>
    #mytable tfoot input {
      width: 100% !important;
      border-radius: 2px;
      border: darkgray;
    }

    #mytable tfoot {
      display: table-header-group !important;
      background-color: darkgray;
    }
  </style>
  <!-- Script DataTable -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#mytable tfoot th').each(function() {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Filtrar..." />');
      });

      var table = $('#mytable').DataTable({
        "lengthMenu": [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, "All"]
        ],
        "dom": 'B<f>t<l><i><p>',
        "responsive": true,
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        "order": [
          [0, "asc"]
        ],
        "initComplete": function() {
          this.api().columns().every(function() {
            var that = this;

            $('input', this.footer()).on('keyup change', function() {
              if (that.search() !== this.value) {
                that
                  .search(this.value)
                  .draw();
              }
            });
          })
        }
      });
    });
  </script>

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <nav class="navbar navbar-default">

          <a class="navbar-brand">
            <img src="img/legobox.png" alt="" width="30">
          </a>

          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION["user_id"])) : ?>
                  <ul class="nav navbar-nav">
                    <li class="primary nav-1">
                      <a href="./?action=asociado&aso=logout">❌ CERRAR SESION</a>
                    </li>
                  </ul>
                <?php endif; ?>
              </ul>
              <?php if (isset($_SESSION["admin_id"])) : ?>
                <ul class="nav navbar-nav" style="text-align:center">
                  <li class="primary nav-1">
                    <a href="./?view=welcome">🏚️ Inicio</a>
                  </li>
                  <li class="primary nav-1">
                    <a href="./?action=admin&adm=logout">❌ Cerrar sesion</a>
                  </li>
                </ul>
              <?php endif; ?>
            </ul>
          </div>

        </nav>

        <?php
        View::load("index");
        ?>

        <div class="text-center">
          <h6 class="alert" style="background-color: rgba(255,255,255,1); color:#144676">
            <strong>NEWSOFT <a href="#" target="_blank" style="color:#144676"></a> &copy; 2023</strong>
          </h6>
        </div>

      </div>
    </div>
  </div>

  <script src="res/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>