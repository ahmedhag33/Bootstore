<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use SoftDeletes;

    protected $table = 'publishers';

    protected $fillable = ['id', 'name_en', 'name_ar', 'photo', 'deleted_at'];
}
