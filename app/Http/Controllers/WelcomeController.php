<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return view main page
     */
    public function index()
    {
        return view('welcome');
    }
}
