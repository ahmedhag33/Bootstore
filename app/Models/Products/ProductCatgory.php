<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCatgory extends Model
{
    /*******
     * --------------------
     When soft deleting a model, it is not actually removed from your database. Instead, a deleted_at timestamp is set on the record. To enable soft deletes for a model, specify the softDelete property on the model
     * --------------------
     * *****/
    use SoftDeletes;
    /**
     *--------------------
     * Table Name 
     *--------------------
     **/

    protected $table = 'productcatgorys';
    /**
     *--------------------
     * Tables Colums 
     *--------------------
     **/
    protected $fillable = ['id', 'name_en', 'name_ar', 'desc_en', 'desc_ar', 'deleted_at'];
}
