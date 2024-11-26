<?php
// api/crud/delete.php
require_once '../../config/cors.php';
require_once '../../config/database.php';
require_once '../../middleware/auth.php';
require_once '../../models/User.php';

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405);
    echo json_encode(["message" => "Método no permitido"]);
    exit();
}

// Validar token
Auth::validateToken();

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

if (empty($data->id)) {
    http_response_code(400);
    echo json_encode(["message" => "ID requerido"]);
    exit();
}

$user->id = $data->id;

if ($user->delete()) {
    http_response_code(200);
    echo json_encode(["message" => "Usuario eliminado"]);
} else {
    http_response_code(503);
    echo json_encode(["message" => "No se pudo eliminar el usuario"]);
}
