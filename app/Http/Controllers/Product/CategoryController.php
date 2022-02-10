<?php

namespace App\Http\Controllers\Product;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CategoryRequest;
use App\Services\Product\ICategoryService;

class CategoryController extends Controller
{
    /**
     * @var $service 
     **/
    private $service;
    /**
     * Controctor method
     **/
    public function __construct(ICategoryService $service)
    {
        $this->service = $service;
    }
    public function get()
    {
        $productcatgorys  = $this->service->getbycolums();
        return view('adminpanel.book.catgory.show', compact('productcatgorys'));
    }
    public function add()
    {
        return view('adminpanel.book.catgory.add');
    }
    public function create(CategoryRequest $request)
    {
        $this->service->store([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar
        ]);

        return redirect()->back()
            ->with(['Message' => 'Success']);
    }
    public function getbyid($id)
    {
        $productcatgorys = $this->service->getbyid($id);
        return view('adminpanel.book.catgory.edit', compact('productcatgorys'));
    }
    public function update(Request $request, $id)
    {
        $this->service->update($id, [
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar
        ]);
        return redirect()
            ->back()
            ->with(['Message' => 'Success']);
    }
    public function delete($id)
    {
        $this->service->destroy($id);
        return redirect()
            ->route('adminpanel.book.catgory.show');
    }
}
