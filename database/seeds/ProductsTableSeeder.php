<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Book 1',
            'slug' => 'b1',
            'author' => 'vivek',
            'description' => 'sample desc'
        ]);

        Product::create([
            'name' => 'Book 2',
            'slug' => 'b2',
            'author' => 'vivek',
            'description' => 'sample desc'
        ]);

        Product::create([
            'name' => 'Book 3',
            'slug' => 'b3',
            'author' => 'vivek',
            'description' => 'sample desc'
        ]);

        Product::create([
            'name' => 'Book 4',
            'slug' => 'b4',
            'author' => 'vivek',
            'description' => 'sample desc'
        ]);

        Product::create([
            'name' => 'Book 5',
            'slug' => 'b5',
            'author' => 'vivek',
            'description' => 'sample desc'
        ]);

        Product::create([
            'name' => 'Book 6',
            'slug' => 'b6',
            'author' => 'vivek',
            'description' => 'sample desc'
        ]);
    }
}
