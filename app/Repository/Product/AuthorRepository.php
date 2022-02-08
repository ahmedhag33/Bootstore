<?php

namespace App\Repository\Product;

use App\Models\Products\Author;
use App\Repository\BaseRepository;
use App\Repository\Product\IAuthorRepository;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AuthorRepository extends BaseRepository implements IAuthorRepository
{

    public function __construct(Author $model)
    {
        parent::__construct($model);
        $this->colums();
    }
    protected function colums()
    {
        return $this->colums = [
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'desc_' . LaravelLocalization::getCurrentLocale() . ' as desc',
            'photo',
            'rate'
        ];
    }
}
