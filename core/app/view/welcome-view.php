<?php
$admin = AdminData::getById($_SESSION["admin_id"]);
?>

<div class="container text-center">
    <div class="row">
        <div class="col-md-12">

            <div class="jumbotron" style="background-color:white; width:80%; height:100%; margin-top:40px; margin-left:10%">
                <h1><strong>LegoBox </strong><img src="img/legobox.png" alt="" style='width:1em; height: 1em;'> </h1>
                <?php if ($admin->admin == 1) : ?>
                    <span>Bienvenido: <strong>Administrador</strong></span><br>
                <?php else : ?>
                    <span>Bienvenido: <strong>Usuario Final</strong></span><br>
                <?php endif ?>
                <a href="./?view=register_admin&adm=all" class="btn btn-danger">CRUD</a>
            </div>

        </div>
    </div>
</div>