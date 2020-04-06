<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'title',
        'description'
    ];
    
    public function user()
    {
        return $this->belonsTo('App\User');
    }

    public function product()
    {
        return $this->belonsTo('App\Product');
    }
}
