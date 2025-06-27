<?php
require_once dirname(__DIR__) . '/_core/config.php';
require_once dirname(__DIR__) . '/_core/auth.php';
Auth::require_login();
define('PAGE_TITLE', 'Manage Users');
require_once dirname(__DIR__) . '/_core/header.php';
?>
<section class="module-section">
    <h2>Manage Users</h2>
    <p>User management interface.</p>
</section>
<?php
require_once dirname(__DIR__) . '/_core/footer.php';
?>
