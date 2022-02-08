<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Triats\General;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AuthorRequest;
use App\Repository\Product\IAuthorRepository;

class AuthorController extends Controller
{
    /**
     *  trait to use method to any controllers  
     */
    use General;
    /**----------------
     * create object of repository
     *------------------ 
     */
    private $repository;

    public function __construct(IAuthorRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = $this->repository->getbycolums();
        return view('adminpanel.book.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.book.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        $file_name = $this->saveimage($request->photo, 'images/author');
        $this->repository->create([
            'photo' => $file_name,
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'desc_en' => $request->desc_en,
            'desc_ar' => $request->desc_ar,
            'rate' => $request->rate
        ]);
        session::flash('message', 'Successfully created post');
        return Redirect::to('adminpanel/book/author');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = $this->repository->getbyid($id);
        return view('adminpanel.book.author.edit', compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->repository->update($id, [
            'rate' => $request->rate
        ]);
        session::flash('message', 'Successfully created post');
        return Redirect::to('adminpanel/book/author');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return Redirect::to('adminpanel/book/author');
    }
}
