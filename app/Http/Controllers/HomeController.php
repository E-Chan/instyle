<?php

namespace app\Http\Controllers;
class HomeController extends BaseController
{
    public function index()
    {
        return view('home');
    }
}