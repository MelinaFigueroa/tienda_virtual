<?php
require_once '../../config/cors.php';
require_once '../../middleware/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["message" => "Método no permitido"]);
    exit();
}

// Cerrar sesión
session_start();
session_unset();
session_destroy();

http_response_code(200);
echo json_encode(["message" => "Logout exitoso"]);
exit();
