<?php
$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');
$publicDir = rtrim(str_replace('/index.php', '', $scriptName), '/');
$BASE = $publicDir === '' ? '' : $publicDir;
$ASSETS = $BASE . '/assets';

$menu = [
    'index' => ['label' => 'Home', 'path' => ''],
    'about' => ['label' => 'About', 'path' => '/about'],
    'services' => ['label' => 'Services', 'path' => '/services'],
    'pricing' => ['label' => 'Pricing', 'path' => '/pricing'],
    'team' => ['label' => 'Team', 'path' => '/team'],
    'gallery' => ['label' => 'Gallery', 'path' => '/gallery'],
    'blog' => ['label' => 'Blog', 'path' => '/blog'],
    'contact' => ['label' => 'Contact', 'path' => '/contact'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> | JMROWLAND</title>
    <link rel="stylesheet" href="<?= $ASSETS ?>/css/style.css">
</head>
<body>
    <div class="topbar">
        <div class="container topbar-wrap">
            <div class="topbar-info">
                <span>📞 +1 (800) 555-0147</span>
                <span>📍 1280 Market Street, San Francisco, CA</span>
            </div>
            <div class="topbar-social">
                <a href="#" aria-label="Facebook">Fb</a>
                <a href="#" aria-label="LinkedIn">In</a>
                <a href="#" aria-label="Instagram">Ig</a>
            </div>
        </div>
    </div>

    <header class="site-header">
        <div class="container nav-wrap">
            <a class="logo" href="<?= $BASE ?>/">JMROWLAND</a>
            <nav>
                <ul class="nav-menu">
                    <?php foreach ($menu as $key => $item): ?>
                        <?php $isActive = $currentPage === $key; ?>
                        <li><a class="<?= $isActive ? 'active' : '' ?>" href="<?= $BASE . $item['path'] ?>"><?= $item['label'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <div class="header-actions">
                <button type="button" class="icon-btn" data-open="search">🔍</button>
                <button type="button" class="icon-btn" data-open="drawer">☰</button>
            </div>
        </div>
    </header>

    <div class="search-overlay" id="searchOverlay" aria-hidden="true">
        <button class="close-btn" data-close="search">×</button>
        <form action="#" class="search-form">
            <input type="text" placeholder="Search cleaning services...">
            <button type="submit">Search</button>
        </form>
    </div>

    <aside class="drawer" id="drawer" aria-hidden="true">
        <button class="close-btn" data-close="drawer">×</button>
        <h3>About JMROWLAND</h3>
        <p>We deliver reliable, premium residential and commercial cleaning services with trained professionals and eco-safe products.</p>
        <h4>Contact</h4>
        <p>+1 (800) 555-0147<br>hello@jmrowlandcleaning.com</p>
        <div class="drawer-social">
            <a href="#">Fb</a>
            <a href="#">In</a>
            <a href="#">Ig</a>
        </div>
    </aside>

    <?php if ($currentPage !== 'index'): ?>
        <section class="inner-banner">
            <div class="container">
                <h1><?= htmlspecialchars($pageTitle) ?></h1>
                <p><a href="<?= $BASE ?>/">Home</a> / <?= htmlspecialchars($pageTitle) ?></p>
            </div>
        </section>
    <?php endif; ?>

    <main>
