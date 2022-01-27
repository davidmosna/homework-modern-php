<?php

require __DIR__ . '/vendor/autoload.php';

try {
    $app = new App($argv[1] ?? 'example.log');
    $app->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}
