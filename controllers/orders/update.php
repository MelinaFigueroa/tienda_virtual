<!-- se usa para actualizar el estado de un pedido, útil para un administrador o para actualizar el estado del pedido en la base de datos -->

<?php
session_start();
require_once '../../utils/orderHelper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['order_id'] ?? null;
    $newStatus = $_POST['status'] ?? null;

    if ($orderId && $newStatus) {
        $updated = updateOrderStatus($orderId, $newStatus);

        if ($updated) {
            echo json_encode(['success' => 'Estado del pedido actualizado']);
        } else {
            echo json_encode(['error' => 'No se pudo actualizar el pedido']);
        }
    } else {
        echo json_encode(['error' => 'Datos de entrada incompletos']);
    }
}
?>