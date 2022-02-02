<?php

namespace App\Http\Controllers\Product;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CategoryRequest;
use App\Repository\Product\ICategoryRepository;

class CategoryController extends Controller
{

    /**----------------
     * create object of repository
     *------------------ 
     */
    private $repository;

    public function __construct(ICategoryRepository $repository)
    {
        $this->repository = $repository;
    }
    public function get()
    {
        $productcatgorys  = $this->repository->getbycolums();
        return view('adminpanel.book.catgory.show', compact('productcatgorys'));
    }
    public function add()
    {
        return view('adminpanel.book.catgory.add');
    }
    public function create(CategoryRequest $request)
    {
        $this->repository->create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar
        ]);

        return redirect()->back()
            ->with(['Message' => 'Success']);
    }
    public function getbyid($id)
    {
        $productcatgorys = $this->repository->getbyid($id);
        return view('adminpanel.book.catgory.edit', compact('productcatgorys'));
    }
    public function update(Request $request, $id)
    {
        $this->repository->update($id, [
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar
        ]);
        return redirect()
            ->back()
            ->with(['Message' => 'Success']);
    }
    public function delete($id)
    {
        $this->repository->delete($id);
        return redirect()
            ->route('adminpanel.book.catgory.show');
    }
}
