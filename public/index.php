<?php
$requestedPage = $_GET['page'] ?? 'index';
$page = trim(strtolower($requestedPage), '/');
$page = $page === '' ? 'index' : preg_replace('/[^a-z0-9\-]/', '', $page);

$allowedPages = [
    'index',
    'about',
    'services',
    'pricing',
    'team',
    'gallery',
    'blog',
    'contact',
];

$is404 = !in_array($page, $allowedPages, true);
$viewPage = $is404 ? '404' : $page;
$viewPath = __DIR__ . '/../app/views/pages/' . $viewPage . '.php';

if (!file_exists($viewPath)) {
    http_response_code(404);
    $viewPage = '404';
    $is404 = true;
    $viewPath = __DIR__ . '/../app/views/pages/404.php';
}

if ($is404) {
    http_response_code(404);
}

$pageTitleMap = [
    'index' => 'JMROWLAND Cleaning Services',
    'about' => 'About Us',
    'services' => 'Services',
    'pricing' => 'Pricing',
    'team' => 'Our Team',
    'gallery' => 'Gallery',
    'blog' => 'Blog',
    'contact' => 'Contact',
    '404' => 'Page Not Found',
];

$pageTitle = $pageTitleMap[$viewPage] ?? 'JMROWLAND Cleaning Services';
$currentPage = $viewPage;

require __DIR__ . '/../app/views/layouts/header.php';
require $viewPath;
require __DIR__ . '/../app/views/layouts/footer.php';
