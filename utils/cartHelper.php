<?php
function addProductToCart($nombre, $precio, $cantidad) {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    foreach ($_SESSION['carrito'] as &$producto) {
        if ($producto['nombre'] === $nombre) {
            $producto['cantidad'] += $cantidad;
            return;
        }
    }

    $_SESSION['carrito'][] = [
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => $cantidad,
    ];
}

function calculateCartTotal() {
    $total = 0;
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
    }
    return $total;
}
?>
