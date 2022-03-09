<?php

namespace App\Services\Product;

use App\Services\BaseService;
use App\Services\Product\IBookService;
use App\Repository\Product\IBookRepository;

class BookService extends BaseService implements IBookService
{

    private $repository;
    /**----------------
     * create object of repository
     *------------------ 
     */
    public function __construct(IBookRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Model
     */
    public function geteunm()
    {
        return $this->repository->geteunm();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Model
     */
    public function getbyasc()
    {
        return $this->repository->getbyasc();
    }
    /**
     * Check item by id to add this in card 
     * @return response()
     */
    public function addtocart($id)
    {
        $book = $this->repository->getbyid($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $book[0]->name,
                'quantity' => 1,
                'price' => $book[0]->price,
                'photo' => $book[0]->photo
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
