<?php

namespace App\Services\Cart;

use App\Repository\Cart\IUserDetailRepository;
use App\Services\BaseService;
use App\Services\Cart\IUserDetailService;

class UserDetailService extends BaseService implements IUserDetailService
{
    private $repository;
    /**----------------
     * create object of repository
     *------------------ 
     */
    public function __construct(IUserDetailRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }
    public function getpaymenttype()
    {
        return $this->repository->getpaymenttype();
    }
}
