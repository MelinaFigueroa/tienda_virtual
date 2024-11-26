<?php
session_start();
session_unset();
session_destroy();

// Verificar si se envió un parámetro para redirección
if (isset($_GET['redirect']) && $_GET['redirect'] === 'index') {
    header("Location: /public/index.php");
    exit();
}

// Redirigir al login por defecto si no hay un parámetro de redirección
header("Location: ../auth/login.php");
exit();
