<?php

namespace App\Controllers;

class HomeController
{
    public function index($request, $view)
    {
        return app_view('template-cta.twig');
    }
}