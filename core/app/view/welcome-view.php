<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
$admin = AdminData::getById($_SESSION["admin_id"]);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="jumbotron" style="background-color:white; width:80%; height:100%; margin-top:40px; margin-left:10%">
                <div class="text-center">
                    <!-- Tìtulo nivel 1 -->
                    <h1><strong>LegoBox </strong><img src="img/legobox.png" alt="" style='width:1em; height: 1em;'> </h1>
                    <!-- parrafo con condicion de ser Administrador o Usuario -->
                    <?php if ($admin->admin == 1) : ?>
                        <span>Bienvenido: <strong>Administrador</strong></span><br>
                    <?php else : ?>
                        <span>Bienvenido: <strong>Usuario Final</strong></span><br>
                    <?php endif ?>
                    <!-- Enlace a la pagina "register_admin" del id "adm" en la sección "all" -->
                    <a href="./?view=register_admin&adm=all" class="btn btn-danger">CRUD</a>
                </div>
            </div>
        </div>
    </div>
</div>