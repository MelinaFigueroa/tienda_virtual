<?php

require_once __DIR__ . '/../../config/config.php';
require_once '../../utils/cartHelper.php';
require_once '../../middleware/auth.php';
require_once '../components/header.php';
require_once '../components/footer.php';



if (!isset($_SESSION['user_id'])) {
  header('Location: ' . BASE_URL . 'public/auth/login.php');
  exit;
}
$user_id = $_SESSION['user_id'];




renderHeader('carrito');

// Obtener el carrito y el total
$carrito = $_SESSION['carrito'] ?? [];
$total = calculateCartTotal();

// Generar enlace de WhatsApp
$mensaje = "Hola! Quisiera hacer el siguiente pedido: ";
foreach ($carrito as $producto) {
  $mensaje .= "\n- {$producto['nombre']} x {$producto['cantidad']} - {$producto['precio']} ARS";
}
$mensaje .= "\nTotal: {$total} ARS";
$url_whatsapp = "https://wa.me/+5492964457016?text=" . urlencode($mensaje);
?>

<main class="flex-grow container mx-auto px-4 py-8">
  <h2 class="text-3xl font-bold text-green-600 mb-6">Carrito de Compras</h2>

  <?php if (!empty($carrito)): ?>
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <thead>
          <tr class="bg-green-600 text-white">
            <th class="py-3 px-4 text-left">Producto</th>
            <th class="py-3 px-4 text-center">Precio Unitario</th>
            <th class="py-3 px-4 text-center">Cantidad</th>
            <th class="py-3 px-4 text-center">Acciones</th>
            <th class="py-3 px-4 text-center">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($carrito as $index => $producto): ?>
            <?php $subTotal = $producto['precio'] * $producto['cantidad']; ?>
            <tr class="border-b border-gray-200">
              <td class="py-4 px-4"><?php echo $producto['nombre']; ?></td>

              <td class="py-4 px-4 text-center"><?php echo number_format($producto['precio'], 2); ?>ARS</td>
              <td class="py-4 px-4 text-center">
                <form method="POST" action="../../controllers/cart/update.php" class="inline-block">
                  <input type="hidden" name="index" value="<?php echo $index; ?>">
                  <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" min="1" class="w-16 p-1 text-center border rounded-md">
                  <button type="submit" class="bg-blue-600 text-white px-2 rounded-md ml-2 hover:bg-blue-700 transition">Actualizar</button>
                </form>
              </td>
              <td class="py-4 px-4 text-center">
                <form method="POST" action="../../controllers/cart/remove.php" class="inline-block">
                  <input type="hidden" name="index" value="<?php echo $index; ?>">
                  <button type="submit" class="bg-red-600 text-white px-2 rounded-md hover:bg-red-700 transition">Eliminar</button>
                </form>
              </td>
              <td class="py-4 px-4 text-center"><?php echo number_format($subTotal, 2, ',', '.'); ?> ARS</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="flex justify-center mb-6">
      <span class="font-bold text-lg text-gray-800">Total: <?php echo number_format($total, 2, ',', '.'); ?> ARS</span>
    </div>

    <div class="flex flex-col items-end">
      <a href="<?php echo $url_whatsapp; ?>" target="_blank" class="w-full bg-green-600 text-white p-2 rounded-md font-bold hover:bg-green-700 transition duration-300 text-center">
        Enviar Pedido por WhatsApp
      </a>
    </div>
  <?php else: ?>
    <p class="text-gray-600 text-center">Tu carrito está vacío.</p>
  <?php endif; ?>
</main>


<?php renderFooter(); ?>
<?php include '../components/successModal.php'; ?>
<script src="../js/notification.js"></script>
<script src="../js/carrito.js"></script>