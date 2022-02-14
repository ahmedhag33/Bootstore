<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Product\IAuthorService;
use App\Services\Product\IBookService;
use App\Services\Product\ICategoryService;
use App\Services\Product\IPublisherService;

class BookController extends Controller
{
    /**
     * @var $service 
     **/
    private $service;
    /**
     * @var $categoryservice 
     **/
    private $categoryservice;
    /**
     * @var $publisherservice 
     **/
    private $publisherservice;
    /**
     * @var $service 
     **/
    private $authorservice;
    /**
     * Controctor method
     **/
    public function __construct(IBookService $service, ICategoryService $categoryservice, IPublisherService $publisherservice, IAuthorService $authorservice)
    {
        $this->service = $service;
        $this->categoryservice = $categoryservice;
        $this->publisherservice = $publisherservice;
        $this->authorservice = $authorservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->service->geteunm();
        return view('adminpanel.book.books.index', compact('types'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $categorys = $this->categoryservice->getbycolums();
        $publishers = $this->publisherservice->getbycolums();
        $authors = $this->authorservice->getbycolums();
        return view('adminpanel.book.books.create', compact('type', 'categorys', 'publishers', 'authors'));
    }
}
