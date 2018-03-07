<?php
namespace Ldcms\Controllers;

use Phalcon\Mvc\Controller;

class CommonBase extends Controller
{
    public function initialize() {
        echo 'initialize';
    }
    public function beforeExecuteRoute() {

    }

    public function afterExecuteRoute() {

    }
}
