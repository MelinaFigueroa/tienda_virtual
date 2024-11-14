<?php
// CORS configuration file
header("Access-Control-Allow-Origin: *"); // Permitir el acceso desde cualquier origen
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Headers permitidos
header("Access-Control-Max-Age: 86400"); // Cache de las opciones de preflight por 1 día

// Opcional: Responder a solicitudes de preflight automáticamente
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("HTTP/1.1 204 No Content");
    exit;
}
?>
