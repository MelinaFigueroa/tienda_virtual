<?php
require_once '../middleware/auth.php';
require_once '../controllers/cart/view.php';
require_once '../controllers/cart/add.php';
require_once '../controllers/cart/remove.php';
require_once '../controllers/orders/create.php';
require_once '../utils/Router.php';

// Rutas públicas
Router::get('/', function () {
    return header ('index');
});

// Rutas privadas (requieren autenticación)
Router::group(['middleware' => 'auth'], function() {
    if (!Auth::validateToken()) {
        header("Location: /Proyecto-PHP-1/public/auth/login.php");
        exit;
    }

    Router::get('/carrito', function() {
        include '../controllers/cart/view.php';
    });

    Router::post('/carrito/agregar', function() {
        include '../controllers/cart/add.php';
    });

    Router::post('/carrito/eliminar', function() {
        include '../controllers/cart/remove.php';
    });

    Router::post('/pedido', function() {
        include '../controllers/orders/create.php';
    });

});
Router::dispatch();
