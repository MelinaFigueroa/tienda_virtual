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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMP3pmbIxmx2nQHIeJ/3m9HWp3G9Eap7Ahv8s1" crossorigin="anonymous">

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <title>Bienvenidos a Armonia Verde</title>
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>">
    </head>

    <body class="flex flex-col min-h-screen">
        <header class="bg-white shadow">
            <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
                <div class="flex items-center">
                    <img src="<?php echo LOGO_URL; ?>" alt="Logo" class="h-12 w-auto">
                </div>
                <ul class="flex space-x-6">
                    <li><a href="<?php echo BASE_URL; ?>" class="<?php echo $currentPage === 'inicio' ? 'text-blue-600' : 'hover:text-blue-600'; ?>">Inicio</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>catalogo.php" class="<?php echo $currentPage === 'catalogo' ? 'text-blue-600' : 'hover:text-blue-600'; ?>">Catálogo</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>carrito.php" class="<?php echo $currentPage === 'carrito' ? 'text-blue-600' : 'hover:text-blue-600'; ?>">Carrito</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>contacto.php" class="<?php echo $currentPage === 'contacto' ? 'text-blue-600' : 'hover:text-blue-600'; ?>">Contacto</a></li>
                    <li><a href="<?php echo VIEWS_URL; ?>sobreNosotros.php" class="<?php echo $currentPage === 'nosotros' ? 'text-blue-600' : 'hover:text-blue-600'; ?>">Nosotros</a></li>
                </ul>


                <ul class="flex items-center space-x-4">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="flex flex-col items-start">
                            <span class="text-gray-700">Bienvenido, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 1): ?>
                                <a href="<?php echo VIEWS_URL; ?>admin/admin_panel.php" class="text-blue-600 hover:underline mt-2">Panel de Administración</a>
                            <?php endif; ?> <a href="<?php echo BASE_URL; ?>auth/logout.php" class="text-red-600 hover:text-red-800">Cerrar sesión</a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo BASE_URL; ?>auth/login.php" class="text-blue-600 hover:text-blue-800">Iniciar sesión</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>auth/register.php" class="text-blue-600 hover:text-blue-800">Registrarse</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
    <?php
}
    ?>