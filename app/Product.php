<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $status = [
        false => 'Passive',
        true => 'Active'
    ];

    public function getStatusAttribute($value)
    {
        return Arr::get($this->status, $value);
    }

    public function setSlugAttribute($value)
    {
        $str = ($value) ? $value : $this->name.'-'.$this->id ;
        $this->attributes['slug'] = Str::slug($str);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true)->where('deleted_at', null);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
