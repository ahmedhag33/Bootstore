<?php

namespace App\Repository\Cart;

use App\Repository\IBaseRepository;

interface IUserDetailRepository extends IBaseRepository
{
    public function getpaymenttype();
}
