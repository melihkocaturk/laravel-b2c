<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    public function setSlugAttribute($value)
    {
        $str = ($value) ? $value : $this->name.'-'.$this->id;
        $this->attributes['slug'] = Str::slug($str);
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
