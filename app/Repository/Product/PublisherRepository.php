<?php

namespace App\Repository\Product;

use App\Models\Products\Publisher;
use App\Repository\BaseRepository;
use App\Repository\Product\IPublisherRepository;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PublisherRepository extends BaseRepository implements IPublisherRepository
{
    public function __construct(Publisher $model)
    {
        parent::__construct($model);
        $this->colums();
    }
    protected function colums()
    {
        return $this->colums = [
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'photo'
        ];
    }
}
