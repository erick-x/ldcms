<?php
namespace Ldcms\Controllers;

use Phalcon\Mvc\Controller;

class AdminBase extends Controller
{

    public function initialize() {
        $apps = $this->apps;
       $this->view->title=$apps->app_name;
    }

    public function beforeExecuteRoute() {

    }

    public function afterExecuteRoute() {

    }
}
