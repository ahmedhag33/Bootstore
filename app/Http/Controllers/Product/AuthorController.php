<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AuthorRequest;
use App\Services\Product\IAuthorService;
use App\Triats\General\MediaTrait;

class AuthorController extends Controller
{
    /**
     *  MediaTrait with filesystem
     */
    use MediaTrait;
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
        $file_name = $this->uploads($request->photo, 'images/author/');
        $this->service->store([
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
        $authors = $this->service->getbyid($id);
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
        if ($request->photo != '') {
            $fileName = $this->uploads($request->photo, 'images/author/');
            $array =  [
                'photo' => $fileName,
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'desc_en' => $request->desc_en,
                'desc_ar' => $request->desc_ar,
                'rate' => $request->rate
            ];
        } else {
            $array =  [
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'desc_en' => $request->desc_en,
                'desc_ar' => $request->desc_ar,
                'rate' => $request->rate
            ];
        }
        $this->service->update($id, $array);
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
        $this->service->destroy($id);
        return Redirect::to('adminpanel/book/author');
    }
}
