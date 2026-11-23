<?php
$currentPage = $currentPage ?? '';
$pageTitle = $pageTitle ?? 'DJM Tool';
$pageDescription = $pageDescription ?? 'Project management and team coordination for structural steel teams.';

require_once __DIR__ . '/../hero_bg.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>">
  <meta name="theme-color" content="#293e52">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css?v=<?= (string) filemtime(__DIR__ . '/../styles.css') ?>">
  <script src="script.js?v=<?= (string) filemtime(__DIR__ . '/../script.js') ?>" defer></script>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header">
  <nav class="nav wrap" aria-label="Main navigation">
    <a class="logo-link" href="index.php" aria-label="DJM Tool home">
      <img class="logo" src="images/djmtools-logo.jpg" alt="DJM Tool" width="180" height="85">
    </a>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false" aria-controls="primary-links"><span></span><span></span><span></span></button>
    <div class="links" id="primary-links">
      <a href="index.php"<?= $currentPage === 'home' ? ' aria-current="page"' : '' ?>>Home</a>
      <a href="features.php"<?= $currentPage === 'features' ? ' aria-current="page"' : '' ?>>Features</a>
      <a href="pricing.php"<?= $currentPage === 'pricing' ? ' aria-current="page"' : '' ?>>Pricing</a>
      <a href="about.php"<?= $currentPage === 'about' ? ' aria-current="page"' : '' ?>>About</a>
      <a class="nav-support" href="support.php"<?= $currentPage === 'support' ? ' aria-current="page"' : '' ?>>Support</a>
      <a class="nav-start" href="support.php">Get Started </a>
    </div>
  </nav>
</header>



