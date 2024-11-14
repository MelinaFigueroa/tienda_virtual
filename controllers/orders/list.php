<!-- Este archivo permite listar todos los pedidos de un usuario o, si se trata de un administrador, todos los pedidos en el sistema. -->

<?php
session_start();
require_once '../../utils/orderHelper.php';

$userId = $_SESSION['user_id'] ?? null;
$isAdmin = $_SESSION['is_admin'] ?? false;

if ($isAdmin) {
    $orders = getAllOrders(); // Obtener todos los pedidos si es administrador
} elseif ($userId) {
    $orders = getUserOrders($userId); // Obtener los pedidos del usuario específico
} else {
    echo json_encode(['error' => 'Usuario no autenticado']);
    exit;
}

echo json_encode($orders); // Devuelve los pedidos en formato JSON
?>
