<?php
require_once '../components/header.php';
require_once '../components/footer.php';

renderHeader('login');
?>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-md shadow-md mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center text-green-600">Iniciar Sesión</h2>

            <!-- Contenedor para el mensaje de error -->
            <div id="errorMessage" class="text-red-600 font-semibold text-center mb-4 hidden"></div>

            <form id="loginForm" class="space-y-4">
                <div>
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" name="email" id="email" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-green-500">
                </div>

                <div class="relative">
                    <label for="password" class="block text-gray-700 font-medium">Contraseña</label>
                    <input type="password" name="password" id="password" required class="w-full p-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring focus:border-green-500 pr-10">
                    <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none" onclick="togglePasswordVisibility('password')">
                        <img id="togglePasswordIcon" src="../icons/visibility_off.svg" alt="Toggle visibility" class="h-5 w-5">
                    </button>
                    <div id="passwordRequirements" class="text-red-500 text-sm hidden">La contraseña debe tener al menos 8 caracteres y un número.</div>
                </div>

                <button type="submit" class="w-full bg-green-600 text-white p-3 rounded-md font-bold hover:bg-green-700 transition duration-300">Iniciar Sesión</button>

            </form>

            <p class="text-center text-gray-600 mt-4">
                ¿No tienes una cuenta? <a href="register.php" class="text-blue-600 hover:underline">Registrarse</a>
            </p>
        </div>
    </div>

    <!-- Modal de éxito -->
    <?php include '../components/successModal.php'; ?>

    <!--scripts-->
    <script src="../js/modal.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/passwordVisibility.js"></script>


    <?php
    renderFooter();
    ?>