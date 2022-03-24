<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CheckoutRequest;
use App\Models\Cart\UserDetail;
use App\Models\Products\Book;
use App\Services\Cart\CartItemService;
use App\Services\Cart\UserDetailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    private $service;
    /**
     * @var $cartitemservice 
     **/
    private $cartitemservice;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserDetailService $service, CartItemService $cartitemservice)
    {
        $this->service = $service;

        $this->cartitemservice = $cartitemservice;

        $this->middleware('auth');
    }
    /**
     *  @return response()
     */
    public function checkout()
    {
        $paymenttypes = $this->service->getpaymenttype();

        return view('cart.checkout', compact('paymenttypes'));
    }
    /**
     * @return response()
     */
    public function store(Request $request)
    {
        $array = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address'  =>   $request->address,
            'mobile'  => $request->mobile,
            'paymenttype' => $request->paymenttype,
            'user_id' => Auth::user()->id
        ];
        $checkout = $this->service->store($array);

        if ($checkout) {
            foreach (session('cart') as $id => $details) {
                $cartitem = $this->cartitemservice->store(
                    [
                        'book_id' => $id,
                        'userdetail_id' => UserDetail::max('id'),
                        'quantity' =>  $details['quantity'],
                        'subtotal' => $details['price'] * $details['quantity'],
                        'status' => 0
                    ]
                );
            }
            if ($cartitem) {
                return response()->json([
                    'status' => true,
                    'Message' => 'Success'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'Message' => 'error'
                ]);
            }
        }
    }
}
