<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Product\IAuthorService;

class AuthorController extends Controller
{
    /**----------------
     * create object of repository
     *------------------ 
     */
    private $service;

    public function __construct(IAuthorService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = $this->service->getbycolums();
        return view('authors',compact('authors'));
    }
}
