<?php
// api/crud/update.php
require_once '../../config/cors.php';
require_once '../../config/database.php';
require_once '../../middleware/auth.php';
require_once '../../models/User.php';
require_once '../../utils/validators.php';

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
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

if (!empty($data->email)) {
    if (!Validators::validateEmail($data->email)) {
        http_response_code(400);
        echo json_encode(["message" => "Email inválido"]);
        exit();
    }
    $user->email = Validators::sanitizeInput($data->email);
}

if (!empty($data->username)) {
    $user->username = Validators::sanitizeInput($data->username);
}

if ($user->update()) {
    http_response_code(200);
    echo json_encode(["message" => "Usuario actualizado"]);
} else {
    http_response_code(503);
    echo json_encode(["message" => "No se pudo actualizar el usuario"]);
}
