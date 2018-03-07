<?php


/**
 * admin
 * Register application modules
 */
$application->registerModules([
    'frontend' => ['className' => 'Ldcms\Modules\Frontend\Module',
                  'path' => APP_PATH . '/Modules/frontend/Module.php'],
    'admin' => ['className' => 'Ldcms\Modules\Admin\Module',
                'path' => APP_PATH . '/Modules/admin/Module.php'],
]);
