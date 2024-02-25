<?php

function UpdateIdAdmin($id)
{
    // Verificar si se proporciona un ID
    if ($id === null) {
        $error = json_encode(array("error" => "Se requiere proporcionar un ID."));
        header('Content-Type: application/json');
        http_response_code(400); // Bad Request
        echo $error;
        return;
    }

    // Establece conexión
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_datos = "legobox";

    $conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

    // CONSULTA LA DATA DE LA TABLA ADMINISTRADOR
    $sql = "SELECT pp.*
            FROM permisos AS pp
            WHERE pp.id = $id";

    $result = $conexion->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        // Si no se encuentra ningún resultado, devolver un mensaje de error
        $error = json_encode(array("error" => "No se encontraron resultados para el ID proporcionado."));
        header('Content-Type: application/json');
        http_response_code(404); // Not Found
        echo $error;
        return;
    }

    $data_json = json_encode(array("data" => $data));

    // Envía el JSON como respuesta
    header('Content-Type: application/json');
    echo $data_json;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
UpdateIdAdmin($id);
