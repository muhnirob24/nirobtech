<?php
// Basic Router for handling clean URLs
class Router {
    private static $routes = [];

    public static function add($route, $callback) {
        self::$routes[$route] = $callback;
    }

    public static function dispatch() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = trim(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $uri), '/'); // Remove script name and trim slashes
        $base_path_prefix = trim(str_replace(parse_url(APP_URL, PHP_URL_SCHEME) . '://' . parse_url(APP_URL, PHP_URL_HOST), '', APP_URL), '/');
        $uri = str_replace($base_path_prefix, '', $uri);
        $uri = trim($uri, '/');

        // Default route for home page
        if (empty($uri)) {
            $uri = '/';
        }

        if (array_key_exists($uri, self::$routes)) {
            call_user_func(self::$routes[$uri]);
        } else {
            // Handle 404 Not Found
            header('HTTP/1.0 404 Not Found');
            define('PAGE_TITLE', '404 Not Found');
            require_once dirname(__DIR__) . '/_core/header.php';
            echo '<section class="module-section"><h2>404 - Page Not Found</h2><p>The page you requested could not be found.</p></section>';
            require_once dirname(__DIR__) . '/_core/footer.php';
        }
    }
}
?>
