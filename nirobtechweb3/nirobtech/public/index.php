<?php
// Main Entry Point for NirobTech Web3 Portal
require_once dirname(__DIR__) . '/_core/config.php';
require_once dirname(__DIR__) . '/_core/helpers.php';
require_once dirname(__DIR__) . '/_core/auth.php';
require_once dirname(__DIR__) . '/_core/Router.php';

// Define the base path for modules relative to the project root
define('MODULES_BASE_PATH', dirname(__DIR__) . '/modules/');

// --- Define Routes ---
// Home Page
Router::add('/', function() {
    define('PAGE_TITLE', 'Home');
    require_once dirname(__DIR__) . '/_core/header.php';
    ?>
    <section class="hero">
        <h1>Welcome to NirobTech Web3 Automation & Forensics!</h1>
        <p>Your one-stop solution for Web3 learning, income generation, and cybersecurity.</p>
        <a href="<?php echo APP_URL; ?>/module/wallet-identity" class="btn">Explore Modules</a>
    </section>

    <section class="features">
        <h2>Key Features</h2>
        <div class="feature-grid">
            <div class="feature-item">
                <h3>Practical Projects</h3>
                <p>Hands-on experience with real-world Web3 scenarios.</p>
            </div>
            <div class="feature-item">
                <h3>Daily Income</h3>
                <p>Automate tasks and leverage APIs for passive income streams.</p>
            </div>
            <div class="feature-item">
                <h3>Security & Forensics</h3>
                <p>Learn cyber defense, malware analysis, and data recovery techniques.</p>
            </div>
            <div class="feature-item">
                <h3>Automation & AI</h3>
                <p>Build bots, automate Galxe tasks, and integrate AI assistants.</p>
            </div>
        </div>
    </section>
    <?php
    require_once dirname(__DIR__) . '/_core/footer.php';
});

// Module routes
// Example: /module/wallet-identity/action/id
Router::add('/module/(.*)', function($path) {
    $segments = explode('/', $path);
    $module_route_name = $segments[0]; // e.g., wallet-identity

    // Map route name back to folder name (e.g., wallet-identity -> 1_wallet-identity)
    $module_folder_map = [
        'wallet-identity' => '1_wallet-identity',
        'galxe-airdrop' => '2_galxe-airdrop-task',
        'forensic-lab' => '3_forensic-lab',
        'android-rootless' => '4_android-rootless',
        'web3-dev-api' => '5_web3-dev-api',
        'ai-bot' => '6_ai-bot-assistant',
        'daily-income' => '7_daily-income-automation',
        'blog-publisher' => '8_php-blog-publisher',
        'cyber-defense' => '9_cyber-defense-hacking',
        'cloud-nft' => '10_cloud-nft-vault',
    ];

    if (!isset($module_folder_map[$module_route_name])) {
        // Module not found, trigger 404
        Router::dispatch(); // This will lead to 404 handler
        return;
    }

    $module_folder_name = $module_folder_map[$module_route_name];
    $controller_file = MODULES_BASE_PATH . $module_folder_name . '/controllers/main_controller.php';
    $controller_class_name = ucfirst(str_replace('-', '_', $module_route_name)) . '_Controller';

    if (file_exists($controller_file)) {
        require_once $controller_file;
        $controller = new $controller_class_name();

        $action = isset($segments[1]) ? $segments[1] : 'index';
        $param = isset($segments[2]) ? $segments[2] : null;

        if (method_exists($controller, $action)) {
            if ($param !== null) {
                call_user_func([$controller, $action], $param);
            } else {
                call_user_func([$controller, $action]);
            }
        } else {
            // Default to index if specific action not found
            $controller->index();
        }
    } else {
        // Controller file not found, trigger 404
        Router::dispatch();
    }
});

// Authentication Routes
Router::add('/login', function() {
    define('PAGE_TITLE', 'Login');
    require_once dirname(__DIR__) . '/_core/header.php';
    echo '<section class="module-section"><h2>User Login</h2><p>Login form goes here.</p></section>';
    require_once dirname(__DIR__) . '/_core/footer.php';
});

Router::add('/logout', function() {
    Auth::logout();
});

// Admin Dashboard Route (requires login)
Router::add('/admin/dashboard', function() {
    Auth::require_login();
    define('PAGE_TITLE', 'Admin Dashboard');
    require_once dirname(__DIR__) . '/_core/header.php';
    echo '<section class="module-section"><h2>Admin Dashboard</h2><p>Welcome to the Admin Area!</p></section>';
    require_once dirname(__DIR__) . '/_core/footer.php';
});


// Dispatch the request
Router::dispatch();
?>
