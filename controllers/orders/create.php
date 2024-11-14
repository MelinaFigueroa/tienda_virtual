<!-- crear un nuevo pedido -->

<?php
session_start();
require_once '../../utils/orderHelper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        $userId = $_SESSION['user_id'] ?? null;
        $items = $_SESSION['carrito'];
        $total = calculateCartTotal();

        // Guardar el pedido en la base de datos o en la sesión (simulado aquí)
        $orderId = createOrder($userId, $items, $total);

        // Limpiar el carrito
        $_SESSION['carrito'] = [];

        // Redirigir a una página de confirmación
        header('Location: ../../public/views/orders.php?order_id=' . $orderId);
        exit;
    } else {
        echo "El carrito está vacío. No se puede crear un pedido.";
    }
}
?>
