<?php
namespace Ldcms\Modules\Frontend;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\Router\Route;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Ldcms\Modules\Frontend\Controllers' => __DIR__ . '/controllers/',
            'Ldcms\Modules\Frontend\Models' => __DIR__ . '/models/',

            'Ldcms\Common\Controllers'      => APP_PATH . '/common/controllers/',
            'Ldcms\Common\Library'      => APP_PATH . '/common/library/',

        ]);

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Setting up the view component
         */
        $di->set('view', function () {
            $view = new View();
            $view->setViewsDir(APP_PATH.'/views/frontend/');
            $view->setMainView(APP_PATH.'/common/layouts/frontend/main');

            $view->setPartialsDir(APP_PATH.'/common/layouts/frontend/');
            $view->registerEngines([
//                '.volt'  => 'voltShared',
                '.phtml' => PhpEngine::class
            ]);

            $view->registerEngines([
                '.volt'  => 'voltShared',
                '.phtml' => PhpEngine::class
            ]);

            return $view;
        });

    }
}
