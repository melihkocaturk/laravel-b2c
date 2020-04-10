<?php

use Illuminate\Database\Seeder;
use App\Coupon;
use Carbon\Carbon;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'PRM10',
            'type' => 'numeric',
            'value' => 10,
        ]);

        Coupon::create([
            'code' => 'PRM20',
            'type' => 'percentage',
            'value' => 20,
            'expired_at' => Carbon::now()->add(30, 'day'),
        ]);
    }
}
