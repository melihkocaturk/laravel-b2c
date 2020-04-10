<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) {
            Category::create([
                'name' => 'Category ' . $i,
                'slug' => 'category-' . $i,
            ]);
        }
    }
}
