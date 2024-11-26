<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/config.php';

function renderHeader($currentPage = '')
{
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="[Tu descripción aquí]">

        <!-- Favicon -->
        <link rel="icon" href="<?php echo URL_FAVICON; ?>" type="image/x-icon">

        <!-- Fuentes -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

        <!-- Iconos -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous">

        <!-- Estilos personalizados -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>">

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <title>Bienvenidos a Armonía Verde</title>
    </head>

    <body class="flex flex-col min-h-screen">
        <header class="header bg-white shadow">
            <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Ajusta el tamaño del logo aquí -->
                    <img src="<?php echo LOGO_URL; ?>" alt="Logo" class="w-10 h-10"> <!-- Cambiado a w-10 h-10 para un tamaño mayor -->
                    <!-- Título del sitio -->
                    <span class="text-lg font-semibold text-green-600">Armonía Verde</span>
                </div>

                <!-- Menú de navegación para pantallas grandes -->
                <ul class="hidden md:flex space-x-6">
                    <li><a href="<?php echo BASE_URL; ?>" class="<?php echo $currentPage === 'inicio' ? 'text-blue-600' : 'hover:text-blue-600'; ?>">Inicio</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>catalogo.php" class="<?php echo $currentPage === 'catalogo' ? 'text-blue-600' : 'hover:text-blue-600'; ?>">Catálogo</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>carrito.php" class="<?php echo $currentPage === 'carrito' ? 'text-blue-600' : 'hover:text-blue-600'; ?>">Carrito</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>contacto.php" class="<?php echo $currentPage === 'contacto' ? 'text-blue-600' : 'hover:text-blue-600'; ?>">Contacto</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>sobreNosotros.php" class="<?php echo $currentPage === 'nosotros' ? 'text-blue-600' : 'hover:text-blue-600'; ?>">Nosotros</a></li>
                </ul>

                <!-- Opciones de autenticación en pantallas grandes -->
                <div class="hidden md:flex items-center space-x-4 relative">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="flex flex-col items-start">
                            <span class="text-gray-700">Bienvenido, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 1): ?>
                                <!-- Mostrar Panel de Administración solo para administradores -->
                                <a href="<?php echo VIEWS_URL; ?>admin/admin_panel.php" class="text-blue-600 hover:underline mt-2">Panel de Administración</a>
                            <?php endif; ?>
                        </div>
                        <a href="<?php echo BASE_URL; ?>public/auth/logout.php" class="text-red-600 hover:text-red-800" id="logoutButton">Cerrar sesión</a>
                    <?php else: ?>
                        <a href="<?php echo BASE_URL; ?>public/auth/login.php" class="text-blue-600 hover:text-blue-800">Iniciar sesión</a>
                        <a href="<?php echo BASE_URL; ?>public/auth/register.php" class="text-blue-600 hover:text-blue-800">Registrarse</a>
                    <?php endif; ?>
                </div>

                <!-- Menú Hamburguesa para pantallas pequeñas -->
                <button id="menuToggle" class="md:hidden text-gray-700">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>

            <!-- Opciones de autenticación en pantallas pequeñas, fuera del menú móvil -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="md:hidden flex justify-end space-x-4 px-4 py-2">
                    <span class="text-gray-700">Bienvenido, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                    <a href="<?php echo BASE_URL; ?>public/auth/logout.php" class="text-red-600 hover:text-red-800" id="mobileLogoutButton">Cerrar sesión</a>
                </div>
            <?php else: ?>
                <div class="md:hidden flex justify-end space-x-4 px-4 py-2">
                    <a href="<?php echo BASE_URL; ?>public/auth/login.php" class="text-blue-600 hover:text-blue-800">Iniciar sesión</a>
                    <a href="<?php echo BASE_URL; ?>public/auth/register.php" class="text-blue-600 hover:text-blue-800">Registrarse</a>
                </div>
            <?php endif; ?>

            <!-- Menú móvil oculto por defecto -->
            <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>
            <div id="mobileMenu" class="hidden md:hidden fixed right-0 top-0 w-4/5 bg-white p-4 z-50 shadow-lg rounded-lg">
                <button id="closeMenu" class="text-gray-700 mb-4">
                    <i class="fas fa-times"></i>
                </button>
                <ul class="space-y-4">
                    <li><a href="<?php echo BASE_URL; ?>" class="text-blue-600">Inicio</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>catalogo.php" class="text-blue-600">Catálogo</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>carrito.php" class="text-blue-600">Carrito</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>contacto.php" class="text-blue-600">Contacto</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>sobreNosotros.php" class="text-blue-600">Nosotros</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- Usuario autenticado en menú móvil -->
                        <li class="flex flex-col items-start">
                            <span class="text-gray-700">Bienvenido, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 1): ?>
                                <a href="<?php echo VIEWS_URL; ?>admin/admin_panel.php" class="text-blue-600 hover:underline mt-2">Panel de Administración</a>
                            <?php endif; ?>
                            <a href="<?php echo BASE_URL; ?>public/auth/logout.php" class="text-red-600 hover:text-red-800" id="logoutButton">Cerrar sesión</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </header>
        <!-- Modal de éxito -->


        <!--scripts-->
        <!-- <script src="../js/modals/logout.js"></script> -->

        <!-- JavaScript para el menú hamburguesa -->
        <script>
            // Función para mostrar el menú y el overlay
            function openMenu() {
                document.getElementById("mobileMenu").classList.remove("hidden");
                document.getElementById("overlay").classList.remove("hidden");
            }

            // Función para cerrar el menú y el overlay
            function closeMenu() {
                document.getElementById("mobileMenu").classList.add("hidden");
                document.getElementById("overlay").classList.add("hidden");
            }

            // Abrir el menú al hacer clic en el ícono de menú
            document.getElementById("menuToggle").addEventListener("click", openMenu);

            // Cerrar el menú al hacer clic en el ícono de cerrar
            document.getElementById("closeMenu").addEventListener("click", closeMenu);

            // Cerrar el menú al hacer clic en el overlay
            document.getElementById("overlay").addEventListener("click", closeMenu);
        </script>


    </body>

    </html>
<?php
}
?>