<!-- public/views/admin_panel.php -->
<?php 
require_once '../../components/header.php';
renderHeader('admin_panel');

// Verifica si el usuario está en sesión y si tiene el rol de administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 1) {
    // Redirige al usuario al login si no está autenticado o no es administrador
    header('Location: ' . BASE_URL . 'auth/login.php');
    exit;
}

// ID del usuario (opcional si necesitas su ID)
$user_id = $_SESSION['user_id'];
?>

<main class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-green-600 mb-6">Panel de Administración</h2>
    
    <nav>
        <ul class="mb-8 space-y-2">
            <li>
                <a href="cargar_producto.php" class="text-blue-600 hover:underline">
                    Cargar Producto
                </a>
            </li>
            <li>
                <a href="listar_productos.php" class="text-blue-600 hover:underline">
                    Gestionar Productos
                </a>
            </li>
            <li>
                <a href="ver_pedidos.php" class="text-blue-600 hover:underline">
                    Ver Pedidos
                </a>
            </li>
        </ul>
    </nav>
    
    <!-- Contenido adicional del panel -->
</main>

<?php 
require_once '../../components/footer.php';
renderFooter();
 ?>