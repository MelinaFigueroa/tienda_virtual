<?php
require_once __DIR__ . '/../../config/config.php';
require_once '../../config/database.php';


$id = $_GET['id'] ?? $_POST['id'] ?? null;

if ($id) {
    $database = new Database();
    $pdo = $database->getConnection();

    // Eliminar el producto de la base de datos
    $stmt = $pdo->prepare("DELETE FROM productos WHERE id = ?");
    if ($stmt->execute([$id])) {
        // Redirigir a la lista de productos con un mensaje de éxito
        header("Location: " . VIEWS_URL . "admin/listar_productos.php?status=deleted");
        exit();
    } else {
        echo "Error al eliminar el producto.";
    }
} else {
    echo "ID de producto no válido.";
}
