<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SoftDeletes;
    use SearchableTrait;

    protected $dates = ['deleted_at'];

    protected $status = [
        false => 'Passive',
        true => 'Active'
    ];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.subtitle' => 6,
            'products.description' => 3
        ]
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
        return $query->where('status', true)
            ->where('deleted_at', null)
            ->where('quantity', '>', 0);
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

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
