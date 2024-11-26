<?php
// api/crud/create.php
require_once '../../config/cors.php';
require_once '../../config/database.php';
require_once '../../middleware/auth.php';
require_once '../../models/User.php';
require_once '../../utils/validators.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
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

if (empty($data->username) || empty($data->email)) {
    http_response_code(400);
    echo json_encode(["message" => "Datos incompletos"]);
    exit();
}

if (!Validators::validateEmail($data->email)) {
    http_response_code(400);
    echo json_encode(["message" => "Email inválido"]);
    exit();
}

try {
    $user->username = Validators::sanitizeInput($data->username);
    $user->email = Validators::sanitizeInput($data->email);

    if ($user->create()) {
        http_response_code(201);
        echo json_encode(["message" => "Usuario creado exitosamente"]);
    } else {
        http_response_code(503);
        echo json_encode(["message" => "No se pudo crear el usuario"]);
    }
} catch (Exception $e) {
    http_response_code(503);
    echo json_encode(["message" => "Error en el servidor"]);
}
