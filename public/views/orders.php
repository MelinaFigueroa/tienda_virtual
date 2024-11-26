<!--Esta es la página donde el usuario puede ver sus pedidos. Dependiendo de si es un administrador o un usuario común, puede ver todos los pedidos o solo los suyos. -->

<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once '../components/header.php';
require_once '../components/footer.php';
require_once '../../utils/orderHelper.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: auth/login.php');
    exit;
}
$user_id = $_SESSION['user_id'];

renderHeader('orders');

$userId = $_SESSION['user_id'] ?? null;
$isAdmin = $_SESSION['is_admin'] ?? false;
$orders = $isAdmin ? getAllOrders() : getUserOrders($userId);

?>

<body class="flex flex-col min-h-screen">
    <main class="flex-grow container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-green-600 mb-6">Mis Pedidos</h2>

        <?php if (!empty($orders)): ?>
            <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden mb-8">
                <thead>
                    <tr class="bg-green-600 text-white">
                        <th class="py-3 px-4 text-left">ID Pedido</th>
                        <th class="py-3 px-4 text-left">Fecha</th>
                        <th class="py-3 px-4 text-center">Total</th>
                        <th class="py-3 px-4 text-center">Estado</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $orderId => $order): ?>
                        <tr class="border-b border-gray-200">
                            <td class="py-4 px-4"><?php echo $orderId; ?></td>
                            <td class="py-4 px-4"><?php echo $order['created_at']; ?></td>
                            <td class="py-4 px-4 text-center"><?php echo $order['total']; ?> ARS</td>
                            <td class="py-4 px-4 text-center"><?php echo $order['status']; ?></td>
                            <td class="py-4 px-4 text-center">
                                <a href="/public/order.php?order_id=<?php echo $orderId; ?>" class="text-blue-600 hover:underline">Ver Detalles</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-gray-600 text-center">No tienes pedidos.</p>
        <?php endif; ?>
    </main>

    <?php renderFooter(); ?>
</body>