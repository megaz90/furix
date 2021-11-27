<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'App\\Models\\Todo' => $baseDir . '/app/models/Todo.php',
    'App\\controllers\\PagesController' => $baseDir . '/app/controllers/PagesController.php',
    'App\\core\\App' => $baseDir . '/core/App.php',
    'App\\core\\Request' => $baseDir . '/core/Request.php',
    'App\\core\\Response\\HttpException\\Handler' => $baseDir . '/core/Response/HttpException/Handler.php',
    'App\\core\\Router' => $baseDir . '/core/Router.php',
    'App\\core\\database\\Connection' => $baseDir . '/core/database/Connection.php',
    'App\\core\\database\\QueryBuilder' => $baseDir . '/core/database/QueryBuilder.php',
    'ComposerAutoloaderInitc9f7bfeae2191f9fa6201910c944219f' => $vendorDir . '/composer/autoload_real.php',
    'Composer\\Autoload\\ClassLoader' => $vendorDir . '/composer/ClassLoader.php',
    'Composer\\Autoload\\ComposerStaticInitc9f7bfeae2191f9fa6201910c944219f' => $vendorDir . '/composer/autoload_static.php',
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
);