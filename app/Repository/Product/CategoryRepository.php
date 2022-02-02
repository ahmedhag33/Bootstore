<?php

namespace App\Repository\Product;

use App\Models\Products\Category;
use App\Repository\BaseRepository;
use App\Repository\Product\ICategoryRepository;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->colums();
    }
    protected function colums()
    {
        return $this->colums = [
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name'
        ];
    }
}
