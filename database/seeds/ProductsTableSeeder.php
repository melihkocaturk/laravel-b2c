<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 50; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'slug' => 'product-' . $i,
                'price' => rand(10, 100),
                'quantity' => rand(10, 100),
                'sku' => 'sku ' . $i,
            ])->categories()->attach(rand(1, 5));
        }

        Product::limit(10)->update(['featured' => true]);
    }
}
