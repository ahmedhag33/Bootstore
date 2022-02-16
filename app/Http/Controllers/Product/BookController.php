<?php

namespace App\Http\Controllers\Product;

use App\Triats\General;
use App\Http\Controllers\Controller;
use App\Services\Product\IBookService;
use Illuminate\Support\Facades\Session;
use App\Services\Product\IAuthorService;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Product\BookRequest;
use App\Services\Product\ICategoryService;
use App\Services\Product\IPublisherService;

class BookController extends Controller
{
    /**
     *  trait to use method to any controllers  
     */
    use General;
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $file_name = $this->saveimage($request->photo, 'images/author');
        if ($request->file === null) {
            $file_pdf = '';
        } else {
            $file_pdf = $this->saveimage($request->file, 'pdf');
        }
        $this->service->store([
            'photo' => $file_name,
            'file' => $file_pdf,
            'name' => $request->name,
            'desc' => $request->desc,
            'rate' => $request->rate,
            'type' => $request->type,
            'price' => $request->price,
            'discount' => $request->discount,
            'new_price' => $request->new_price,
            'category_id' => $request->category_id,
            'publisher_id' => $request->publisher_id,
            'author_id' => $request->author_id,
        ]);
        session::flash('message', 'Successfully created post');
        return Redirect::to('adminpanel/book/books');
    }
}
