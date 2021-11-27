<?php

namespace App\core;

use App\core\Response\HttpException\Handler;
use Exception;

class Router
{
    public static $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'PATCH' => [],
        'DELETE' => [],
    ];

    public static function load($file)
    {
        $router = new static;

        //Loading Main Routes Files to get all the routes to for maping
        require $file;

        return $router;
    }

    public function define($routes)
    {
        static::$routes = $routes;
    }

    /**
     * Getting Controller path through URI and returning it
     * back to the index to load the view
     */
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routeInstance()[$requestType])) {
            return $this->callAction($this->routeInstance()[$requestType][$uri]);
        }

        $this->exceptionHandler('404', 'Not Found'); //Route not found exception
    }

    //Setting Key as path and controller as a value in GET Array
    public static function get($uri, $action)
    {
        // $this->routeCheck($_SERVER['REQUEST_METHOD'], __FUNCTION__);
        (new Router)->createRoute('GET', $uri, $action);

        return new static;
    }

    //Setting Key as path and controller as a value in POST Array
    public static function post($uri, $action)
    {
        (new Router)->createRoute('POST', $uri, $action);

        return new static;
    }

    //Setting Key as path and controller as a value in PUT Array
    public static function put($uri, $action)
    {
        (new Router)->createRoute('PUT', $uri, $action);

        return new static;
    }

    //Setting Key as path and controller as a value in PATCH Array
    public static function patch($uri, $action)
    {
        (new Router)->createRoute('PATCH', $uri, $action);

        return new static;
    }

    //Setting Key as path and controller as a value in DELETE Array
    public static function delete($uri, $action)
    {
        (new Router)->createRoute('DELETE', $uri, $action);

        return new static;
    }

    /**
     * Here we will redirect out user from one uri to another
     * the uri will be GET or HEAD. 
     */
    public static function redirect($fromURI, $toURI)
    {
        //To be Done.
        (new Router)->direct($toURI, $requestType = 'GET');
    }

    /**
     * Resolving Controller action first and then after that
     * creating the route.
     */
    protected function createRoute($method, $uri, $action)
    {
        $resolvedURI = $this->resolveURI($uri);
        return static::$routes[$method][$resolvedURI] = $action;
    }

    /**
     * Handling controller action and checking if the action exist
     * in the controller or not.
     * Returning Resolved controller instance along with the 
     * call to the action/method
     */
    protected function convertControllerAction($controller, $action)
    {
        $controller = "App\\controllers\\{$controller}";

        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception("{$action} not found in {$controller} controller class.");
        }

        return $controller->$action();
    }

    /**
     * Making Controller Instance and returning it back
     * along with the action/method.
     */
    protected function callAction($action)
    {
        $resolvedAction = explode('@', $action);

        return $this->convertControllerAction(
            ...$resolvedAction
        );
    }

    //Making instance of static property of routes for
    //non static methods
    protected function routeInstance()
    {
        return static::$routes;
    }

    protected function resolveURI($uri)
    {
        return trim($uri, '/');
    }

    /**
     * Handle errors and redirect back to the error view.
     */
    protected function exceptionHandler($code, $message)
    {
        require Handler::isHttpException()
            ->handleException($code, $message);
        exit;
    }

    /**
     * This function cross check the route with the incoming 
     * route http request
     */
    protected function routeCheck($request_method, $method_name)
    {
        if ($request_method !== strtoupper($method_name)) {

            $error_message = "{$request_method} is not supported for this route.";
            require Handler::isHttpException()
                ->handleErrorException();
            exit;
        }
    }
}
