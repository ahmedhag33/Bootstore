<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $table = 'authors';

    protected $fillable = ['id', 'name_en', 'name_ar', 'desc_en', 'desc_ar', 'rate', 'photo', 'deleted_at'];

    public function books()
    {
        return $this->hasMany('App\Models\Products\Book', 'author_id');
    }
}
