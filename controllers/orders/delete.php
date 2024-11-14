<!-- Este archivo permite eliminar un pedido específico -->

<?php
session_start();
require_once '../../utils/orderHelper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['order_id'] ?? null;

    if ($orderId) {
        $deleted = deleteOrder($orderId);

        if ($deleted) {
            echo json_encode(['success' => 'Pedido eliminado']);
        } else {
            echo json_encode(['error' => 'No se pudo eliminar el pedido']);
        }
    } else {
        echo json_encode(['error' => 'ID de pedido no especificado']);
    }
}
?>
