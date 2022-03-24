<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Pivot
{
    use SoftDeletes;

    protected $table = 'cartitems';

    protected $fillable = ['id', 'book_id', 'userdetail_id', 'quantity', 'subtotal', 'status', 'deleted_at'];

    public function user_details()
    {
        return $this->belongsTo('App\Models\Cart\UserDetail', 'user_detail_id');
    }
    public function books()
    {
        return $this->belongsTo('App\Models\Products\Book', 'book_id');
    }
}
