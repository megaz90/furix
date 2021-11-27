<?php

namespace App\controllers;

use App\core\App;

class PagesController
{
    public function home()
    {
        $result = App::resolve('database')->all('todos');

        return view('index', compact('result'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function check()
    {
        return view('check');
    }

    public function task()
    {
        var_dump('ssss');
        die;
    }
}
