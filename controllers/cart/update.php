<!-- actualizar la cantidad de un producto en el carrito -->

<?php
session_start();
require_once '../../utils/cartHelper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = (int) ($_POST['index'] ?? -1);
    $cantidad = (int) ($_POST['cantidad'] ?? 1);

    if (isset($_SESSION['carrito'][$index]) && $cantidad > 0) {
        $_SESSION['carrito'][$index]['cantidad'] = $cantidad;
    }
}

header('Location: ../../public/views/carrito.php');
exit;
?>
