<?php

namespace Ldcms\Modules\Admin;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Config;


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
            'Ldcms\Modules\Admin\Controllers' => __DIR__ . '/controllers/',
            'Ldcms\Modules\Admin\Models'      => __DIR__ . '/models/',

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
         * Try to load local configuration
         */
        if (file_exists(__DIR__ . '/config/config.php')) {
            
            $config = $di['config'];
            
            $override = new Config(include __DIR__ . '/config/config.php');

            if ($config instanceof Config) {
                $config->merge($override);
            } else {
                $config = $override;
            }
        }

        /**
         * Setting up the view component
         */
        $di['view'] = function () {

            $view = new View();
            $view->setDI($this);
            $view->setViewsDir(APP_PATH.'/views/admin/');
            $view->setMainView(APP_PATH.'/common/layouts/admin/main');
            $view->setPartialsDir(APP_PATH.'/common/layouts/admin/');
            $view->registerEngines([
//                '.volt'  => 'voltShared',
                '.phtml' => PhpEngine::class
            ]);

            return $view;
        };

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di['db'] = function () {
            $config = $this->getConfig();

            $dbConfig = $config->database->toArray();

            $dbAdapter = '\Phalcon\Db\Adapter\Pdo\\' . $dbConfig['adapter'];
            unset($config['adapter']);

            return new $dbAdapter($dbConfig);
        };
    }
}
