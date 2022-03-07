<?php

namespace App\Http\Controllers;

use App\Services\Product\IBookService;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * @var $service 
     **/
    private $service;
    /**
     * Controctor method
     **/
    public function __construct(IBookService $service)
    {
        $this->service = $service;
    }
    /**
     * Show the application dashboard.
     *
     * @return view main page
     */
    public function index()
    {
        $books = $this->service->getbyasc();
        return view('welcome', compact('books'));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function AddToCart($id)
    {
        return $this->service->addtocart($id);
    }
}
