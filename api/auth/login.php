// api/auth/login.php
<?php
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

$data = json_decode(file_get_contents("php://input"));

if(empty($data->username) || empty($data->password)) {
    http_response_code(400);
    echo json_encode(["message" => "Datos incompletos"]);
    exit();
}

$username = Validators::sanitizeInput($data->username);
$password = $data->password;

$result = $user->login($username, $password);

if($result) {
    $token = JWT::encode([
        "id" => $result['id'],
        "username" => $result['username'],
        "exp" => time() + (60 * 60) // Token válido por 1 hora
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