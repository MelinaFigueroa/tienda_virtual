<!--lógica para eliminar un producto del carrito -->

<?php
require_once __DIR__ . '/../../config/config.php';
require_once '../../utils/cartHelper.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = (int) ($_POST['index'] ?? -1);

    if (isset($_SESSION['carrito'][$index])) {
        unset($_SESSION['carrito'][$index]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar array
    }
}

header('Location: ../../public/views/carrito.php?status=deleted');
exit;
?>