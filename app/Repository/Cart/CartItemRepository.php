<?php

namespace App\Repository\Cart;

use App\Models\Cart\CartItem;
use App\Repository\BaseRepository;

class CartItemRepository extends BaseRepository implements ICartItemRepository
{
    public function __construct(CartItem $model)
    {
        parent::__construct($model);
    }
}
