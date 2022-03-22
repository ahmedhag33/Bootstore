<?php

namespace App\Repository\Cart;

use App\Models\Cart\UserDetail;
use App\Repository\BaseRepository;
use App\Repository\Cart\IUserDetailRepository;

class UserDetailRepository extends BaseRepository implements IUserDetailRepository
{
    public function __construct(UserDetail $model)
    {
        parent::__construct($model);
    }
    /**
     * Display a listing of the eunm.
     */
    public function getpaymenttype()
    {
        return $this->model->getpaymenttype();
    }
}
