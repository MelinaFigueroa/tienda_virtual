<!-- mostrará los detalles de un pedido específico basado en el order_id -->

<?php
session_start();
require_once '../../utils/orderHelper.php';

if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    $orderDetails = getOrderDetails($orderId);

    if ($orderDetails) {
        echo json_encode($orderDetails); // Devuelve los detalles del pedido en formato JSON
    } else {
        echo json_encode(['error' => 'Pedido no encontrado']);
    }
} else {
    echo json_encode(['error' => 'ID de pedido no especificado']);
}
?>