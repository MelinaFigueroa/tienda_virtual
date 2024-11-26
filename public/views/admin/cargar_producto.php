<?php
session_start();
require_once __DIR__ . '/../../../config/config.php';
require_once '../../components/header.php';
renderHeader('cargar_producto');
?>

<main class="container mx-auto px-4 py-12">
    <div class="max-w-xl mx-auto bg-white shadow-lg rounded-xl overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-6">
            <h2 class="text-3xl font-bold text-white">Cargar Nuevo Producto</h2>
        </div>

        <div class="p-8">
            <!-- Formulario para cargar el producto -->
            <form method="POST" action="../../../controllers/products/create.php" enctype="multipart/form-data" class="space-y-6">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre del Producto</label>
                    <input type="text" name="nombre" id="nombre" class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:border-green-500" placeholder="Ej. Maceta de cerámica" required>
                </div>

                <div>
                    <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">$</span>
                        </div>
                        <input type="number" name="precio" id="precio" class="w-full border border-gray-300 rounded-md p-3 pl-8 focus:outline-none focus:border-green-500" placeholder="Ej. 1500" required>
                    </div>
                </div>

                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:border-green-500" placeholder="Descripción del producto..."></textarea>
                </div>

                <div>
                    <label for="imagen" class="block text-sm font-medium text-gray-700 mb-1">Imagen del Producto</label>
                    <div class="flex items-center justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="imagen" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                    <span>Subir imagen</span>
                                    <input id="imagen" name="imagen" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">o arrastrar y soltar</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 5MB</p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-md transition duration-300">
                        Guardar Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
require_once '../../components/footer.php';
renderFooter();
?>

<?php include '../../components/successModal.php'; ?>
<script src="../../js/adminNotification.js"></script>