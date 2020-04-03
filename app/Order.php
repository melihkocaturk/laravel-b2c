<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'address',
        'country',
        'state',
        'zip',
        'payment_method',
        'subtotal',
        'tax',
        'total',
        'discount',
        'promo_code',
        'error'
    ];

    public function user()
    {
        return $this->belonsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot([
            'quantity',
            'price',
            'total'
        ]);
    }
}
