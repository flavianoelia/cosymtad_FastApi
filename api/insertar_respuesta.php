<?php
include_once "../lib/dbRespuesta.php"; // ruta correcta
include_once "../lib/util.php"; // Si usás funciones como cabecera o para devolver JSON

cabecera(); // Esto debe incluir los headers como application/json, CORS, etc.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    if (
        isset($data['respuesta']) &&
        isset($data['pregunta']) &&
        isset($data['encuesta']) &&
        isset($data['encuestado'])
    ) {
        $respuesta = new Respuesta();
        $respuesta->set_respuesta($data['respuesta']);
        $respuesta->set_pregunta($data['pregunta']);
        $respuesta->set_encuesta($data['encuesta']);
        $respuesta->set_encuestado($data['encuestado']);

        $res = $respuesta->add();

        if ($res) {
            echo json_encode([
                "status" => "success",
                "message" => "Respuesta insertada correctamente"
            ]);
        } else {
            http_response_code(500);
            echo json_encode([
                "status" => "error",
                "message" => "Error al insertar la respuesta"
            ]);
        }

    } else {
        http_response_code(400);
        echo json_encode([
            "status" => "error",
            "message" => "Faltan datos obligatorios"
        ]);
    }

} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        "status" => "error",
        "message" => "Método no permitido"
    ]);
}
?>
