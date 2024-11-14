<!--lógica para eliminar un producto del carrito -->

<?php
session_start();
require_once '../../utils/cartHelper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = (int) ($_POST['index'] ?? -1);

    if (isset($_SESSION['carrito'][$index])) {
        unset($_SESSION['carrito'][$index]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar array
    }
}

header('Location: ../../public/views/carrito.php');
exit;
?>
