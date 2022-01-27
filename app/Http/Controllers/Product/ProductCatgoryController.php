<?php

namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductCatgoryRequest;
use App\Repository\Product\IProductCatgoryRepository;

class ProductCatgoryController extends Controller
{

    /**----------------
     * create object of repository
     *------------------ 
     */
    private $repository;

    public function __construct(IProductCatgoryRepository $repository)
    {
        $this->repository = $repository;
    }
    public function get()
    {
        $productcatgorys  = $this->repository->getbycolums();
        return view('adminpanel.product.product_catgory.show', compact('productcatgorys'));
    }
    public function add()
    {
        return view('adminpanel.product.product_catgory.add');
    }
    public function create(ProductCatgoryRequest $request)
    {
        $this->repository->create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'desc_en' => $request->desc_en,
            'desc_ar' => $request->desc_ar,
        ]);

        return redirect()->back()
            ->with(['Message' => 'Success']);
    }
    public function getbyid($id)
    {
        $productcatgorys = $this->repository->getbyid($id);
        return view('adminpanel.product.product_catgory.edit', compact('productcatgorys'));
    }
    public function update(ProductCatgoryRequest $request, $id)
    {
        $this->repository->update($id, [
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'desc_en' => $request->desc_en,
            'desc_ar' => $request->desc_ar,
        ]);
        return redirect()
            ->back()
            ->with(['Message' => 'Success']);
    }
    public function delete($id)
    {
        $this->repository->delete($id);
        return redirect()
            ->route('adminpanel.product.product_catgory.show');
    }
}
