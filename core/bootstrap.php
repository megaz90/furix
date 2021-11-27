<?php

use App\core\App;
use App\core\database\Connection;
use App\core\database\QueryBuilder;

App::bind('config', require 'config.php');


App::bind('database', new QueryBuilder(
    Connection::make(App::resolve('config')['database'])
));
