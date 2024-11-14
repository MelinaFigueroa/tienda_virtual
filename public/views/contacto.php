<!-- contacto.php -->
<?php
require_once '../components/header.php';
require_once '../components/footer.php';

renderHeader('contacto');
?>

<body class="flex flex-col min-h-screen">
    <main class="flex-grow container mx-auto px-4 py-8">
        <form class="bg-white p-6 rounded-lg shadow-md space-y-6">
            <fieldset class="space-y-4">
                <legend class="text-2xl font-bold text-green-600 mb-4">Contáctanos</legend>
                
                <!-- Campo de Nombre -->
                <label for="nombre" class="block font-medium text-gray-700">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej. Juan Pérez" class="w-full p-2 border border-gray-300 rounded-md">
                
                <!-- Campo de Email -->
                <label for="email" class="block font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" placeholder="Ej. ejemplo@correo.com" class="w-full p-2 border border-gray-300 rounded-md">
                
                <!-- Campo de Teléfono -->
                <label for="telefono" class="block font-medium text-gray-700">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Ej. (123) 456-7890" class="w-full p-2 border border-gray-300 rounded-md">
                
                <!-- Campo de Mensaje -->
                <label for="mensaje" class="block font-medium text-gray-700">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí" class="w-full p-2 border border-gray-300 rounded-md"></textarea>
                
                <!-- Botón de Enviar -->
                <button type="submit" class="w-full bg-green-600 text-white p-2 rounded-md font-bold hover:bg-green-700 transition duration-300">
                    Enviar
                </button>
            </fieldset>
        </form>
    </main>

    <?php renderFooter(); ?>
</body>
