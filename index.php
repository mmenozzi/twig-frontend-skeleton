<?php

require_once __DIR__ . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader);

$request = ltrim($_SERVER["REQUEST_URI"], '/');
if (preg_match('/\.(?:png|jpg|jpeg|gif|ico|css|js|ttf|otf|woff)$/', $request)) {
    return false;
}
if (empty($request)) {
    $request = 'index.html';
}

$template = $request . '.twig';

try {
    echo $twig->render($template);
} catch (Twig_Error_Loader $e) {
    return false;
}
