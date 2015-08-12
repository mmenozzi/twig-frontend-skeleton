<?php

$siteSettings = array(
    'assets_path' => '/assets',
    'pages' => array(
        '/' => 'Home',
        '/about-us.html' => 'About Us',
    ),
);

$request = ltrim($_SERVER["REQUEST_URI"], '/');
if (preg_match('/\.(?:png|jpg|jpeg|gif|ico|css|js|ttf|otf|woff)$/', $request)) {
    return false;
}
if (empty($request)) {
    $request = 'index.html';
}

require_once __DIR__ . '/vendor/autoload.php';

$namespace = 'static';
$template = '@' . $namespace . DIRECTORY_SEPARATOR . $request . '.twig';

$loader = new Twig_Loader_Filesystem();
$loader->addPath(__DIR__ . '/templates', $namespace);
$twig = new Twig_Environment($loader);

try {
    echo $twig->render($template, $siteSettings);
} catch (Twig_Error_Loader $e) {
    return false;
}
