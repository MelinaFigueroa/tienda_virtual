<?php
require_once '../../components/header.php';
renderHeader('admin_panel');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 1) {
    header('Location: ' . BASE_URL . 'auth/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
?>

<main class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-green-600">Panel de Administración</h2>
            <span class="text-sm text-gray-500">Bienvenido, <?php echo $_SESSION['name'] ?? 'Administrador'; ?></span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Tarjeta de Cargar Producto -->
            <a href="cargar_producto.php" class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Cargar Producto</h3>
                    <p class="text-gray-600">Agregar nuevos productos al catálogo</p>
                </div>
            </a>

            <!-- Tarjeta de Gestionar Productos -->
            <a href="listar_productos.php" class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Gestionar Productos</h3>
                    <p class="text-gray-600">Editar o eliminar productos existentes</p>
                </div>
            </a>

            <!-- Tarjeta de Ver Pedidos -->
            <a href="ver_pedidos.php" class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Ver Pedidos</h3>
                    <p class="text-gray-600">Gestionar pedidos de clientes</p>
                </div>
            </a>
        </div>

        <!-- Panel de Estadísticas Rápidas -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Productos Activos</h4>
                <p class="text-3xl font-bold text-green-600">
                    <?php
                    // Aquí puedes agregar la lógica para contar productos
                    echo "0";
                    ?>
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Pedidos Pendientes</h4>
                <p class="text-3xl font-bold text-blue-600">
                    <?php
                    // Aquí puedes agregar la lógica para contar pedidos pendientes
                    echo "0";
                    ?>
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Total Ventas Hoy</h4>
                <p class="text-3xl font-bold text-purple-600">
                    <?php
                    // Aquí puedes agregar la lógica para sumar ventas del día
                    echo "$0";
                    ?>
                </p>
            </div>
        </div>
    </div>
</main>

<?php
require_once '../../components/footer.php';
renderFooter();
?>