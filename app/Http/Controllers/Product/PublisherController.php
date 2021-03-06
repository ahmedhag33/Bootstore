<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\PublisherRequest;
use App\Services\Product\IPublisherService;
use App\Triats\General\MediaTrait;

class PublisherController extends Controller
{
    /**
     *  MediaTrait with filesystem
     */
    use MediaTrait;
    /**
     * @var $service 
     **/
    private $service;
    /**
     * Controctor method
     **/
    public function __construct(IPublisherService $service)
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
        $publishers = $this->service->getbycolums();
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
        $file_name = $this->uploads($request->photo, 'images/publisher/');
        $this->service->store([
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
        $publishers = $this->service->getbyid($id);
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
        if ($request->photo != '') {
            $fileName = $this->uploads($request->photo, 'images/publisher/');
            $array =  [
                'photo' => $fileName,
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar
            ];
        } else {
            $array =  [
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar
            ];
        }
        $this->service->update($id, $array);
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
        $this->service->destroy($id);
        return Redirect::to('adminpanel/book/publisher');
    }
}
