<!-- Header -->
<?php
session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/cors.php';
require_once 'components/header.php';
require_once 'components/footer.php';

// Renderizar el header indicando la página actual
renderHeader('index');

$database = new Database();
$pdo = $database->getConnection();
?>

<body class="flex flex-col min-h-screen">

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="text-center mb-12 bg-green-50 py-12 rounded-lg shadow-md">
            <h1 class="text-5xl font-bold mb-4 text-green-600">Tu GrowShop Online</h1>
            <p class="text-xl text-gray-700 mb-6">Compra fácil, rápido y seguro, con la mejor calidad para tus cultivos</p>
            <a href="<?php echo VIEWS_URL; ?>catalogo.php" class="bg-green-600 text-white font-bold py-3 px-8 rounded-md shadow hover:bg-green-700 transition duration-300">
                Ver Catálogo
            </a>
        </section>
        
        <!-- Featured Products -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Productos Destacados</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php
                // Consulta a la base de datos para productos destacados
                $stmt = $pdo->prepare("SELECT * FROM productos WHERE destacado = 1 LIMIT 3");
                $stmt->execute();
                $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($productos as $producto) {
                    echo '
            <article class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 overflow-hidden">
                <img src="images/' . htmlspecialchars($producto['imagen']) . '" alt="' . htmlspecialchars($producto['nombre']) . '" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2 text-gray-700">' . htmlspecialchars($producto['nombre']) . '</h3>
                    <p class="text-gray-600 mb-4">' . htmlspecialchars($producto['descripcion']) . '</p>
                    <p class="font-bold text-green-600">' . htmlspecialchars($producto['precio']) . ' ARS</p>
                </div>
            </article>';
                }
                ?>
            </div>
        </section>
        <!-- Promotions Section -->
         <section class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Ofertas y Promociones</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php
        // Consulta a la base de datos para productos en oferta
        $stmt = $pdo->prepare("SELECT * FROM productos WHERE oferta = 1 LIMIT 3");
        $stmt->execute();
        $ofertas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($ofertas as $oferta) {
            echo '
            <article class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 overflow-hidden">
                <img src="images/' . htmlspecialchars($oferta['imagen']) . '" alt="' . htmlspecialchars($oferta['nombre']) . '" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2 text-gray-700">' . htmlspecialchars($oferta['nombre']) . '</h3>
                    <p class="text-gray-600 mb-4">' . htmlspecialchars($oferta['descripcion']) . '</p>
                    <p class="font-bold text-green-600">' . htmlspecialchars($oferta['precio']) . ' ARS</p>
                </div>
            </article>';
        }
        ?>
    </div>
</section>
</main>

    <!-- Footer -->
    <?php
    // Renderizar el footer
    renderFooter();
    ?>
</body>
