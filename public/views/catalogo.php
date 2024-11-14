<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../components/header.php';
require_once '../components/footer.php';
require_once '../../config/database.php'; // Asegúrate de que el archivo de conexión a la base de datos esté bien ubicado

renderHeader('catalogo');

// Conexión a la base de datos
$database = new Database();
$pdo = $database->getConnection();

// Obtener productos desde la base de datos
$query = "SELECT * FROM productos";
$stmt = $pdo->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="flex-grow container mx-auto px-4 py-8">
    <section class="text-center mb-8">
        <h2 class="text-3xl font-bold text-green-600 mb-4">Nuestro Catálogo</h2>
        <p class="text-gray-600">Explora nuestra selección de productos de alta calidad para cultivo y jardinería.</p>
    </section>

    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($products as $product): ?>
            <article class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden">
                <img src="<?php echo BASE_URL . 'images/' . $product['imagen']; ?>" alt="<?php echo htmlspecialchars($product['nombre']); ?>" class="w-full h-48 object-cover mb-4">
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2"><?php echo htmlspecialchars($product['nombre']); ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($product['descripcion']); ?></p>
                    <p class="font-bold text-green-600 mb-4"><?php echo number_format($product['precio'], 2); ?> ARS</p>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- Mostrar el formulario si el usuario está autenticado -->
                        <form method="POST" action="<?php echo BASE_CONTROLLERS; ?>cart/add.php">
                            <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($product['nombre']); ?>">
                            <input type="hidden" name="precio" value="<?php echo htmlspecialchars($product['precio']); ?>">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" name="cantidad" value="1" min="1" class="w-16 p-1 text-center border rounded-md mb-4">
                            <button type="submit" class="w-full bg-green-600 text-white p-2 rounded-md font-bold hover:bg-green-700 transition duration-300">
                                Agregar al carrito
                            </button>
                        </form>
                    <?php else: ?>
                        <!-- Mostrar el botón que abre el modal si el usuario no está autenticado -->
                        <button onclick="mostrarLoginRequeridoModal()" class="w-full bg-green-600 text-white p-2 rounded-md font-bold hover:bg-green-700 transition duration-300">
                            Agregar al carrito
                        </button>
                    <?php endif; ?>

                </div>
            </article>
        <?php endforeach; ?>
    </section>
</main>

<?php renderFooter(); ?>


<?php include '../components/successModal.php'; ?>
<script src="../js/notification.js"></script>
<script src="../js/catalogo.js"></script>
