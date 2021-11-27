<?php

use App\core\Router;

/**
 * 
 * -----------------------------------------
 * Web Routes
 * -----------------------------------------
 * 
 */

// Router::redirect('/', '/contact');

Router::get('/', 'PagesController@home');
Router::get('/contact', 'PagesController@contact');
Router::get('/about', 'PagesController@about');
Router::get('/check', 'PagesController@check');
Router::post('/task', 'PagesController@task');
