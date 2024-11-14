<?php
session_start();
require_once '../../../config/config.php';
require_once '../../components/header.php';
renderHeader('cargar_producto');
?>

<main class="container mx-auto px-4 py-12">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden p-8">
        <h2 class="text-3xl font-bold text-green-600 text-center mb-6">Cargar Nuevo Producto</h2>
        
        <!-- Formulario para cargar el producto -->
        <form action="<?php echo BASE_CONTROLLERS; ?>products/create.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-green-500" placeholder="Ej. Maceta de cerámica" required>
            </div>

            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                <input type="number" name="precio" id="precio" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-green-500" placeholder="Ej. 1500" required>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-green-500" placeholder="Descripción del producto..."></textarea>
            </div>

            <div>
                <label for="imagen" class="block text-sm font-medium text-gray-700 mb-1">Imagen del Producto</label>
                <input type="file" name="imagen" id="imagen" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-green-500">
            </div>

            <div class="text-center">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md transition duration-300">Guardar Producto</button>
            </div>
        </form>
    </div>
</main>

<?php 
require_once '../../components/footer.php';
renderFooter();
?>

<?php include '../../components/successModal.php'; ?>
<!-- Script para activar el modal -->
<script src="../../js/adminNotification.js"></script>
