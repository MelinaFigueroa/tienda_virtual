// api/crud/read_one.php
<?php
require_once '../../config/cors.php';
require_once '../../config/database.php';
require_once '../../middleware/auth.php';
require_once '../../models/User.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(["message" => "Método no permitido"]);
    exit();
}

// Validar token
Auth::validateToken();

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$user->id = isset($_GET['id']) ? $_GET['id'] : die();

if($user->readOne()) {
    $user_arr = array(
        "id" => $user->id,
        "username" => $user->username,
        "email" => $user->email,
        "created_at" => $user->created_at
    );
    
    http_response_code(200);
    echo json_encode($user_arr);
} else {
    http_response_code(404);
    echo json_encode(["message" => "Usuario no encontrado"]);
}