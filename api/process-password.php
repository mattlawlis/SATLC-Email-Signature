<?php
if (session_status() === PHP_SESSION_NONE) {
    $domain = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => $domain,
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Strict',
    ]);
    session_start();
}

// Define the correct password
$correct_password = 'crescent300'; // Replace with the actual password

if (isset($_POST['password'])) {
    $password = $_POST['password'];

    if ($password === $correct_password) {
        // Password is correct, set session variable
        $_SESSION['authenticated'] = true;

        // Redirect to authorized.php - use absolute path
        header('Location: /authorized');
        exit();
    } else {
        // Password is incorrect, redirect back to index.php with error flag
        header('Location: /index.php?error=1');
        exit();
    }
} else {
    // No password entered, redirect back to index.php
    header('Location: /index.php');
    exit();
}
