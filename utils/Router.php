<?php
class Router
{
    private static $routes = [];

    public static function get($uri, $callback)
    {
        self::addRoute('GET', $uri, $callback);
    }

    public static function post($uri, $callback)
    {
        self::addRoute('POST', $uri, $callback);
    }

    public static function group($options, $callback)
    {
        if (isset($options['middleware']) && $options['middleware'] === 'auth') {
            if (!Auth::validateToken()) {
                header("Location: /tienda-online/public/auth/login.php");
                exit();
            }
        }
        $callback();
    }

    private static function addRoute($method, $uri, $callback)
    {
        // Convertir parámetros de ruta {param} a expresiones regulares
        $uri = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_]+)', $uri);
        $uri = str_replace('/', '\/', $uri); // Escapar slashes para regex
        self::$routes[] = compact('method', 'uri', 'callback');
    }

    public static function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach (self::$routes as $route) {
            if ($route['method'] === $requestMethod && preg_match('/^' . $route['uri'] . '$/', $requestUri, $matches)) {
                // Filtrar solo las variables capturadas por el nombre
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                return call_user_func_array($route['callback'], $params);
            }
        }

        // Ruta no encontrada
        http_response_code(404);
        echo "404 - Ruta no encontrada";
    }
}
