<?php
function cabecera() {
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: *"); // Cambiar "*" por un dominio específico en producción
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

    // Manejo de solicitudes OPTIONS (preflight request)
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }
}
?>
