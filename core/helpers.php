<?php

if (!function_exists('view')) {
    /**
     * Return the view from controller
     * @param mixed $page
     * @param array $data
     */
    function view($page, $data = [])
    {
        if (count($data)) {
            extract($data);
        }
        require "views/{$page}.view.php";
    }
}
