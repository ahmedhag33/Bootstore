<?php

namespace App\Services\Product;

use App\Services\BaseService;
use App\Services\Product\IBookService;
use App\Repository\Product\IBookRepository;

class BookService extends BaseService implements IBookService
{

    private $repository;
    /**----------------
     * create object of repository
     *------------------ 
     */
    public function __construct(IBookRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Model
     */
    public function geteunm()
    {
        return $this->repository->geteunm();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Model
     */
    public function getbyasc()
    {
        return $this->repository->getbyasc();
    }
}
