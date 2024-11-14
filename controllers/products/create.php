<?php
// controllers/products/create.php
require_once '../../config/config.php';
require_once '../../config/database.php';

$database = new Database();
$pdo = $database->getConnection(); // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $precio = $_POST['precio'] ?? 0;
    $descripcion = $_POST['descripcion'] ?? '';
    $nombreImagen = null;

    // Manejo de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreImagen = $_FILES['imagen']['name'];
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        $rutaDestino = '../../public/images/' . $nombreImagen;

        if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
            echo "Error al subir la imagen.";
            exit();
        }
    } else {
        echo "Error en la carga de la imagen.";
    }

    // Insertar en la base de datos
    try {
        $stmt = $pdo->prepare("INSERT INTO productos (nombre, precio, descripcion, imagen) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$nombre, $precio, $descripcion, $nombreImagen])) {
            // Redirigir a cargar_producto.php después de guardar exitosamente
            header("Location: " . VIEWS_URL . "admin/cargar_producto.php?status=added");
        } else {
            echo "Error al insertar el producto en la base de datos.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    exit();
}

?>
