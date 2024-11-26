<?php
// public/views/admin/modificar_producto.php
session_start();
require_once __DIR__ . '/../../../config/config.php';
require_once '../../../config/database.php';
require_once '../../components/header.php';

renderHeader('modificar_producto');

$database = new Database();
$pdo = $database->getConnection();

// Obtener los datos del producto actual
$id = $_GET['id'];
$query = "SELECT * FROM productos WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<main class="container mx-auto px-4 py-12">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden p-8">
        <h2 class="text-3xl font-bold text-green-600 text-center mb-6">Modificar Producto</h2>

        <form action="../../../controllers/products/update.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-green-500" required>
            </div>

            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                <input type="number" name="precio" id="precio" value="<?php echo number_format($product['precio'], 2); ?>" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-green-500" required>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-green-500"><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
            </div>

            <div>
                <label for="imagen" class="block text-sm font-medium text-gray-700 mb-1">Imagen del Producto</label>
                <input type="file" name="imagen" id="imagen" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-green-500">
                <?php if ($producto['imagen']): ?>
                    <p>Imagen actual: <img src="<?php echo BASE_URL . '/images/' . $producto['imagen']; ?>" alt="Imagen del producto" class="h-16 w-16 object-cover"></p>
                <?php endif; ?>
            </div>

            <div class="text-center">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300">Actualizar Producto</button>
            </div>
        </form>
    </div>
</main>

<?php
require_once '../../components/footer.php';
renderFooter();
?>