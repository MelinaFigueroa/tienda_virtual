<!--devuelve los datos del carrito, que se pueden cargar desde la vista -->

<?php
// Incluir la configuración de rutas
require_once __DIR__ . '/../../config/config.php';
require_once '../../utils/cartHelper.php';

// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Obtener el contenido del carrito
$carrito = $_SESSION['carrito'] ?? [];
$total = calculateCartTotal();

// Retorna los datos del carrito como JSON si deseas hacer llamadas AJAX
header('Content-Type: application/json');
echo json_encode([
    'carrito' => $carrito,
    'total' => $total
]);
?>