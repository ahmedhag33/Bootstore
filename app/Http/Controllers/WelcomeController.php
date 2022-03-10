<?php

namespace App\Http\Controllers;

use App\Services\Product\IBookService;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * @var $service 
     **/
    private $service;
    /**
     * Controctor method
     **/
    public function __construct(IBookService $service)
    {
        $this->service = $service;
    }
    /**
     * Show the application dashboard.
     *
     * @return view main page
     */
    public function index()
    {
        $books = $this->service->getbyasc();
        return view('welcome', compact('books'));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function AddCart(Request $request)
    {
        $book = $this->service->getbyid($request->id);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
        } else {
            $cart[$request->id] = [
                'name' => $book[0]->name,
                'quantity' => 1,
                'price' => $book[0]->price,
                'photo' => $book[0]->photo
            ];
        }
        session()->put('cart', $cart);
        return response()->json(
            [
                'status' => true,
                'Message' => 'Success',
                'id' => $request->id
            ]
        );
    }
}
