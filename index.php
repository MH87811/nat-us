<?php

require_once __DIR__ . '/router.php';

use Router\Router;

$router = new Router();

for ($i = 1; $i <= 30; $i++) {
    $handler = function () use ($i) {
        $lvl = $i;
        include __DIR__ . "/lvls/template.php";
    };
    $router->add('GET', "/lvl-$i", $handler);
}

$router->add('POST', '/auth', function () { include __DIR__ . '/auth.php'; });
$router->add('GET', "/", function () { include __DIR__ . '/index.html'; });
$router->add('POST', '/lvl-8', function() { $lvl = 8; include __DIR__ . '/lvls/lvl-8/content.php'; });
$router->add('POST', '/lvl-13', function() { $lvl = 13; include __DIR__ . '/lvls/lvl-13/content.php'; });

$router->run();