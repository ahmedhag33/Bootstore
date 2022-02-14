<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categorys';

    protected $fillable = ['id', 'name_en', 'name_ar', 'deleted_at'];

    public function books()
    {
        return $this->hasMany('App\Models\Products\Book', 'category_id');
    }
}
