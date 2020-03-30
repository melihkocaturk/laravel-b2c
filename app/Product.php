<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    protected $status = [
        false => 'Passive',
        true => 'Active'
    ];

    public function getStatusAttribute($value)
    {
        return Arr::get($this->status, $value);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function categories() {
        return $this->belongsToMany('App\Category');
    }
}
