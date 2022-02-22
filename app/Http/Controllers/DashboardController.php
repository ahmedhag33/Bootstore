<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return view
     */
    public function index()
    {
        return view('adminpanel.main');
    }
}
