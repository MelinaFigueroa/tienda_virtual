<?php
// api/crud/read.php
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

$stmt = $user->read();
$num = $stmt->rowCount();

if ($num > 0) {
    $users_arr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $user_item = array(
            "id" => $id,
            "username" => $username,
            "email" => $email,
            "created_at" => $created_at
        );

        array_push($users_arr, $user_item);
    }

    http_response_code(200);
    echo json_encode($users_arr);
} else {
    http_response_code(404);
    echo json_encode(["message" => "No se encontraron usuarios"]);
}
