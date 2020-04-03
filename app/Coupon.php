<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coupon extends Model
{
    public static function findByCode($code)
    {
        return self::active()->where('code', $code)->first();
    }

    public function discount($total)
    {
        if ($this->type == 'numeric') {
            return $this->value;
        } else {
            return $total * ($this->value / 100);
        }
    }

    public function scopeActive($query)
    {
        return $query->where('expired_at', '>=' , Carbon::now())
            ->orWhereNull('expired_at');
    }
}
