<!-- Este archivo contiene las funciones auxiliares para manejar las operaciones de los pedidos. -->

<?php
function createOrder($userId, $items, $total) {
    // En una implementación real, aquí se insertaría el pedido en la base de datos
    // Aquí simulamos un pedido guardado en la sesión
    if (!isset($_SESSION['orders'])) {
        $_SESSION['orders'] = [];
    }

    $orderId = uniqid();
    $_SESSION['orders'][$orderId] = [
        'user_id' => $userId,
        'items' => $items,
        'total' => $total,
        'status' => 'pendiente',
        'created_at' => date('Y-m-d H:i:s')
    ];

    return $orderId;
}

function getOrderDetails($orderId) {
    return $_SESSION['orders'][$orderId] ?? null;
}

function updateOrderStatus($orderId, $newStatus) {
    if (isset($_SESSION['orders'][$orderId])) {
        $_SESSION['orders'][$orderId]['status'] = $newStatus;
        return true;
    }
    return false;
}

function deleteOrder($orderId) {
    if (isset($_SESSION['orders'][$orderId])) {
        unset($_SESSION['orders'][$orderId]);
        return true;
    }
    return false;
}

function getAllOrders() {
    return $_SESSION['orders'] ?? [];
}

function getUserOrders($userId) {
    return array_filter($_SESSION['orders'] ?? [], function($order) use ($userId) {
        return $order['user_id'] === $userId;
    });
}
?>
