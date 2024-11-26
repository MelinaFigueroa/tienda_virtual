<?php
// config/config.php

// Define la ruta base absoluta del proyecto
define('BASE_URL', '/tienda-online/'); 

// Define la ruta a controllers
define('BASE_CONTROLLERS', BASE_URL . 'controllers/');

// Define la ruta de middleware
define('BASE_MIDDLEWARE', BASE_URL . 'middleware/');

// Define la ruta A views
define('VIEWS_URL', BASE_URL . 'public/views/');

// Define la ruta A js
define('SCRIPT_URL', BASE_URL . 'public/js/');

// Define la ruta absoluta del directorio raíz del proyecto
define('ROOT_PATH', dirname(__DIR__, 2));

// Define la ruta absoluta del directorio public
define('PUBLIC_PATH', dirname(__DIR__));

// define('UTILS_PATH', dirname(__DIR__) . 'utils/');

// Define la URL del logo usando BASE_URL
define('LOGO_URL', BASE_URL . 'public/logo-armonia-shop.webp');

// Define la URL del favicon
define('URL_FAVICON', BASE_URL . 'public/favicon.ico');

// Define la URL del css
define('URL_CSS', BASE_URL . 'public/css/style.css');
?>