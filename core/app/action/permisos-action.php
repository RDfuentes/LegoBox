<?php

if (isset($_GET["perm"]) && $_GET["perm"] == "add") {
    $p = PermisosData::getBy("nombre", $_POST["nombre"]);
    if ($p == null) {
        $permiso = new PermisosData();
        $permiso->nombre = $_POST["nombre"];
        $permiso->permisos = $_POST["permisos"];
        $permiso->created_by = $_POST["created_by"];
        $permiso->add();
        Core::alert("Permiso registrado con Exito!");
    } else {
        Core::alert("Error: Ya existe un permiso con el mismo nombre");
    }
    Core::redir("./?view=permisos/index");
} 

else if (isset($_GET["perm"]) && $_GET["perm"] == "delete") {
    $permiso = PermisosData::getById($_GET["id"]);
    $permiso->del();
    Core::alert("Permiso Eliminado con Exito!");
    Core::redir("./?view=permisos/index");
} 

else if (isset($_GET["perm"]) && $_GET["perm"] == "update") {
    $permiso = PermisosData::getById($_POST["permiso_id"]);
    $permiso->nombre = $_POST["nombre"];
    $permiso->estado = $_POST["estado"];
    $permiso->created_by = $_POST["created_by"];
    $permiso->update();
    Core::alert("Permiso Actualizado con Exito!");
    Core::redir("./?view=permisos/index");
}
