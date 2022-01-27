<?php

namespace App\Repository\Product;

use App\Repository\BaseRepository;
use App\Models\Products\ProductCatgory;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Repository\Product\IProductCatgoryRepository;

class ProductCatgoryRepository extends BaseRepository implements IProductCatgoryRepository
{

    public function __construct(ProductCatgory $model)
    {
        parent::__construct($model);
        $this->colums();
    }
    protected function colums()
    {
        return $this->colums = [
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'desc_' . LaravelLocalization::getCurrentLocale() . ' as desc'
        ];
    }
}
