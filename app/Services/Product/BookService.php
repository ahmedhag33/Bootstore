<?php

namespace App\Services\Product;

use App\Services\BaseService;
use App\Services\Product\IBookService;
use App\Repository\Product\IBookRepository;

class BookService extends BaseService implements IBookService
{

    private $repository;

    public function __construct(IBookRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }
    public function geteunm()
    {
        return $this->repository->geteunm();
    }
}
