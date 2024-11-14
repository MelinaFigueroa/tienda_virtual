<?php
session_start();

require_once '../../config/cors.php';
require_once '../../config/database.php';
require_once '../../models/User.php';
require_once '../../utils/validators.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["message" => "Método no permitido"]);
    exit();
}

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$name = $_POST['name'] ?? null;
$username = $_POST['username'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (empty($name) || empty($username) || empty($email) || empty($password)) {
    http_response_code(400);
    echo json_encode(["message" => "Datos incompletos"]);
    exit();
}

if (!Validators::validateEmail($email)) {
    http_response_code(400);
    echo json_encode(["message" => "Email inválido"]);
    exit();
}

if (!Validators::validatePassword($password)) {
    http_response_code(400);
    echo json_encode(["message" => "La contraseña debe tener al menos 8 caracteres, una letra y un número"]);
    exit();
}

$user->name = Validators::sanitizeInput($name);
$user->username = Validators::sanitizeInput($username);
$user->password = $password;
$user->email = Validators::sanitizeInput($email);
$user->role_id = 2;

try {
    if ($user->create()) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;

        http_response_code(201);
        echo json_encode([
            "success" => true,
            "message" => "Usuario creado exitosamente"
        ]);
    } else {
        http_response_code(400);
        echo json_encode(["message" => "El usuario o email ya existe"]);
    }
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        http_response_code(400);
        echo json_encode(["message" => "El usuario o email ya existe"]);
    } else {
        http_response_code(503);
        echo json_encode(["message" => "Error en el servidor"]);
    }
}
