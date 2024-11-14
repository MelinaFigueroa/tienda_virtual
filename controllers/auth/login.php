<?php
session_start();

require_once '../../config/cors.php';
require_once '../../config/database.php';
require_once '../../models/User.php';
require_once '../../utils/jwt.php';
require_once '../../utils/validators.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["message" => "Método no permitido"]);
    exit();
}

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (empty($email) || empty($password)) {
    http_response_code(400);
    echo json_encode(["message" => "Datos incompletos"]);
    exit();
}

$email = Validators::sanitizeInput($email);

$result = $user->login($email, $password);

if ($result) {
    // Almacenar datos del usuario en la sesión
    $_SESSION['user_id'] = $result['id'];
    $_SESSION['user_name'] = $result['name'];
    $_SESSION['user_role'] = $result['role_id'];

    // Crear y devolver el token
    $token = JWT::encode([
        "id" => $result['id'],
        "email" => $result['email'],
        "exp" => time() + (60 * 60) // Expira en 1 hora
    ]);

    http_response_code(200);
    echo json_encode([
        "message" => "Login exitoso",
        "token" => $token
    ]);
} else {
    http_response_code(401);
    echo json_encode(["message" => "Credenciales inválidas"]);
}
?>
