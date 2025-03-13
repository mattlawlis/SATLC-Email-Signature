<?php
session_start();

// Define the correct password
$correct_password = 'crescent300'; // Replace with the actual password

if (isset($_POST['password'])) {
    $password = $_POST['password'];

    if ($password === $correct_password) {
        // Password is correct, set session variable
        $_SESSION['authenticated'] = true;

        // Redirect to authorized.php
        header('Location: /api/authorized.php');
        exit();
    } else {
        // Password is incorrect, redirect back to index.php with error flag
        header('Location: /api/index.php?error=1');
        exit();
    }
} else {
    // No password entered, redirect back to index.php
    header('Location: /api/index.php');
    exit();
}
