<?php
// controllers/products/update.php
require_once '../../config/database.php';

$database = new Database();
$pdo = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $nombreImagen = null;

    // Manejo de la imagen (opcional)
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreImagen = $_FILES['imagen']['name'];
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        $rutaDestino = '../../public/images/' . $nombreImagen;

        move_uploaded_file($rutaTemporal, $rutaDestino);
    }

    // Actualizar producto en la base de datos
    $query = "UPDATE productos SET nombre = ?, precio = ?, descripcion = ?, imagen = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nombre, $precio, $descripcion, $nombreImagen, $id]);

    header("Location: ../../public/views/admin/listar_productos.php?status=updated");
    exit();
}
?>
