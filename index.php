<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\core\{Request, Router};

//Router Return "Controller Path" along with
//the instance of router to further chain it.
Router::load('routes/routes.php')
    ->direct(Request::uri(), Request::method());
