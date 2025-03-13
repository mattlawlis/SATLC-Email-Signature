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

if (empty($_SESSION['authenticated'])) {
    header('Location: /api/index.php');
    exit();
}
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>The St. Anthony Email Signature Generator</title>
  
  <!-- Favicon -->
  <link rel="icon" href="/images/SATLC-favicon.png" type="image/png">
  
  <!-- Open Graph -->
  <meta property="og:image" content="/images/SATLC-email-sig-generator-opengraph.png">
  
  <!-- Bulma CSS and other external CSS if needed -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

  <!-- Font Awesome (only used in input fields and mobile warning icon) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <!-- Header Section with St Anthony Hotel Logo -->
  <header class="header">
    <img src="/images/SATLC-Logo.png" alt="St Anthony Hotel Logo" width="125" style="display:block; margin:0 auto 10px;">
    <br>
    <h1>Employee Signature Generator</h1>
    <!-- Mobile Warning Message -->
    <div id="mobile-warning">
      <i class="fas fa-exclamation-triangle"></i>
      THIS EMAIL SIGNATURE GENERATOR MUST BE ACCESSED FROM A DESKTOP COMPUTER.
    </div>
  </header>
