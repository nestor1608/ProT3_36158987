<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('templates/header')
            . view('pages/home')
            . view('templates/footer');
    }

    public function quienes()
    {
        return view('templates/header')
            . view('pages/quienes')
            . view('templates/footer');
    }

    public function about()
    {
        return view('templates/header')
            . view('pages/about')
            . view('templates/footer');
    }


    

    
}