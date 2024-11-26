<?php
require_once __DIR__ . '/../../config/config.php';
require_once '../components/header.php';
require_once '../components/footer.php';

renderHeader('register');
?>

<body class="flex flex-col min-h-screen">

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8 bg-gray-100">
        <div class="flex items-center justify-center min-h-screen">
            <div class="w-full max-w-md bg-white p-8 rounded-md shadow-md mx-auto">
                <h2 class="text-2xl font-bold mb-6 text-center text-green-600">Crear Cuenta</h2>

                <!-- Contenedor para el mensaje de error -->
                <div id="errorMessage" class="text-red-600 font-semibold text-center mb-4 hidden"></div>

                <form id="registerForm" class="space-y-4">
                    <div>
                        <label for="name" class="block text-gray-700 font-medium">Nombre</label>
                        <input type="text" name="name" id="name" required class="w-full p-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring focus:border-green-500" placeholder="Ingrese su nombre">
                    </div>

                    <div>
                        <label for="username" class="block text-gray-700 font-medium">Apellido</label>
                        <input type="text" name="username" id="username" required class="w-full p-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring focus:border-green-500" placeholder="Ingrese su apellido">
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-medium">Email</label>
                        <input type="email" name="email" id="email" required class="w-full p-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring focus:border-green-500" placeholder="Ingrese su email">
                    </div>

                    <div class="relative">
                        <label for="password" class="password" class="block text-gray-700 font-medium">Contraseña</label>
                        <input type="password" name="password" id="password" required autocomplete="off" class="w-full p-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring focus:border-green-500 pr-10">
                        <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none" onclick="togglePasswordVisibility('password')">
                            <img id="togglePasswordIcon" src="../icons/visibility_off.svg" alt="Toggle visibility" class="h-5 w-5">
                        </button>
                    </div>

                    <div id="passwordRequirements" class="text-red-500 text-sm hidden">La contraseña debe tener al menos 8 caracteres y un número.</div>
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md">Registrarse</button>
                </form>

                <p class="text-center text-gray-600 mt-4">
                    ¿Ya tienes una cuenta? <a href="login.php" class="text-blue-600 hover:underline">Iniciar sesión</a>
                </p>
            </div>
        </div>
    </main>

    <!-- Modal de éxito -->
    <?php include '../components/successModal.php'; ?>

    <!--scripts-->
    <script src="../js/modals/registerModal.js"></script>
    <script src="../js/passwordVisibility.js"></script>
</body>

<?php
renderFooter();
?>