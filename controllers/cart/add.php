<!--agregar producto en el carrito -->

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../../utils/cartHelper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $precio = (float) ($_POST['precio'] ?? 0);
    $cantidad = (int) ($_POST['cantidad'] ?? 1);

    if ($nombre && $precio > 0 && $cantidad > 0) {
        addProductToCart($nombre, $precio, $cantidad);
    }

    // Redirige de vuelta al catálogo después de agregar el producto
    header('Location: ../../public/views/catalogo.php?status=added');
    exit;
}
?>
