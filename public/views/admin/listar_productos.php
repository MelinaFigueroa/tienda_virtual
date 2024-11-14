<?php
session_start();
require_once '../../../config/config.php';
require_once '../../../config/database.php';
require_once '../../components/header.php';

renderHeader('listar_productos');

$database = new Database();
$pdo = $database->getConnection();

// Obtener productos
$query = "SELECT * FROM productos";
$stmt = $pdo->prepare($query);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden p-8">
        <h2 class="text-3xl font-bold text-green-600 text-center mb-6">Lista de Productos</h2>

        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md text-center">
                <p>Producto cargado exitosamente.</p>
            </div>
        <?php endif; ?>

        <?php if (count($productos) > 0): ?>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border-b py-4 px-6 text-sm font-semibold text-gray-600">Nombre</th>
                        <th class="border-b py-4 px-6 text-sm font-semibold text-gray-600">Precio</th>
                        <th class="border-b py-4 px-6 text-sm font-semibold text-gray-600">Descripción</th>
                        <th class="border-b py-4 px-6 text-sm font-semibold text-gray-600">Imagen</th>
                        <th class="border-b py-4 px-6 text-sm font-semibold text-gray-600 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td class="border-b py-4 px-6"><?php echo htmlspecialchars($producto['nombre']); ?></td>
                            <td class="border-b py-4 px-6"><?php echo htmlspecialchars($producto['precio']); ?></td>
                            <td class="border-b py-4 px-6"><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                            <td class="border-b py-4 px-6">
                                <?php if ($producto['imagen']): ?>
                                    <img src="<?php echo BASE_URL . 'images/' . $producto['imagen']; ?>" alt="Imagen del producto" class="h-16 w-16 object-cover">
                                <?php else: ?>
                                    Sin imagen
                                <?php endif; ?>
                            </td>
                            <td class="border-b py-4 px-6 text-center">
                                <!-- Botón de Modificar -->
                                <form action="<?php echo VIEWS_URL;?>admin/modificar_producto.php" method="GET" class="inline-block">
                                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700 transition">Modificar</button>
                                </form>

                                <!-- Botón de Eliminar -->
                                <button onclick="confirmDeleteModal(<?php echo $producto['id']; ?>)" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition ml-2">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-gray-500">No hay productos cargados.</p>
        <?php endif; ?>
    </div>
</main>

<?php 
require_once '../../components/footer.php';
renderFooter();
?>

<?php include '../../components/successModal.php'; ?>
<script src="../../js/modalConfig.js"></script>
<script src="../../js/adminNotification.js"></script>
