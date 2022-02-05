<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Session;
use  Illuminate\Support\Facades\Redirect;
use App\Triats\General;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\PublisherRequest;
use App\Repository\Product\IPublisherRepository;

class PublisherController extends Controller
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

    public function __construct(IPublisherRepository $repository)
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
        $publishers = $this->repository->getbycolums();
        return view('adminpanel.book.publisher.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.book.publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherRequest $request)
    {
        $file_name = $this->saveimage($request->photo, 'images/publisher');
        $this->repository->create([
            'photo' => $file_name,
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar
        ]);
        session::flash('message', 'Successfully created post');
        return Redirect::to('adminpanel/book/publisher');
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
        $publishers = $this->repository->getbyid($id);
        return view('adminpanel.book.publisher.edit', compact('publishers'));
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
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar
        ]);
        session::flash('message', 'Successfully created post');
        return Redirect::to('adminpanel/book/publisher');
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
        return Redirect::to('adminpanel/book/publisher');
    }
}
