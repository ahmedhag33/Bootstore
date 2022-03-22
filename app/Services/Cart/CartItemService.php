<?php

namespace App\Services\Cart;

use App\Repository\Cart\ICartItemRepository;
use App\Services\BaseService;

class CartItemService extends BaseService implements ICartItemService
{
    public function __construct(ICartItemRepository $repository)
    {
        parent::__construct($repository);
    }
}
