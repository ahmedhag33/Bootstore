<?php

namespace App\Repository\Product;

use App\Models\Products\Book;
use App\Repository\BaseRepository;
use App\Repository\Product\IBookRepository;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    /**
     * Override Method
     *  @return Model
     */
    public function getbycolums()
    {
        return $this->model->with(
            [
                'categorys' => function ($q) {
                    $q->select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
                }, 'publishers' => function ($q) {
                    $q->select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
                }, 'authors' => function ($q) {
                    $q->select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
                }
            ]
        )->whereNull('deleted_at')->paginate(10);
    }
    /** 
     * Override Method
     *  @return Model by @param 
     */
    public function getbyid($id)
    {
        return $this->model->where('id', $id)->with(
            [
                'categorys' => function ($q) {
                    $q->select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
                }, 'publishers' => function ($q) {
                    $q->select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
                }, 'authors' => function ($q) {
                    $q->select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
                }
            ]
        )->get();
    }
    public function getbyasc()
    {
        return $this->model->with(
            [
                'categorys' => function ($q) {
                    $q->select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
                }, 'publishers' => function ($q) {
                    $q->select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
                }, 'authors' => function ($q) {
                    $q->select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
                }
            ]
        )->whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }
}
