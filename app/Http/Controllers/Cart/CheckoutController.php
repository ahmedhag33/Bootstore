<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    /**
     *  @return response()
     */
    public function checkout()
    {
        return view('cart.checkout');
    }
}
