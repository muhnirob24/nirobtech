<?php
require_once dirname(__DIR__) . '/_core/config.php';
require_once dirname(__DIR__) . '/_core/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize_input($_POST['username']);
    $password = sanitize_input($_POST['password']);

    // Basic dummy login for demonstration
    if ($username === 'admin' && $password === 'password') {
        Auth::login(1); // Log in user with ID 1
        redirect(APP_URL . '/admin/dashboard');
    } else {
        $error = 'Invalid username or password.';
    }
}

define('PAGE_TITLE', 'Login');
require_once dirname(__DIR__) . '/_core/header.php';
?>
<section class="module-section">
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</section>
<?php
require_once dirname(__DIR__) . '/_core/footer.php';
?>
