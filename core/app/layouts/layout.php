<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>NEWSOFT</title>
  <link rel="icon" type="image/png" sizes="16x16" href="img/legobox.png">
  <link rel="stylesheet" href="res/font-awesome/css/font-awesome.min.css">
  <link href="res/bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="res/js/jquery.min.js"></script>

  <!-- Responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Script para mostrar contraseña -->
  <script type="text/javascript">
    function mostrarPassword() {
      var user = document.getElementById("thepassworduser");
      if (user.type == "password") {
        user.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
      } else {
        user.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      }
    }

    $(document).ready(function() {
      $('#ShowPassword').click(function() {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
      });
    });
  </script>

  <!-- Script para DataTable -->
  <script src="res/js/cdn.datatables.net_1.13.5_js_jquery.dataTables.min.js"></script>

  <!-- Style para DataTable -->
  <link rel="stylesheet" type="text/css" href="res/css/cdn.datatables.net_1.13.5_css_jquery.dataTables.min.css">

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <nav class="navbar navbar-default header">

          <a class="navbar-brand">
            <img src="img/legobox.png" alt="" width="30">
          </a>

          <?php if (isset($_SESSION["admin_id"])) : ?>
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
          <?php endif; ?>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
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

        <div class="content" style="margin-top:70px;">
          <?php
          View::load("index");
          ?>
        </div>

        <div class="text-center footer">
          <h6 class="alert" style="background-color: rgba(255,255,255,1); color:#144676">
            <strong>SOFTWARE DEVELOPMENT<a href="#" target="_blank" style="color:#144676"><br>NEWSOFT</a> &copy; 2023</strong>
          </h6>
        </div>

      </div>
    </div>
  </div>
</body>

<script src="res/bootstrap/js/bootstrap.min.js"></script>

<style>
  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: rgba(255, 255, 255, 1);
    color: #2c6838;
    text-align: center;
  }

  .content {
    margin-bottom: 100px;
    /* Ajusta este valor según sea necesario */
  }
</style>


<style>
  .header {
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #ffffff;
    z-index: 9999;
  }
</style>

</html>