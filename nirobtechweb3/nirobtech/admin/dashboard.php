<?php
require_once dirname(__DIR__) . '/_core/config.php';
require_once dirname(__DIR__) . '/_core/auth.php';
Auth::require_login(); // Ensure user is logged in
define('PAGE_TITLE', 'Admin Dashboard');
require_once dirname(__DIR__) . '/_core/header.php';
?>
<section class="module-section">
    <h2>Admin Dashboard</h2>
    <p>This is the administrative area. You can manage users, settings, and modules here.</p>
    <ul>
        <li><a href="#">Manage Users</a></li>
        <li><a href="#">System Settings</a></li>
        <li><a href="#">Module Configuration</a></li>
    </ul>
</section>
<?php
require_once dirname(__DIR__) . '/_core/footer.php';
?>
