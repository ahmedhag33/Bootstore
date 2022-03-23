<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CheckoutRequest;
use App\Services\Cart\UserDetailService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * @var $service 
     **/
    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserDetailService $service)
    {
        $this->service = $service;

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
    public function store(CheckoutRequest $request)
    {
        $array = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address'  =>   $request->address,
            'mobile'  => $request->mobile,
            'paymenttype' => $request->paymenttype
        ];

        if ($array) {
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
