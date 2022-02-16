<?php

namespace App\Repository\Product;

use App\Models\Products\Book;
use App\Repository\BaseRepository;
use App\Repository\Product\IBookRepository;

class BookRepository extends BaseRepository implements IBookRepository
{
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }
    /**
     * Display a listing of the eunm.
     */
    public function geteunm()
    {
        return $this->model->getEnumValues();
    }
}
