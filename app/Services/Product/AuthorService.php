<?php

namespace App\Services\Product;

use App\Repository\Product\IAuthorRepository;
use App\Services\BaseService;
use App\Services\Product\IAuthorService;

class AuthorService extends BaseService implements IAuthorService
{
    public function __construct(IAuthorRepository $repository)
    {
        parent::__construct($repository);
    }
}
