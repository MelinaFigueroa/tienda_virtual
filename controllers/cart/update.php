<!-- actualizar la cantidad de un producto en el carrito -->

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../../utils/cartHelper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = (int) ($_POST['index'] ?? -1);
    $cantidad = (int) ($_POST['cantidad'] ?? 1);

    if (isset($_SESSION['carrito'][$index]) && $cantidad > 0) {
        $_SESSION['carrito'][$index]['cantidad'] = $cantidad;
    }
}

// Redirige de vuelta al carrito después de agregar el producto
header('Location: ../../public/views/carrito.php?status=updated');
exit;
?>