<?php

namespace Ldcms\Modules\Frontend\Controllers;
use  Ldcms\Controllers\FrontendBase;
class ErrorController extends FrontendBase
{

    public function show404Action()
    {
        $this->view->title='404页面';
    }

}

