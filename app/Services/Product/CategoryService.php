<?php

namespace App\Services\Product;

use App\Services\BaseService;
use App\Services\Product\ICategoryService;
use App\Repository\Product\ICategoryRepository;

class CategoryService extends BaseService implements ICategoryService
{
    public function __construct(ICategoryRepository $repository)
    {
        parent::__construct($repository);
    }
}
