<?php

namespace App\Models\Products;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{

    use SoftDeletes;

    protected $table = 'books';

    protected $fillable = ['id', 'name', 'desc', 'rate', 'photo', 'type', 'file', 'price', 'discount', 'new_price', 'category_id', 'publisher_id', 'author_id', 'deleted_at'];
    /**
     * return @var 
     **/
    public function categorys()
    {
        return $this->belongsTo('App\Models\Products\Category', 'category_id');
    }
    /**
     * return @var 
     **/
    public function publishers()
    {
        return $this->belongsTo('App\Models\Products\Publisher', 'publisher_id');
    }
    /**
     * return @var 
     **/
    public function authors()
    {
        return $this->belongsTo('App\Models\Products\Author', 'author_id');
    }
    /**
     * return enum  
     **/
    public function getEnumValues()
    {
        return [
            'purchasable' => __('showpage.purchasable'),
            'downloadable' => __('showpage.downloadable')
        ];
    }
}
