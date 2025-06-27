<?php
// Common Utility Functions
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function redirect($url) {
    header('Location: ' . $url);
    exit();
}

function load_view($view_path, $data = []) {
    extract($data); // Extract data array into variables
    require $view_path;
}

// Add more helper functions as needed
?>
