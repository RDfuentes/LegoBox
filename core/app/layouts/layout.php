<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- Título pestaña -->
  <title>LegoBox</title>
  <!-- Icono de pestaña -->
  <link rel="icon" type="image/png" sizes="16x16" href="img/legobox.png">
  <!-- Agregamos Bootstrap -->
  <link href="res/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="res/font-awesome/css/font-awesome.min.css">
  <!-- Agregamos Jquery -->
  <script src="res/js/jquery.min.js"></script>
  <!-- Agregamos Sweetalert -->
  <script type="text/javascript" src="res/js/sweetalert2@11.js"></script>
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <img src="img/legobox.png" alt="" style='width:4em; height: 4em; margin-left: 10px;'>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <?php if (isset($_SESSION["user_id"])) : ?>
            <ul class="nav navbar-nav">
              <li class="primary nav-1">
                <a href="./?action=asociado&aso=logout">❌ CERRAR SESION</a>
              </li>
            </ul>
          <?php endif; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if (isset($_SESSION["admin_id"])) : ?>
            <ul class="nav navbar-nav">
              <li class="primary nav-1">
                <a href="./?view=welcome">MI INICIO</a>
              </li>
              <li class="primary nav-1">
                <a href="./?action=admin&adm=logout">❌ CERRAR SESION</a>
              </li>
            </ul>
          <?php endif; ?>
        </ul>
      </div>

    </div>
  </nav>

  <?php
  View::load("index");
  ?>

  <div class="text-center">
    <div class="col-md-12">
      <p class="alert" style="font-size:10px;"><strong>DEPARTAMENTO DE DESARROLLO - ACREDICOM &copy; 2022</strong></p>
    </div>
  </div>

  <script src="res/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>