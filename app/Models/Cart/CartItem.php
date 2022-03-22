<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Pivot
{
    use SoftDeletes;

    protected $table = 'cart_items';

    protected $fillable = ['id', 'book_id', 'user_detail_id,', 'quantity', 'subtotal', 'status', 'deleted_at'];
}
