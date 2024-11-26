<?php
require_once __DIR__ . '/../utils/jwt.php';

class Auth
{

    public static function checkAdmin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASE_URL . 'auth/login.php');
            exit;
        }
    }

    public static function validateToken()
    {
        // Verificar si hay una sesión PHP activa
        if (isset($_SESSION['user_id'])) {
            return true;
        }

        // Validación a través de JWT en encabezados
        $headers = getallheaders();
        $authorization = $headers['Authorization'] ?? '';

        if (!$authorization || !preg_match('/Bearer\s(\S+)/', $authorization, $matches)) {
            header('HTTP/1.1 401 Unauthorized');
            echo json_encode(["message" => "Unauthorized"]);
            exit;
        }

        $token = $matches[1];

        try {
            $decoded = JWT::decode($token);
            $_SESSION['user'] = $decoded; // Establecer sesión temporal para el usuario autenticado con token
            return true;
        } catch (Exception $e) {
            header('HTTP/1.1 401 Unauthorized');
            echo json_encode(["message" => "Invalid token"]);
            exit;
        }
    }
}
