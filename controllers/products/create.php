<?php
// controllers/products/create.php
require_once __DIR__ . '/../../config/config.php';
require_once '../../config/database.php';
require_once '../../models/Product.php'; // Importar el modelo

// Conexión a la base de datos
$database = new Database();
$pdo = $database->getConnection();
$productModel = new Product($pdo); // Crear instancia del modelo

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $precio = floatval(str_replace([',', '$'], '', $_POST['precio']));
    $descripcion = $_POST['descripcion'] ?? '';
    $nombreImagen = null;

    // Validar campos obligatorios
    if (empty($nombre) || $precio <= 0 || empty($descripcion)) {
        header("Location: " . VIEWS_URL . "admin/cargar_producto.php?status=error_validation");
        exit();
    }

    // Manejo de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreImagen = uniqid() . '_' . $_FILES['imagen']['name'];
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        $rutaDestino = '../../public/images/' . $nombreImagen;

        if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
            header("Location: " . VIEWS_URL . "admin/cargar_producto.php?status=error_upload");
            exit();
        }
    }

    // Usar el modelo para insertar el producto
    try {
        if ($productModel->create($nombre, $precio, $descripcion, $nombreImagen)) {
            header("Location: " . VIEWS_URL . "admin/cargar_producto.php?status=added");
        } else {
            header("Location: " . VIEWS_URL . "admin/cargar_producto.php?status=error_insert");
        }
    } catch (Exception $e) {
        header("Location: " . VIEWS_URL . "admin/cargar_producto.php?status=error_exception");
    }
    exit();
}
