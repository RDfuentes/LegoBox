<?php

function validarSesionAdmin()
{
    if (isset($_SESSION["admin_name"])) {
        $userId = $_SESSION["admin_id"];
        $userName = $_SESSION["admin_name"];
        $adminData = [
            'userId' => $userId,
            'userName' => $userName,
            'permissions' => $_SESSION["admin_perms"],
        ];
        return $adminData;
    }

    // Si la validación falla, puedes redirigir al usuario a la página de inicio de sesión o mostrar un mensaje de error.
    Core::alert("Estas acciones no le agradan a Dios");
    Core::redir("./");
    exit();
}
