<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Ldcms\Models' => APP_PATH . '/common/models/',
    'Ldcms\Controllers' => APP_PATH . '/common/controllers/',
    'Ldcms'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Ldcms\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Ldcms\Modules\Admin\Module' => APP_PATH . '/modules/admin/Module.php',
    'Ldcms\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
