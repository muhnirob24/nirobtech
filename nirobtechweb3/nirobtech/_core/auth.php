<?php
// User Authentication and Authorization Functions
class Auth {
    public static function is_logged_in() {
        return isset($_SESSION['user_id']);
    }

    public static function require_login() {
        if (!self::is_logged_in()) {
            redirect(APP_URL . '/login'); // Assuming a login route
        }
    }

    public static function login($user_id) {
        $_SESSION['user_id'] = $user_id;
        // Optionally fetch user roles, permissions etc.
    }

    public static function logout() {
        session_unset();
        session_destroy();
        redirect(APP_URL . '/login');
    }
}
?>
