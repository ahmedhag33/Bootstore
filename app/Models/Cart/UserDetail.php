<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{

    use SoftDeletes;

    protected $table = 'user_details';

    protected $fillable = ['id', 'first_name', 'last_name', 'address', 'mobile', 'paymenttype', 'user_id', 'deleted_at'];

    /**
     *  @return response()
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    /**
     *  @return response()
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Products\book');
    }
    /**
     *  @return response()
     */
    public function getpaymenttype()
    {
        return [
            'Creditcard' => 'Creditcard',
            'CashonDelivery' => 'CashonDelivery'
        ];
    }
}
